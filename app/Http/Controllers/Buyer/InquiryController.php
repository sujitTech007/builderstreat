<?php

namespace App\Http\Controllers\Buyer;
use App\Models\Inquiry;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    
    public function chatPage($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $receiver = User::findOrFail($inquiry->seller_id);
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

        return view('buyerdashboard.inquiries.chat', compact('inquiry', 'receiver', 'product', 'messages'));
    }

    public function sendMessage(Request $request)
{
    $messageId = DB::table('chats')->insertGetId([
        'product_id' => $request->product_id,
        'buyer_id'   => auth()->id(),
        'seller_id'  => $request->seller_id,
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

}
