<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = \App\Models\Notification::find($id);
        if ($notification && $notification->connection_id == auth()->id()) {
            $notification->is_read = 1;
            $notification->save();
            return redirect()->back()->with('success', 'Notification marked as read!');
        }
        return redirect()->back()->with('error', 'Notification not found or access denied.');
    }

    public function markAsReadAdmin($id)
    {
        $notification = \App\Models\Notification::find($id);
        $notification->is_admin_read = 1;
        $notification->save();
        return redirect()->back()->with('success', 'Notification marked as read!');
    }

    public function all()
    {
        $notifications = \App\Models\Notification::where('connection_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('sellerdashboard.notification', compact('notifications'));
    }

    public function allBuyer()
    {
        $notifications = \App\Models\Notification::where('connection_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('buyerdashboard.notification', compact('notifications'));
    }
    public function allAdmin()
    {
        $notifications = \App\Models\Notification::orderBy('created_at', 'desc')->get();
        return view('admin.notification', compact('notifications'));
    }
}
