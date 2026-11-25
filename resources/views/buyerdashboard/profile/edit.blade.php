@extends('layouts.buyer')

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="page-head">
    <div>
        <h1>Profile & Settings</h1>
        <p>Update your account, address, and payment details.</p>
    </div>
</div>

{{-- Profile Update --}}
<div class="card p-4 mx-auto mb-5">
    <form action="{{ route('buyer.profile.update') }}" method="POST" enctype="multipart/form-data" class="seller-dashboard-form">
        @csrf
        @method('PUT')
        <div class="row mb-3 col-md-12">
            <div class="col-md-6">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $buyer->company_name) }}" required>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $buyer->name) }}" required>
            </div>
            <div class=" col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $buyer->email) }}" required>
            </div>
            
        </div>

        <div class="row mb-3 col-md-12">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $buyer->phone) }}">
            </div>
            <div class="col-md-6">
                <label for="profile_image" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
                @if($buyer->profile_image)
                <div class="mt-2">
                    <img src="{{ asset($buyer->profile_image) }}" alt="Current Image" width="100" style="object-fit:cover;">
                </div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
    <!-- New Password -->
    <div class="col-md-6">
        <label for="password" class="form-label">New Password</label>
        
        <!-- Input + Eye inside relative div -->
        <div class="position-relative">
            <input type="password" placeholder="Password" id="password" 
                class="form-control pe-5" name="password">
            <span class="toggle-password" onclick="togglePassword('password', this)" 
                style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;">
                👁️
            </span>
        </div>
        <small id="password-error" class="text-danger"></small>
    </div>

    <!-- Confirm Password -->
    <div class="col-md-6">
        <label for="confirm_password" class="form-label">Confirm New Password</label>
        
        <!-- Input + Eye inside relative div -->
        <div class="position-relative">
            <input type="password" placeholder="Confirm Password" id="confirm_password" 
                class="form-control pe-5" name="password_confirmation">
            <span class="toggle-password" onclick="togglePassword('confirm_password', this)" 
                style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;">
                👁️
            </span>
        </div>
        <small id="confirm-password-error" class="text-danger"></small>
    </div>
</div>
        <button type="submit" class="btn btn-success col-md-2 mt-4">Update Profile</button>
    </form>
</div>

<script>
function togglePassword(fieldId, element) {
    const input = document.getElementById(fieldId);
    input.type = input.type === "password" ? "text" : "password";
}

// Password validation rules
function validatePassword() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;
    const passwordError = document.getElementById("password-error");
    const confirmError = document.getElementById("confirm-password-error");

    // Regex: 8-10 chars, at least 1 uppercase, at least 1 special char
    const regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]).{8,10}$/;

    if (!regex.test(password)) {
        passwordError.textContent = 
          "Password must be 8-10 characters, include at least one uppercase letter and one special character.";
    } else {
        passwordError.textContent = "";
    }

    if (confirmPassword !== "" && password !== confirmPassword) {
        confirmError.textContent = "Passwords do not match.";
    } else {
        confirmError.textContent = "";
    }
}

// Bind validation on input change
document.getElementById("password").addEventListener("input", validatePassword);
document.getElementById("confirm_password").addEventListener("input", validatePassword);
</script>


{{-- Address Section --}}
<div class="page-head mt-5">
    <div>
        <h2>Address</h2>
        <p>Set the address used for your material enquiries.</p>
    </div>
</div>
<div class="card p-4 mx-auto">
    <form action="{{ route('buyer.address.store') }}" method="POST" class="seller-dashboard-form">
        @csrf
        <input type="hidden" name="country" value="Canada">
        <div class="row mb-3 col-md-12">
            <div class="col-md-4">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $address->address ?? '') }}" required>
            </div>
            <div class="col-md-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $address->city ?? '') }}" required>
            </div>
            <div class="col-md-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $address->state ?? '') }}" required>
            </div>
            <div class="col-md-3 mt-3">
                <label for="zip" class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip', $address->zip ?? '') }}" required>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary col-md-2 mt-4">Save Address</button>
    </form>
</div>



<div class="account-info radius-md mb-4 mt-5">
      <div class="page-head mt-5">
          <div>
              <h2>Bank Details</h2>
              <p>Maintain the bank information associated with your account.</p>
          </div>
      </div>
    <div class="card p-4 mx-auto">
    <div class="edit-info-area">
        @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <form action="{{ route('buyer.update.bank.details') }}" method="POST" enctype="multipart/form-data" class="seller-dashboard-form">
            @csrf
            <div class="row">

                <div class="col-lg-6 mt-3">
                    <div class="form-group mb-30">
                        <label for="" class="mb-1 form-label">{{ __('Account Holder Name') . ' *' }}</label>
                        <input type="text" class="form-control"
                            name="account_holder_name"
                            value="{{ old('account_holder_name', $buyer->account_holder_name) }}"
                            placeholder="{{ __('Account Holder Name') }}" required>
                        
                    </div>
                </div>

                <div class="col-lg-6 mt-3">
                    <div class="form-group mb-30">
                        <label for="" class="mb-1 form-label">{{ __('Bank Name') . ' *' }}</label>
                        <input type="text" class="form-control"
                            name="bank_name"
                            value="{{ old('bank_name', $buyer->bank_name) }}"
                            placeholder="{{ __('Bank Name') }}" required>
                       
                    </div>
                </div>

                <div class="col-lg-6 mt-3">
                    <div class="form-group mb-30">
                        <label for="" class="mb-1 form-label">{{ __('Institution Number') . ' *' }}</label>
                        <input type="text" class="form-control"
                            name="institution_number"
                            value="{{ old('institution_number', $buyer->institution_number) }}"
                            placeholder="{{ __('Institution Number') }}" required>
                       
                    </div>
                </div>

                <div class="col-lg-6 mt-3">
                    <div class="form-group mb-30">
                        <label for="" class="mb-1 form-label">{{ __('Transit Number') . ' *' }}</label>
                        <input type="text" class="form-control"
                            name="transit_number"
                            value="{{ old('transit_number', $buyer->transit_number) }}"
                            placeholder="{{ __('Transit Number') }}" required>
                      
                    </div>
                </div>

                <div class="col-lg-6 mt-3">
                    <div class="form-group mb-30">
                        <label for="" class="mb-1 form-label">{{ __('Account Number') . ' *' }}</label>
                        <input type="text" class="form-control"
                            name="account_number"
                            value="{{ old('account_number', $buyer->account_number) }}"
                            placeholder="{{ __('Account Number') }}" required>
                      
                    </div>
                </div>

                <div class="col-lg-6 mt-3">
                    <div class="form-group mb-30">
                        <label for="" class="mb-1 form-label">{{ __('Routing Number') . ' *' }} ( Transit + Institution )</label>
                        <input type="text" class="form-control"
                            name="routing_number"
                            value="{{ old('routing_number', $buyer->routing_number) }}"
                            placeholder="{{ __('Routing Number') }}" required>
                      
                    </div>
                </div>

                <div class="col-lg-6 mt-3">
                    <div class="form-group mb-30">
                        <label for="" class="mb-1 form-label">{{ __('SWIFT Code') . ' *' }}</label>
                        <input type="text" class="form-control"
                            name="swift_code"
                            value="{{ old('swift_code', $buyer->swift_code) }}"
                            placeholder="{{ __('SWIFT Code') }}" required>
                      
                    </div>
                </div>
               
                <div class="col-lg-12 mb-15 mt-4">
                    <div class="form-button">
                        <button type="submit" class="btn btn-lg btn-primary">{{ __('Update Bank Details') }}</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    </div>
</div>



@endsection
