@include('admin.include.header')

<div class="wrapper active">
    <div class="page-content">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <img src="{{asset('public/assets/admin/assets/images/user.png')}}" width="32"
                                    class="rounded-circle me-lg-2 d-flex userImage" alt="user-image" style="width:50px; height:50px;"> <div>
                                    <h3 class="mb-1">{{ $admin->name }}</h3>
                                    <p class="mb-0 text-muted"><i class="ri-mail-line"></i> {{ $admin->email }}</p>
                                </div>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.profile.update') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">First Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $admin->name) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $admin->phone) }}" required>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Change Password Section -->
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-4">Change Password</h5>
                            @if(session('password_success'))
                                <div class="alert alert-success">{{ session('password_success') }}</div>
                            @endif
                            @if(session('password_error'))
                                <div class="alert alert-danger">{{ session('password_error') }}</div>
                            @endif
                            <form action="{{ route('admin.profile.password') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-warning px-4">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Change Password Section -->

                    
                </div>
            </div>
        </div>
    </div> 
</div>

@include('admin.include.footer')