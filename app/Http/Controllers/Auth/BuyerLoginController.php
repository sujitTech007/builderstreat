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
use App\Mail\BuyerRegisteredMail;
use Twilio\Rest\Client;

class BuyerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.buyer_login');
    }

   public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|max:10|unique:users,phone',
            'password' => 'required|string|confirmed|min:10',
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->country_code . $request->phone;
        $user->country_code = $request->country_code;
        $user->role = $request->role;
        $user->password =  Hash::make($request->password);
        $user->is_active = '0';
        $user->save();

        $notification = new Notification();
        $admin = Auth::guard('admin')->user();
        $notification->user_id = $admin->id;
        $notification->connection_id = '0';
        $notification->message = 'New Buyer Registered: ' . $user->name . '. Please verify the ID.';
        $notification->is_read = 1;
        $notification->save();

        // Send registration email
        Mail::to($user->email)->send(new BuyerRegisteredMail($user));

        $this->sendOtp($user->phone);

        return response()->json([
            'status'  => 'otp_sent',
            'message' => app()->environment(['local', 'development'])
                ? 'Development OTP: 1234'
                : 'OTP sent to your phone number',
            'user_id' => $user->id
        ]);

        // Auth::login($user);
        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'buyer'   => $user,
        ]);
        // return redirect()->back()->with('success', 'Registration successful!');
    }
// register time start

    private function sendOtp($phone)
    {
        if (app()->environment(['local', 'development'])) {
            return;
        }

        $accountSid = env('TWILIO_ACCOUNT_SID');
        $authToken  = env('TWILIO_AUTH_TOKEN');
        $verifySid  = env('TWILIO_VERIFY_SID');

        $url = "https://verify.twilio.com/v2/Services/{$verifySid}/Verifications";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'To' => $phone,
            'Channel' => 'sms'
        ]));
        curl_setopt($ch, CURLOPT_USERPWD, "{$accountSid}:{$authToken}");
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'otp'     => ['required', 'regex:/\A(?:[0-9]{4}|[0-9]{6})\z/'],
        ]);

        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $developmentOtp = app()->environment(['local', 'development'])
            && hash_equals('1234', (string) $request->otp);

        if (!$developmentOtp) {
            $accountSid = env('TWILIO_ACCOUNT_SID');
            $authToken  = env('TWILIO_AUTH_TOKEN');
            $verifySid  = env('TWILIO_VERIFY_SID');

            $url = "https://verify.twilio.com/v2/Services/{$verifySid}/VerificationCheck";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'To' => $user->phone,
                'Code' => $request->otp
            ]));
            curl_setopt($ch, CURLOPT_USERPWD, "{$accountSid}:{$authToken}");
            $response = curl_exec($ch);
            $twilioResponse = json_decode($response, true);
            curl_close($ch);

            if (!isset($twilioResponse['status']) || $twilioResponse['status'] !== 'approved') {
                return response()->json(['error' => 'Invalid or expired OTP'], 422);
            }
        }

        // Mark user active + login
        $user->update(['is_active' => 0]);
        Auth::login($user);

        return response()->json(['success' => 'Login successful', 'redirect' => route('buyer.profile.edit')]);
    }

// register time end

    public function otpSend(Request $request)
    {
        $phoneWithCountryCode = $request->country_code . $request->phone;
        $user = User::where('phone', $phoneWithCountryCode)->where('role', 1)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid password'], 401);
        }

        if (app()->environment(['local', 'development'])) {
            return response()->json([
                'status' => 'otp_sent',
                'message' => 'Development OTP: 1234',
            ]);
        }

        try {
            $accountSid = env('TWILIO_ACCOUNT_SID');
            $authToken  = env('TWILIO_AUTH_TOKEN');
            $verifySid  = env('TWILIO_VERIFY_SID');
            $phoneNumber = $user->phone;
            $url = "https://verify.twilio.com/v2/Services/{$verifySid}/Verifications";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'To' => $phoneNumber,
                'Channel' => 'sms'
            ]));
            curl_setopt($ch, CURLOPT_USERPWD, "{$accountSid}:{$authToken}");

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($httpCode >= 400) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to send OTP.',
                    'twilio_response' => $response,
                    'curl_error' => $error,
                ], 500);
            }

            return response()->json(['status' => 'otp_sent', 'message' => 'OTP sent successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'SMS sending failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

     public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'otp' => ['required', 'regex:/\A(?:[0-9]{4}|[0-9]{6})\z/'],
        ]);

        // $user = User::where('phone', $request->phone)->first();
        $phoneWithCountryCode = $request->country_code . $request->phone;
        $user = User::where('phone', $phoneWithCountryCode)->first();
        if (!$user) {
            return back()->withErrors(['phone' => 'User not found'])->withInput();
        }
        // if ($user->is_active != 1) {
        //     return back()->withErrors(['phone' => 'Your account is not active. Please contact our team.'])->withInput();
        // }

        $developmentOtp = app()->environment(['local', 'development'])
            && hash_equals('1234', (string) $request->otp);

        if (!$developmentOtp) {
            try {
                $accountSid = env('TWILIO_ACCOUNT_SID');
                $authToken  = env('TWILIO_AUTH_TOKEN');
                $verifySid  = env('TWILIO_VERIFY_SID');
                $url = "https://verify.twilio.com/v2/Services/{$verifySid}/VerificationCheck";

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                    'To' => $user->phone,
                    'Code' => $request->otp
                ]));
                curl_setopt($ch, CURLOPT_USERPWD, "{$accountSid}:{$authToken}");

                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $twilioResponse = json_decode($response, true);
                curl_close($ch);

                if ($httpCode >= 400 || ($twilioResponse['status'] ?? null) !== 'approved') {
                    return back()->withErrors(['otp' => 'Invalid or expired OTP'])->withInput();
                }
            } catch (\Exception $e) {
                return back()->withErrors(['otp' => 'Failed to verify OTP.'])->withInput();
            }
        }

        Auth::login($user);
        return redirect()->route('buyer.dashboard')->with('success', 'Login successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('buyer.register')->with('success', 'Logout successful!');
    }
}
