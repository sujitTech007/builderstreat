
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="{{ asset('/assets/admin/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    <link href="{{ asset('/assets/admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/admin/assets/css/custom.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="myaccountPage pt-5 login-page">
        <div class="dashboardForms py-3"> 
            <div class="login-form-container customLoginFormBox">
                <h1 class="text-center mb-3 log">Log<span class="login">In</span></h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.login.check') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" required>
                        <span class="toggle-password" onclick="togglePassword()">
                            <i class="ri-eye-line" id="eyeIcon"></i>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-left pt-3">
                            <button type="submit" id="submit" class="lab-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("ri-eye-line");
            eyeIcon.classList.add("ri-eye-off-line");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("ri-eye-off-line");
            eyeIcon.classList.add("ri-eye-line");
        }
    }
    </script>
</body>
</html>


      

