<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Inquiry;
use Stripe\Charge;
use App\Models\OrderPayment;
use App\Models\Order;
use App\Models\Notification;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Twilio\TwiML\Voice\Pay;

class StripeController extends Controller
{
    // public function charge(Request $request)
    // {
    //     Stripe::setApiKey(env('STRIPE_SECRET'));

    //     try {
    //         $charge = Charge::create([
    //             'amount' => 999 * 100, // Replace with your plan's amount
    //             'currency' => 'usd',
    //             'description' => 'Plan: ' . $request->plan,
    //             'source' => $request->stripeToken,
    //         ]);

    //         // Check if charge was successful
    //         if ($charge->status === 'succeeded') {
    //             $subscription = new Subscription();
    //             $subscription->user_id = auth()->id();
    //             $subscription->stripe_id = $charge->id;
    //             $subscription->plan_name = $request->plan_name;
    //             $subscription->price = $request->plan_price;
    //             $subscription->start_date = now();
    //             $subscription->end_date = now()->addMonth();
    //             $subscription->payment_status = 'paid';
    //             $subscription->save();

    //             return response()->json(['status' => 'success']);
    //         } else {
    //             // Charge was not successful
    //             $subscription = new Subscription();
    //             $subscription->user_id = auth()->id();
    //             $subscription->stripe_id = $charge->id;
    //             $subscription->plan_name = $request->plan_name;
    //             $subscription->price = $request->plan_price;
    //             $subscription->start_date = now();
    //             $subscription->end_date = now()->addMonth();
    //             $subscription->payment_status = 'failed';
    //             $subscription->save();

    //             return response()->json(['status' => 'error', 'message' => 'Payment failed']);
    //         }
    //     } catch (\Exception $e) {
    //         // Create subscription record with failed status when exception occurs
    //         $subscription = new Subscription();
    //         $subscription->user_id = auth()->id();
    //         $subscription->stripe_id = null;
    //         $subscription->plan_name = $request->plan_name;
    //         $subscription->price = $request->plan_price;
    //         $subscription->start_date = now();
    //         $subscription->end_date = now()->addMonth();
    //         $subscription->payment_status = 'failed';
    //         $subscription->save();

    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //     }
    // }

    // public function renew(Request $request, $id)
    // {
    //     Stripe::setApiKey(env('STRIPE_SECRET'));

    //     try {
    //         $subscription = Subscription::where('id', $id)
    //             ->where('user_id', auth()->id())
    //             ->firstOrFail();

    //         $charge = Charge::create([
    //             'amount' => $subscription->price * 100,
    //             'currency' => 'usd',
    //             'description' => 'Renewal for Plan: ' . $subscription->plan_name,
    //             'source' => $request->stripeToken,
    //         ]);

    //         if ($charge->status === 'succeeded') {
    //             // Extend if still active, otherwise start fresh
    //             $subscription->end_date = $subscription->end_date->isFuture()
    //                 ? $subscription->end_date->addMonth()
    //                 : now()->addMonth();

    //             $subscription->stripe_id = $charge->id;
    //             $subscription->payment_status = 'paid';
    //             $subscription->save();

    //             return response()->json(['status' => 'success']);
    //         } else {
    //             return response()->json(['status' => 'error', 'message' => 'Payment failed']);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //     }
    // }



    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            
        
        if ($request->plan_name === 'basic') {
            $commissionRate = 0.0075;
        } elseif ($request->plan_name === 'pro') {
            $commissionRate = 0.005; 
        } else {
            $commissionRate = 0;
        }

        $baseAmount = $request->plan_price; 
         $commission = $baseAmount * $commissionRate;
        $totalAmount = $baseAmount + $commission;
         $commissionAmount = $baseAmount - $commission;

        $charge = Charge::create([
            'amount' => intval($totalAmount * 100), 
            'currency' => 'usd',
            'description' => 'Plan: ' . $request->plan_name,
            'source' => $request->stripeToken,
        ]);

            
           if ($charge->status === 'succeeded') {
            $subscription = new Subscription();
            $subscription->user_id = auth()->id();
            $subscription->stripe_id = $charge->id;
            $subscription->plan_name = $request->plan_name;
            $subscription->price = $baseAmount;
            $subscription->commission = $commission; 
            $subscription->total_amount = $totalAmount;
            $subscription->commission_amount = $commissionAmount;
            $subscription->start_date = now();
            $subscription->end_date = now()->addMonth();
            $subscription->payment_status = 'paid';
            $subscription->save();

            
            $notification = new Notification();
            $notification->user_id = $subscription->user_id;
            $notification->connection_id = '1'; // Admin user ID
            $buyername = auth()->user()->name;
            $notification->message = 'New Plan Subscriber from ' . $buyername . ' subscribed to ' . $request->plan_name . ' plan.' . ' Stripe ID: ' . $subscription->stripe_id . ' Payment Status: ' . $subscription->payment_status;
            $notification->is_read = 1;
            $notification->save();

                return response()->json(['status' => 'success']);
            } else {
                // Charge was not successful
                $subscription = new Subscription();
                $subscription->user_id = auth()->id();
                $subscription->stripe_id = $charge->id;
                $subscription->plan_name = $request->plan_name;
                $subscription->price = $request->plan_price;
                $subscription->start_date = now();
                $subscription->end_date = now()->addMonth();
                $subscription->payment_status = 'failed';
                $subscription->save();

                $notification = new Notification();
                $notification->user_id = $subscription->user_id;
                $notification->connection_id = '1'; // Admin user ID
                $buyername = auth()->user()->name;
                $notification->message = 'New Plan Subscriber from ' . $buyername . ' subscribed to ' . $request->plan_name . ' plan.' . ' Stripe ID: ' . $subscription->stripe_id . ' Payment Status: ' . $subscription->payment_status;
                $notification->is_read = 1;
                $notification->save();

                return response()->json(['status' => 'error', 'message' => 'Payment failed']);
            }
        } catch (\Exception $e) {

            $subscription = new Subscription();
            $subscription->user_id = auth()->id();
            $subscription->stripe_id = null;
            $subscription->plan_name = $request->plan_name;
            $subscription->price = $request->plan_price;
            $subscription->start_date = now();
            $subscription->end_date = now()->addMonth();
            $subscription->payment_status = 'failed';
            $subscription->save();

            $notification = new Notification();
            $notification->user_id = $subscription->user_id;
            $notification->connection_id = '1'; // Admin user ID
            $buyername = auth()->user()->name;
            $notification->message = 'New Plan Subscriber from ' . $buyername . ' subscribed to ' . $request->plan_name . ' plan.' . ' Stripe ID: ' . $subscription->stripe_id . ' Payment Status: ' . $subscription->payment_status;
            $notification->is_read = 1;
            $notification->save();

            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function renew(Request $request, $id)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $subscription = Subscription::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $charge = Charge::create([
                'amount' => $subscription->price * 100,
                'currency' => 'usd',
                'description' => 'Renewal for Plan: ' . $subscription->plan_name,
                'source' => $request->stripeToken,
            ]);

            if ($charge->status === 'succeeded') {
                // Extend if still active, otherwise start fresh
                $subscription->end_date = $subscription->end_date->isFuture()
                    ? $subscription->end_date->addMonth()
                    : now()->addMonth();

                $subscription->stripe_id = $charge->id;
                $subscription->payment_status = 'paid';
                $subscription->save();

                $notification = new Notification();
                $notification->user_id = $subscription->user_id;
                $notification->connection_id = '1'; // Admin user ID
                $buyername = auth()->user()->name;
                $notification->message = 'Renew Plan Subscriber from ' . $buyername . ' subscribed to ' . $request->plan_name . ' plan.' . ' Stripe ID: ' . $subscription->stripe_id . ' Payment Status: ' . $subscription->payment_status;
                $notification->is_read = 1;
                $notification->save();

                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Payment failed']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }



    public function freeSubscription(Request $request)
    {
        try {
            // create subscription record for user
            $subscription = new Subscription();
            $subscription->user_id = auth()->id();
            // $subscription->stripe_id = $charge->id;
            $subscription->plan_name = $request->plan_name;
            $subscription->price = 0;
            $subscription->commission = 0; 
            $subscription->total_amount = 0;
            $subscription->commission_amount = 0;
            $subscription->start_date = now();
            $subscription->end_date = now()->addMonth();
            $subscription->payment_status = 'paid';
            $subscription->save();

            $notification = new Notification();
            $notification->user_id = $subscription->user_id;
            $notification->connection_id = '1'; // Admin user ID
            $buyername = auth()->user()->name;
            $notification->message = 'Free Plan Subscriber from ' . $buyername . ' subscribed to ' . $request->plan_name . ' plan.' . ' Stripe ID: ' . $subscription->stripe_id . ' Payment Status: ' . $subscription->payment_status;
            $notification->is_read = 1;
            $notification->save();


            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }








    // Order Payment Integration Methods (if needed)

    public function payOrder(Request $request, $orderId)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $order = Order::findOrFail($orderId);
    $inquiry = Inquiry::find($order->enquiry_id);

    try {
        // Charge customer
        $charge = Charge::create([
            'amount' => intval($order->amount * 100), // cents
            'currency' => 'usd',
            'description' => 'Payment for Order #' . $order->id,
            'source' => $request->stripeToken,
        ]);

        // Save payment record
        $payment = new OrderPayment();
        $payment->order_id = $order->id;
        $payment->user_id = auth()->id();
        $payment->stripe_id = $charge->id;
        $payment->amount = $order->amount;
        $payment->currency = 'usd';
        $payment->status = $charge->status === 'succeeded' ? 'paid' : 'failed';
        $payment->save();

        // Update order payment_status
        if ($charge->status === 'succeeded') {
            $order->payment_status = 'paid';
            $order->status = 'approved';
            $order->save();

            $inquiry->order_status = 1;
            $inquiry->save();

            $notification = new Notification();
            $notification->user_id = $payment->user_id;
            $notification->connection_id = '1'; // Admin user ID
            $buyername = auth()->user()->name;
            $notification->message = 'Order Payment from ' . $buyername . ' for ' . $payment->order_id . ' plan.' . ' Stripe ID: ' . $payment->stripe_id . ' Payment Status: ' . $payment->status;
            $notification->is_read = 1;
            $notification->save();

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Payment failed']);
        }

    } catch (\Exception $e) {
        // Save failed attempt
        $payment = new OrderPayment();
        $payment->order_id = $order->id;
        $payment->user_id = auth()->id();
        $payment->stripe_id = null;
        $payment->amount = $order->amount;
        $payment->currency = 'usd';
        $payment->status = 'failed';
        $payment->save();

        $notification = new Notification();
        $notification->user_id = $payment->user_id;
        $notification->connection_id = '1'; // Admin user ID
        $buyername = auth()->user()->name;
        $notification->message = 'Order Payment from ' . $buyername . ' for ' . $payment->order_id . ' plan.' . ' Stripe ID: ' . $payment->stripe_id . ' Payment Status: ' . $payment->status;
        $notification->is_read = 1;
        $notification->save();

        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    }
}


}
