<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $seller = Auth::user();
        $address = Address::where('user_id', $seller->id)->first();
        return view('sellerdashboard.profile.edit', compact('seller', 'address'));
    }

    public function update(Request $request)
    {
        $seller = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'company_name' => 'nullable',
            'profile_image' => 'nullable|image|max:2048',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'company_name']);
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/sellers'), $imageName);
            $data['profile_image'] = 'assets/images/sellers/' . $imageName;
        }
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $seller->update($data);
        return redirect()->route('seller.profile.edit')->with('success', 'Profile updated successfully.');
    }

    public function addressStore(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20', // fixed field name
        ]);

        Address::updateOrCreate(
            ['user_id' => $user->id], // condition
            [
                'address' => $request->address,
                'city'    => $request->city,
                'state'   => $request->state,
                'zip'     => $request->zip,
                'country' => $request->country ?? 'Canada',
            ]
        );

        return redirect()->route('seller.profile.edit')
            ->with('success', 'Address saved successfully.');
    }
    public function updateBankDetail(Request $request)
    {
        $seller = Auth::user();

        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'routing_number' => 'required',
            'account_holder_name' => 'required',
            'institution_number' => 'required',
            'transit_number' => 'required',
            'swift_code' => 'required',

        ]);

        $seller->bank_name = $request->bank_name;
        $seller->account_number = $request->account_number;
        $seller->routing_number = $request->routing_number;
        $seller->account_holder_name = $request->account_holder_name;
        $seller->institution_number = $request->institution_number;
        $seller->transit_number = $request->transit_number;
        $seller->swift_code = $request->swift_code;
        $seller->save();

        return redirect()->route('seller.profile.edit')->with('success', 'Bank details updated successfully.');
    }

    
}
