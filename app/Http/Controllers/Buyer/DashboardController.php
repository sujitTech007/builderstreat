<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Product;
use App\Models\Inquiry;
use App\Models\Category;
use App\Models\Subscription;
use App\Models\Wishlist;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('buyerdashboard.dashboard');
    }

      public function inquiries()
    {
        $buyerId = Auth::id();
        // $productIds = Product::where('seller_id', $buyerId)->pluck('id');
        //  $inquiries = Inquiry::whereIn('product_id', $productIds)
        //     ->with(['product', 'buyer'])
        //     ->orderByDesc('created_at')
        //     ->paginate(10);
         $inquiries = Inquiry::where('buyer_id', $buyerId)->paginate(10);
        return view('buyerdashboard.inquiries.index', compact('inquiries'));
    }
    public function wishlist()
    {
        $wishlists = Wishlist::with('product')
            ->where('buyer_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('buyerdashboard.wishlist.index', compact('wishlists'));
    }

    public function paymentHistory()
    {
        $subscriptions = Subscription::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('buyerdashboard.payments.index', compact('subscriptions'));
    }

    public function category()
    {
        $sellerId = Auth::id();

        $categories = Category::get();
       
        return view('buyerdashboard.category', compact('categories'));
    }

    public function categoryProduct($id)
    {
        $sellerId = Auth::id();

        $products = Product::where('category_id', $id)->get();
       
        return view('buyerdashboard.product', compact('products'));
    }
    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
       
        return view('buyerdashboard.product-details', compact('product'));
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('buyerdashboard.order', compact('orders'));
    }
    public function orderPaymentHistory()
    {
        $orders = OrderPayment::where('user_id', Auth::id())
            ->whereNotNull('stripe_id')
            ->latest()
            ->paginate(10);

        return view('buyerdashboard.order-payments', compact('orders'));
    }
    public function viewInquiry($id)
    {
        $inquiry = Inquiry::with(['product', 'buyer', 'seller'])->findOrFail($id);
        return view('buyerdashboard.inquiries.view', compact('inquiry'));
    }

    
}
