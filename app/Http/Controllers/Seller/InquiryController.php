<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class InquiryController extends Controller
{
    public function index()
    {
        $sellerId = Auth::id();
        $productIds = Product::where('seller_id', $sellerId)->pluck('id');
        $inquiries = Inquiry::whereIn('product_id', $productIds)
            // ->where('status', 1)->where('approval', 0)
            ->with(['product', 'buyer'])
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('sellerdashboard.inquiries.index', compact('inquiries'));
    }

    public function chatPage($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $receiver = User::findOrFail($inquiry->buyer_id);
        $product = Product::findOrFail($inquiry->product_id);

        // Fetch chat messages for this inquiry/product
        $messages = DB::table('chats')
            ->where('product_id', $inquiry->product_id)
            ->where(function ($query) use ($inquiry) {
                $query->where('buyer_id', $inquiry->buyer_id)
                    ->orWhere('seller_id', $inquiry->seller_id);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('sellerdashboard.inquiries.chat', compact('inquiry', 'receiver', 'product', 'messages'));
    }

    public function sendMessage(Request $request)
    {
        $messageId = DB::table('chats')->insertGetId([
            'product_id' => $request->product_id,
            'buyer_id'   => $request->buyer_id,
            'seller_id'  => auth()->id(),
            'sender_id'  => auth()->id(),
            'message'    => $request->message,
            'is_read'    => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $message = DB::table('chats')->find($messageId);

        return response()->json($message);
    }

    public function fetchMessages($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $messages = DB::table('chats')
            ->where('product_id', $inquiry->product_id)
            ->where(function ($query) use ($inquiry) {
                $query->where('buyer_id', $inquiry->buyer_id)
                    ->orWhere('seller_id', $inquiry->seller_id);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    public function updateApproval($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $inquiry->approval = 1;
        // $inquiry->order_status = 1;
        $inquiry->save();

        $order = new Order();
        $order->user_id = $inquiry->buyer_id; // Assuming 'buyer_id' is equivalent to 'user_id'
        $order->enquiry_id = $inquiry->id;
        $order->seller_id = $inquiry->seller_id;
        $order->material_id = $inquiry->product_id; // Assuming 'product_id' is 'material_id'
        $order->quantity = $inquiry->qty;
        $order->amount = $inquiry->qty * $inquiry->product->price; // Assuming 'price' exists in Product
        $order->status = 'pending';
        $order->payment_status = 'unpaid'; // Default value, adjust if needed
        $order->save();

        $order->order_id = 'BDST' . str_pad($order->id, 3, '0', STR_PAD_LEFT); // Generating order_id
        $order->save();

        $user = User::find($inquiry->seller_id);
        $sellername = $user->name;

        $notification = new Notification();
        $notification->user_id = $inquiry->seller_id;
        $notification->connection_id = $inquiry->buyer_id;
        $notification->message = 'Order has been approved by ' . $sellername . '. Order ID: ' . $order->order_id;
        $notification->is_read = 0;
        $notification->save();

        return redirect()->route('seller.inquiries.index')
            ->with('success', 'Inquiry approval status updated and order created successfully.');
    }
    public function view($id)
    {
        $inquiry = Inquiry::with(['product', 'buyer'])->findOrFail($id);
        return view('sellerdashboard.inquiries.view', compact('inquiry'));
    }

    public function updateInquiryStatus(Request $request)
    {
        $inquiry = Inquiry::find($request->inquiry_id);
     
        if ($inquiry) {
            $inquiry->order_status = $request->status;
            $inquiry->save();
            return response()->json(['success' => true, 'message' => 'Order status updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Inquiry not found.']);
    }
}
