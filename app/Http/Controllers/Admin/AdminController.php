<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Inquiry;
use App\Models\Subscription;
use App\Models\ContactMessage;
use App\Models\Notification;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    
    // Admin dashboard
    public function dashboard()
    {
        $sellerCount = User::where('role', 2)->count();
        $buyerCount = User::where('role', 1)->count();
        $inquiryCount = Inquiry::count();
        $orderPaymentCount = Order::where('payment_status', 'paid')->count();
        $activeSellerCount = User::where('role', 2)->where('is_active', 1)->count();
        $rejectedSellerCount = User::where('role', 2)->where('is_active', 0)->count();
        $RfqsCount = Inquiry::count();
        return view('admin.index', compact('sellerCount', 'inquiryCount', 'buyerCount', 'activeSellerCount', 'rejectedSellerCount', 'RfqsCount','orderPaymentCount'));
    }
    

    // Example: Manage users
    public function users()
    {
        // Add logic to fetch users for admin
        return view('admin.users');
    }

    // Example: Admin settings
    public function settings()
    {
        // Add logic for admin settings
        return view('admin.settings');
    }

   
   
    // Show sellers page
    // public function sellers()
    // {
    //     $sellers = User::where('role', '2')->get();
    //     return view('admin.seller.seller', compact('sellers'));
    // }

    public function sellers(Request $request)
{
    $query = User::where('role', '2');

    if ($request->has('status') && $request->status === 'approved') {
        $query->where('is_active', '1'); 
    }

    if ($request->has('status') && $request->status === 'rejected') {
        $query->where('is_active', '0'); 
    }

    $sellers = $query->get();
    return view('admin.seller.seller', compact('sellers'));
}

    public function sellersView($id)
    {
        $seller = User::findOrFail($id);
        return view('admin.seller.view', compact('seller'));
    }
   

    // Show subscription plans page
    public function plans()
    {
        $subscriptions = Subscription::all();
        return view('admin.plans', compact('subscriptions'));
    }

    // Show enquiries page
    public function enquiries()
    {
        $enquiries = \App\Models\Inquiry::with('buyer')->orderByDesc('created_at')->get();
        return view('admin.enquiry', compact('enquiries'));
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please login to access your profile.']);
        }

        return view('admin.profile', compact('admin'));
    }

    public function updateSellerApproval(Request $request, $sellerId)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);
        
        try {
            $seller = \App\Models\User::where('role', 2)->findOrFail($sellerId);
            $seller->is_active = $request->status;
            $seller->save();
            
            if ($seller->is_active == 1) {
                $admin = Auth::guard('admin')->user();
                $notification = new Notification();
                $notification->user_id = $admin->id;
                $notification->connection_id = $seller->id;
                $notification->message = 'Your ID has been Approved by ' . $admin->name;
                $notification->is_read = 0;
                $notification->save();
            } else {
                $admin = Auth::guard('admin')->user();
                $notification = new Notification();
                $notification->user_id = $admin->id;
                $notification->connection_id = $seller->id;
                $notification->message = 'Your ID has been Disapproved by ' . $admin->name;
                $notification->is_read = 0;
                $notification->save();
            }
            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Seller approval status updated successfully!',
                    'status' => $seller->is_active,
                    'status_text' => $seller->is_active ? 'Approved' : 'Not Approved'
                ]);
            }
            
            return back()->with('success', 'Seller approval status updated!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update seller approval status.'
                ], 500);
            }
            
            return back()->with('error', 'Failed to update seller approval status.');
        }
    }

    public function viewEnquiry($id)
    {
        $enquiry = Inquiry::findOrFail($id);
        $user = User::where('id', $enquiry->buyer_id)->first();
        if (!$user) {
            return redirect()->route('admin.enquiries')->withErrors(['error' => 'Enquiry not found.']);
        }
        return view('admin.enquiry_view', compact('enquiry','user'));
    }
    
    public function deleteEnquiry($id)
    {
        $enquiry = Inquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->route('admin.enquiries')->with('success', 'Enquiry deleted successfully!');
    }

    public function updateEnquiryStatus(Request $request, Inquiry $enquiry)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);
        
        try {
            $enquiry->status = $request->status;
            $enquiry->save();
            
            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Enquiry status updated successfully!',
                    'status' => $enquiry->status,
                    'status_text' => $enquiry->status == '1' ? 'Active' : 'Inactive'
                ]);
            }
            
            return redirect()->route('admin.enquiries')->with('success', 'Enquiry status updated successfully!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update enquiry status.'
                ], 500);
            }
            
            return redirect()->route('admin.enquiries')->with('error', 'Failed to update enquiry status.');
        }
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please login to update your profile.']);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
    }   
    public function updateProfilePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please login to update your password.']);
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Password updated successfully!');
    }

    // Contact Messages
    public function contactMessages()
    {
        $messages = ContactMessage::orderByDesc('created_at')->paginate(20);
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function contactMessageView($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.contact_messages.view', compact('message'));
    }

    public function contactMessageDelete($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully!');
    }
}
