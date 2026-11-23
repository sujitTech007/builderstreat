<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function buyers()
    {
        $buyers = User::where('role', '1')->get();
        return view('admin.buyer.buyer', compact('buyers'));
    }

    public function buyersView($id)
    {
        $buyer = User::findOrFail($id);
        return view('admin.buyer.view', compact('buyer'));
    }

    public function updateBuyerApproval(Request $request, $buyerId)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        try {
            $buyer = \App\Models\User::where('role', 1)->findOrFail($buyerId);
            $buyer->is_active = $request->status;
            $buyer->save();

            if ($buyer->is_active == 1) {
                $admin = Auth::guard('admin')->user();
                $notification = new Notification();
                $notification->user_id = $admin->id;
                $notification->connection_id = $buyer->id;
                $notification->message = 'Your ID has been Approved by ' . $admin->name;
                $notification->is_read = 0;
                $notification->save();
            } else {
                $admin = Auth::guard('admin')->user();
                $notification = new Notification();
                $notification->user_id = $admin->id;
                $notification->connection_id = $buyer->id;
                $notification->message = 'Your ID has been Disapproved by ' . $admin->name;
                $notification->is_read = 0;
                $notification->save();
            }

            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Buyer approval status updated successfully!',
                    'status' => $buyer->is_active,
                    'status_text' => $buyer->is_active ? 'Approved' : 'Not Approved'
                ]);
            }


            return back()->with('success', 'Buyer approval status updated!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update buyer approval status.'
                ], 500);
            }

            return back()->with('error', 'Failed to update buyer approval status.');
        }
    }
}
