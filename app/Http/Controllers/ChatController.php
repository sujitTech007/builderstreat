<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'receiver_id' => 'required|exists:users,id',
            'message'    => 'required|string|max:1000',
        ]);

        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);

        // Decide buyer/seller roles based on logged in user
        if ($user->id == $product->seller_id) {
            // Seller sending message
            $buyer_id  = $request->receiver_id;
            $seller_id = $user->id;
        } else {
            // Buyer sending message
            $buyer_id  = $user->id;
            $seller_id = $product->seller_id;
        }

        $chat = Chat::create([
            'product_id' => $product->id,
            'buyer_id'   => $buyer_id,
            'seller_id'  => $seller_id,
            'sender_id'  => $user->id,
            'message'    => $request->message,
            'is_read'    => 0
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Message sent successfully',
            'data'    => $chat
        ]);
    }

    /**
     * Get all messages between buyer and seller for a product
     */
    public function getMessages(Request $request, $product_id, $receiver_id)
    {
        $user = Auth::user();

        $messages = Chat::where('product_id', $product_id)
            ->where(function ($query) use ($user, $receiver_id) {
                $query->where(function ($q) use ($user, $receiver_id) {
                    $q->where('buyer_id', $user->id)
                        ->where('seller_id', $receiver_id);
                })
                    ->orWhere(function ($q) use ($user, $receiver_id) {
                        $q->where('seller_id', $user->id)
                            ->where('buyer_id', $receiver_id);
                    });
            })
            ->orderBy('created_at', 'ASC')
            ->get()
            ->map(function ($msg) {
                $msg->created_at = $msg->created_at->format('d M H:i');
                return $msg;
            });

        return response()->json([
            'status' => 'success',
            'messages' => $messages
        ]);
    }

        public function chatPage($product_id, $receiver_id)
    {
        $product = \App\Models\Product::findOrFail($product_id);
        $receiver = \App\Models\User::findOrFail($receiver_id);

        return view('chat', compact('product', 'receiver'));
    }

}
