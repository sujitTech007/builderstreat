<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request)
    // {
       
    //     $request->validate([
    //         'name' => ['required'],
    //         'email' => ['required','email'],
    //         'phone' => ['required'],
    //         'role' => ['required'],
    //         'password' => ['required', 'confirmed'],
    //     ]);


    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->phone = $request->phone;
    //     $user->role = $request->role;
    //     $user->password =  Hash::make($request->password);
    //     $user->is_active = '1';
    //     $user->save();

    //     event(new Registered($user));

    //     Auth::login($user);

    //     if($user->role == 1){
    //         return view('admin.buyer_register')->with('success', 'Registration successfully completed please login!');
    //     }
    //     return view('admin.seller_register')->with('success', 'Registration successfully completed please login!');

    // }
}
