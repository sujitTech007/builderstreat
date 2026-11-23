<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $buyer = Auth::user();
        $address = Address::where('user_id', $buyer->id)->first();
        return view('buyerdashboard.profile.edit', compact('buyer', 'address'));
    }

    public function update(Request $request)
    {
        $buyer = Auth::user();

        $request->validate([
            'company_name' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'profile_image' => 'nullable|image|max:2048',
            // 'password' => 'nullable|confirmed|min:6',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'company_name']);
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/buyers'), $imageName);
            $data['profile_image'] = 'assets/images/buyers/' . $imageName;
        }
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $buyer->update($data);
        return redirect()->route('buyer.profile.edit')->with('success', 'Profile updated successfully.');
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

        return redirect()->route('buyer.profile.edit')
            ->with('success', 'Address saved successfully.');
    }

    public function updateBankDetail(Request $request)
    {
        $buyer = Auth::user();

        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'routing_number' => 'required',
            'account_holder_name' => 'required',
            'institution_number' => 'required',
            'transit_number' => 'required',
            'swift_code' => 'required',

        ]);

        $buyer->bank_name = $request->bank_name;
        $buyer->account_number = $request->account_number;
        $buyer->routing_number = $request->routing_number;
        $buyer->account_holder_name = $request->account_holder_name;
        $buyer->institution_number = $request->institution_number;
        $buyer->transit_number = $request->transit_number;
        $buyer->swift_code = $request->swift_code;
        $buyer->save();

        return redirect()->route('buyer.profile.edit')->with('success', 'Bank details updated successfully.');
    }

    public function updateInquiryAddress(Request $request, $id)
    {
        

        $request->validate([
            'address' => 'required',
            'state' => 'required',
            'postal_code' => 'required', // fixed field name
        ]);

        $inquiry = Inquiry::findOrFail($id);
        
        $inquiry->address = $request->address;
        $inquiry->state = $request->state;
        $inquiry->postal_code = $request->postal_code;
        $inquiry->save();

        return redirect()->route('buyer.inquiry.view', $id)
            ->with('success', 'Address updated successfully.');
    }


}
