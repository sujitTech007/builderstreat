@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1"> Profile Settings
</h1>
                <p class="text-muted mb-0">
                    Manage your personal account information


                </p>
            </div>


        </div>

        
<div class="row">
    <div class="col-xl-8 col-lg-10">

        <!-- Profile Details -->
        <div class="card border-1 shadow-none mb-4">
           
            <div class="card-body p-4">

                <!-- Admin Info -->
                <div class="d-flex align-items-center gap-3 mb-4 pb-4 border-bottom">
                    <img src="{{ asset('public/assets/admin/assets/images/user.png') }}"
                         class="rounded-circle userImage border"
                         alt="Admin"
                         width="65"
                         height="65"
                         style="object-fit: cover;">

                    <div>
                        <h5 class="mb-1 fw-semibold">{{ $admin->name }}</h5>
                        <p class="text-muted mb-1">
                            <i class="fa-regular fa-envelope me-1"></i>
                            {{ $admin->email }}
                        </p>
                        <span class="badge bg-primary-subtle text-primary">Administrator</span>
                    </div>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Validation Errors -->
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fa-solid fa-circle-exclamation me-2"></i>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Profile Form -->
                <form action="{{ route('admin.profile.update') }}" method="POST" autocomplete="off">
                    @csrf

                    <h6 class="fw-semibold mb-3">Personal Information</h6>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-medium">Full Name</label>
                            <input type="text" name="name" id="name"
                                   class="form-control"
                                   value="{{ old('name', $admin->name) }}"
                                   placeholder="Enter your name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label fw-medium">Email Address</label>
                            <input type="email" name="email" id="email"
                                   class="form-control"
                                   value="{{ old('email', $admin->email) }}"
                                   placeholder="Enter your email" required>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-medium">Phone Number</label>
                            <input type="text" name="phone" id="phone"
                                   class="form-control"
                                   value="{{ old('phone', $admin->phone) }}"
                                   placeholder="Enter your phone number" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-floppy-disk me-2"></i>
                            Update Profile
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Change Password -->
        <div class="card border-1 shadow-none">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="fa-solid fa-lock text-warning me-2"></i>
                    Change Password
                </h5>
                <p class="text-muted small mb-0 mt-1">Update your account password securely</p>
            </div>

            <div class="card-body p-4">

                @if(session('password_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>
                        {{ session('password_success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('password_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-exclamation me-2"></i>
                        {{ session('password_error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('admin.profile.password') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="current_password" class="form-label fw-medium">Current Password</label>
                            <input type="password" name="current_password"
                                   id="current_password" class="form-control"
                                   placeholder="Enter current password" required>
                        </div>

                        <div class="col-md-6">
                            <label for="new_password" class="form-label fw-medium">New Password</label>
                            <input type="password" name="new_password"
                                   id="new_password" class="form-control"
                                   placeholder="Enter new password" required>
                        </div>

                        <div class="col-md-6">
                            <label for="new_password_confirmation" class="form-label fw-medium">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation"
                                   id="new_password_confirmation" class="form-control"
                                   placeholder="Confirm new password" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-warning px-4">
                            <i class="fa-solid fa-key me-2"></i>
                            Change Password
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>



    </div>
</main>

@include('admin.include.footer')