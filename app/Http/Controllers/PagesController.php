<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function ourcategories()
    {
        return view('ourcategories');
    }
    public function buyerRegister()
    {
        return view('buyer_register');
    }
    public function sellerRegister()
    {
        return view('seller_register');
    }
    public function blog()
    {
        return view('blog');
    }
    public function faq()
    {
        return view('faq');
    }
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }
    public function termsCondition()
    {
        return view('terms-condition');
    }
    public function mostPopularSlide1()
    {
        return view('mostpopularslide1');
    }
    public function team()
    {
        return view('team');
    }
    public function testimonial()
    {
        return view('testimonial');
    }
    public function whatWeDo()
    {
        return view('whatwedo');
    }

    public function listing()
    {
        $products = Product::where('status', 1)->with('category')->paginate(12);
        $highestPrice = Product::max('price');

        return view('listing', compact('products', 'highestPrice'));
    }
    public function productDetails($product)
    {
        $product = Product::with('category')->findOrFail($product);
        return view('product_details', compact('product'));
    }

    public function filter(Request $request)
    {
        $query = Product::query();

        // General search (keyword across multiple fields)
        if ($request->filled('query')) {
            $keyword = $request->input('query'); // ✅ correct way
            $query->where(function ($q) use ($keyword) {
                $q->where('product_name', 'like', '%' . $keyword . '%')
                ->orWhere('brand_name', 'like', '%' . $keyword . '%')
                ->orWhere('serial_number', 'like', '%' . $keyword . '%')
                ->orWhere('model_number', 'like', '%' . $keyword . '%');
            });
        }

        if ($request->price) {
            $query->where('price', '>=', $request->price);
        }

        if ($request->brand_name) {
            $query->where('brand_name', 'like', '%' . $request->brand_name . '%');
        }

        if ($request->serial_number) {
            $query->where('serial_number', 'like', '%' . $request->serial_number . '%');
        }

        if ($request->model_number) {
            $query->where('model_number', 'like', '%' . $request->model_number . '%');
        }

        $products = $query->paginate(9);
        $highestPrice = Product::max('price');

        return view('listing', compact('products', 'highestPrice'));
    }

    public function submitEnquiry($product, Request $request)
    {
        if (!auth()->check()) {
            return redirect()->back()->withErrors(['error' => 'Please first login then do enquiry.']);
        }
        $request->validate([
            'message' => 'required',
        ]);

        $buyerId = auth()->id();

        $sellerProduct = Product::where('id', $product)->first();
        $inquiry = new \App\Models\Inquiry();
        $inquiry->product_id = $product;
        $inquiry->buyer_id = $buyerId;
        $inquiry->seller_id = $sellerProduct->seller_id;
        $inquiry->message = $request->message;
        $inquiry->qty = $request->qty;
        $inquiry->contact_person = $request->contact_person;
        $inquiry->postal_code = $request->postal_code;
        $inquiry->address = $request->address;
        $inquiry->state = $request->state;
        $inquiry->status = 0;
        $inquiry->save();

        // $inquiry->inquiry_id = 'INQ' . $inquiry->id;
        $inquiry->inquiry_id = 'INQ' . str_pad($inquiry->id, 3, '0', STR_PAD_LEFT);
        $inquiry->save();

        $buyername = auth()->user()->name;

        $notification = new Notification();
        $notification->user_id = $buyerId;
        $notification->connection_id = $inquiry->seller_id;
        $notification->message = 'New enquiry from ' . $buyername;
        $notification->is_read = 0;
        $notification->save();

        return redirect()->back()->with('success', 'Your enquiry has been submitted!');
    }

    public function pricing()
    {
        $plans = \App\Models\SubscriptionPlan::where('is_active', 1)->orderBy('sort_order')->get();
        return view('pricing', compact('plans'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email:rfc,dns',
            'phone' => 'nullable|string|max:40',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
        ]);

        return redirect()->route('contact')->with('success', 'Thanks! Your message has been received.');
    }

    
}
