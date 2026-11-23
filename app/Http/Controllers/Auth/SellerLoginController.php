<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Notification;
use App\Models\Otp;
use Illuminate\Support\Facades\Mail;
use App\Mail\SellerRegisteredMail;
use Twilio\Rest\Client;

class SellerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('seller_register');
    }
    
    public function register(Request $request)
    {
        $request->validate([
           'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|max:10',
            'document' => 'required',
            'company_name' => 'required',
        ]);
        $countryWithPhone = $request->country_code . $request->phone;
        $checkPhone = User::where('phone', $countryWithPhone)->first();
        if ($checkPhone) {
            return response()->json([
                'errors' => [
                    'phone' => ['Phone number already exists!']
                ]
            ], 422);
        }

        $documentPath = null;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images'), $filename); // Saves to public/assets/images
            $documentPath = 'assets/images/' . $filename;
        }
       

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->phone = $request->phone;
        $user->phone = $request->country_code . $request->phone;
        $user->country_code = $request->country_code;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->company_name = $request->company_name;
        $user->document = $documentPath;
        $user->is_active = 0;
        $user->save();

        $notification = new Notification();
        $admin = Auth::guard('admin')->user();
        $notification->user_id = $admin->id;
        $notification->connection_id = '0';
        $notification->message = 'New Seller Registered: ' . $user->name . '. Please verify the ID.';
        $notification->is_read = 1;
        $notification->save();


        // Send registration email
        Mail::to($user->email)->send(new SellerRegisteredMail($user));

        // Auth::login($user);
        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'buyer'   => $user,
        ]);

        // return redirect()->back()->with('success', 'Registration successful!');
    }

    public function otpSend(Request $request)
    {
        $phoneWithCountryCode = $request->country_code . $request->phone;
        $user = User::where('phone', $phoneWithCountryCode)->where('role', 2)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json([
            'status' => 'otp_sent',
            'message' => 'Development OTP: 1234',
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'otp' => 'required|digits:4',
        ]);

        $phoneWithCountryCode = $request->country_code . $request->phone;
        $user = User::where('phone', $phoneWithCountryCode)->first();

        if (!$user) {
            return back()->withErrors(['phone' => 'User not found'])->withInput();
        }
        if ($request->otp !== '1234') {
            return back()->withErrors(['otp' => 'Invalid OTP'])->withInput();
        }
        if ($user->is_active != 1) {
            return back()->withErrors(['phone' => 'Your account is not active. Please contact our team.'])->withInput();
        }
        Auth::login($user);
        return redirect()->route('seller.dashboard')->with('success', 'Login successful!');
       
        try {
            $accountSid = env('TWILIO_ACCOUNT_SID');
            $authToken  = env('TWILIO_AUTH_TOKEN');
            $verifySid  = env('TWILIO_VERIFY_SID');
            $phoneNumber = $user->phone;
            // Ensure phone number is in E.164 format for Twilio (+91 for India, +1 for US, etc.)
            // if (strpos($phoneNumber, '+') !== 0) {
            //     $phoneNumber = '+91' . ltrim($phoneNumber, '0');
            // }
            $otpCode     = $request->otp;

            $url = "https://verify.twilio.com/v2/Services/{$verifySid}/VerificationCheck";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'To'   => $phoneNumber,
                'Code' => $otpCode
            ]));
            curl_setopt($ch, CURLOPT_USERPWD, "{$accountSid}:{$authToken}");

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $twilioResponse = json_decode($response, true);
            curl_close($ch);

            if ($httpCode >= 400 || $twilioResponse['status'] !== 'approved') {
                return back()->withErrors(['otp' => 'Invalid or expired OTP'])->withInput();
            }

            // If OTP is correct
            Auth::login($user);
            return redirect()->route('seller.dashboard')->with('success', 'Login successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['otp' => 'Failed to verify OTP.'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('seller.register')->with('success', 'Logout successful!');
    }
}
