<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard'); // or your dashboard route
        }
    
        return view('admin.login');
    }

    public function loginCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:6',
            ],
        ], [
            'email.required' => trans('Email is required'),
            'email.email' => trans('Invalid email format'),
            'password.required' => trans('Password is required'),
            'password.min' => trans('Password must be at least 6 characters long'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Check if the email exists
        $admin = \App\Models\Admin::where('email', $request->email)->first();
    
        if (!$admin) {
            return redirect()->back()->withErrors(['email' => 'Email not found.'])->withInput();
        }
    
        // Check if the password matches
        if (!Hash::check($request->password, $admin->password)) {
            return redirect()->back()->withErrors(['password' => trans('Incorrect password')])->withInput();
        }

        // Log the admin in
        Auth::guard('admin')->login($admin);

        // Redirect to admin dashboard (change route as needed)
        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
} 