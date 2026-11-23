<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inquiry;
use App\Models\OrderPayment;
use App\Models\Category;
use App\Models\Order;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $sellerId = Auth::id();
        $totalProducts = Product::where('seller_id', $sellerId)->count();
        $productIds = Product::where('seller_id', $sellerId)->pluck('id');
        $totalInquiries = Inquiry::whereIn('product_id', $productIds)->count();
        $totalCategories = Category::count();
        return view('sellerdashboard.dashboard', compact('totalProducts', 'totalInquiries', 'totalCategories'));
    }

    public function plan()
    {
        $sellerId = Auth::id();

        $subscription = Subscription::where('user_id', $sellerId)->get();
        if (!$subscription) {
            return redirect()->route('seller.dashboard')->with('message', 'You already have a subscription.');
        }
        return view('sellerdashboard.plan', compact('subscription'));
    }

    public function orders()
    {
        $orders = Order::where('seller_id', Auth::id())->get();
        return view('sellerdashboard.order', compact('orders'));
    }

    public function paymentHistory()
    {
        $orders = Order::where('seller_id', auth()->id())->where('payment_status', 'paid')->get();
        $payments = OrderPayment::whereIn('order_id', $orders->pluck('id'))->get();

        return view('sellerdashboard.payment', compact('orders', 'payments'));
    }
}
