@extends('layouts.frontend')

@section('title', 'Buyer Account | Builderstreat')

@push('head-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
@endpush

@section('content')

<div class="main-content">
    <section class="section wrap pt-0">
        <div class="section-head text-center">
            <div class="eyebrow">Buyer Account</div>
            <h1>Welcome to Builderstreat</h1>
            <p>Sign in or create an account to find and exchange surplus construction materials.</p>
        </div>
    </section>

    <style>
 
        .mycarbody {
            border: none;
            background: none;
        }

        .nav-tabs .nav-link:hover {
            border-bottom: 3px solid #8A9A5B;
        }

        .form-group input {
            display: inline-block;
        }

        .height-100 {
            height: 150vh
        }

        .card {
            width: 100%;
            max-width: 700px;
            border: none;
            z-index: 1;
            margin-bottom: 40px;
            display: flex;
            justify-content: center;
            align-items: stretch;
            padding-top: 24px;

        }

        .inputs input {
            width: 44.7px;
            height: 43.84px;
            left: 150px;
            top: 347.33px;
            background: #EEF1F8;
            border-radius: 12px !important;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 12px !important;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .log-in,
        .btn-register {
            /* margin-top: 16%; */
            background-color: #6E7E1D !important;

            border: none;
            color: white !important;
        }

        .ot {
            margin-left: 4px;
        }

        .crane2 {
            position: absolute;
            top: -26%;
        }
        
         .log-in,
        .btn-regis {
            margin-top: 3%;
            background-color: #6E7E1D !important;
            /* New color */
            margin-left: 0px;
            border: none;
            color: white !important;
        }

        /* .nav-link {
            display: block;
            padding: 0.5rem 5rem;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            font-size: 16px;
            line-height: 20px;
            /*letter-spacing: 1px;*/
            /* text-transform: uppercase; */
            /* color: #8BA83A; */
        /* }  */
        

        .container {
            padding-top: 20px;
        }

        .nav-tabs .nav-link {
            color: #333 !important;
            background-color: transparent !important;
            border: 1px solid green !important;
            border-radius: 18px !important;
            font-weight: bold !important;
            transition: all 0.3s ease !important;
            padding: 10px 20px !important;
            margin-right: 20px !important;
            margin-bottom: 20px !important;
        }

        .nav-tabs .nav-item:first-child .nav-link {
            margin-right: 20px !important;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #fff !important;
            background-color: #6E7E1D !important;
            border: 2px solid #6E7E1D !important;
            border-radius: 18px !important;
        }

        .nav-tabs .nav-link:hover {
            color: #6E7E1D !important;
            background-color: rgba(110, 126, 29, 0.1) !important;
        }
        
        
        .registerBtn, .send-otp{
            border:1px solid #000 !important;
        }
        
        .btn:hover {
            color: black !important;
            background-color: #ffffff !important;
            border-color: #6e7e1d !important;
            border: 1px solid #6e7e1d !important;
        }

          select.form-select option {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  }
    </style>

    <style>
        #otp-container {
            margin-left: 0px !important;
        }

        .inputs {
            width: auto;
            justify-content: flex-start;
        }

        .otp-input {
            text-align: center;
            width: 40px;
            height: 40px;
            font-size: 24px;
            margin: 5px;
        }
    </style>

    <meta name="csrf-token" content="MAY1PWbrUhKjyrZUA5zjOtcnY5b1mP0i3h49Cnyb">

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 d-flex align-items-center justify-content-center bg-light">
                <div class="card mt-3 tab-card mycard login-form rounded-4 p-4">
                    <div class="card-header tab-card-header mycarbody">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab"
                                    aria-controls="One" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab"
                                    aria-controls="Two" aria-selected="false">Register</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content col-12" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <div class="card-body">
                                <form id="loginForm" method="POST" action="{{ route('buyer.otp.login') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="mobile_no" class="col-md-4 col-form-label px-4">Mobile Number*</label>
                                        <div class="form-group d-flex align-items-center">
                                            <select id="login_country_code" name="country_code" data-live-search="true" class="selectpicker">                                                    
                                                <option data-content='<img src="https://flagcdn.com/16x12/ca.png" class="me-1"> +1 Canada' value="+1">+1</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/in.png" class="me-1"> +91 India' value="+91" selected>+91</option>
                                            </select>
                                            <input type="number" class="form-control" id="phone" name="phone" maxlength="10"
                                                placeholder="Mobile Number" />
                                        </div>
                                        <span id="login-phone-error" class="text-danger" style="display:none;"></span>
                                       <div class="form-group mt-3 position-relative">
                                        <label for="login_password">Password*</label>
                                            <input id="login_password" type="password" 
                                                name="password" 
                                                class="form-control" 
                                                placeholder="Enter Password" required/>

                                            <!-- 👁 Eye button -->
                                            <!-- <span class="position-absolute top-50 end-0 translate-middle-y me-3" 
                                                onclick="togglePassword()" 
                                                style="cursor: pointer;">
                                                <i class="bi bi-eye" id="toggleIcon"></i>
                                            </span> -->
                                        </div>
                                        <span id="password-error" class="text-danger" style="display:none;"></span>
                                        
                                            <button type="button" class="col-2 btn btn-default btn-sm send-otp" onclick="sendOTP()" style="background-color: #6e7e1d; width: auto; height: 40px; margin: 5px; color: white; border-color: #6e7e1d; margin-left:230px;">SEND CODE</button>
                                        
                                        <div id="success-message" style="display:none; color:green;"></div>

                                        <div id="phone-error" style="color: red; font-size: 14px; display: none;" class="mt-1"></div>

                                        <div id="otp-container" class="inputs d-flex flex-row justify-content-center mt-3 ot" style="display: none;">
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                        </div>

                                        <input type="hidden" name="otp" id="otp" />
                                    </div>
                                    <p id="resendText" style="display:none; margin-top:10px; color:#333;margin-left: 150px;">
                                        Didn't receive OTP? 
                                        <a href="javascript:void(0);" onclick="sendOTP(true)" id="resendBtn" style="color:#6e7e1d; font-weight:bold; ">
                                            Resend OTP
                                        </a>
                                    </p>
                                    <div class="row mb-0">
                                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-primary log-in">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                            <div class="mycard">
                                <div class="#">
                                    <!-- <form id="buyer-register-form" action="{{ route('buyer.register.store')}}" method="POST"> -->
                                    <form id="registerForm">
                                        @csrf
                                        <div id="form-errors" class="text-danger mt-2"></div>
                                        <div id="form-success" class="text-success mt-2"></div>
                                        <div class="form-group1 mb-3">
                                            <label>Full Name*</label>
                                            <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                                value="" required autofocus>
                                        </div>
                                        <div class="form-group1 mb-3">
                                            <label>Email*</label>
                                            <input type="email" placeholder="Email" id="email_address" class="form-control"
                                                name="email" required autofocus>
                                            <div id="email-error" class="mt-3 text-danger"></div>
                                        </div>
                                        <input type="hidden" name="buyer" id="buyer" value="buyer">

                                        <div class="form-group1 mb-3">
                                            <label>Mobile Number*</label>
                                            <div class="d-flex align-items-center">
                                                <select id="register_country_code" name="country_code" data-live-search="true" class="selectpicker">
                                              
                                                <option data-content='<img src="https://flagcdn.com/16x12/ca.png" class="me-1"> +1 Canada' value="+1">+1</option>
                                                
                                                <option data-content='<img src="https://flagcdn.com/16x12/in.png" class="me-1"> +91 India' value="+91" selected>+91</option>
                                                
                                            </select>
                                                <input type="tel" id="phone" name="phone" placeholder="Mobile Number" class="form-control w-100" inputmode="numeric" maxlength="10" pattern="[0-9]{10}" required oninput="validatePhone(this)"/>
                                                <div id="phone-error" class="mt-3 text-danger"></div>
                                            </div>
                                                <span id="phone_number_error" style="color:red; display:none;"></span>
                                        </div>
                                    <script>
                                        function validatePhone(el) {
                                            // keep only digits, cap at 10
                                            el.value = el.value.replace(/\D/g, '').slice(0, 10);

                                            const err = document.getElementById('phone-error');

                                            if (el.value.length === 10) {
                                            err.textContent = '';
                                            el.setCustomValidity('');
                                            } else {
                                            // show message for 1–9 digits (and 0 if you want)
                                            err.textContent = 'Please enter a 10 digit number';
                                            el.setCustomValidity('Please enter a 10 digit number');
                                            }
                                        }
                                    </script>
                                    <div class="form-group1 mb-3 position-relative">
                                      <label>Password*</label>
                                      <div class="position-relative">
                                          <input type="password" placeholder="Password" id="password" 
                                              class="form-control pe-5" name="password" required>
                                          <span class="toggle-password" style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;">
                                              👁️
                                          </span>
                                      </div>
                                      <!-- Password requirements -->
                                      <ul id="password-requirements" style="list-style:none; padding-left:0; margin-top:5px;">
                                          <li id="min-length" class="text-danger">❌ At least 10 characters</li>
                                          <li id="max-length" class="text-danger">❌ Maximum 12 characters</li>
                                          <li id="uppercase" class="text-danger">❌ At least one uppercase letter</li>
                                          <li id="special-char" class="text-danger">❌ At least one special character</li>
                                      </ul>
                                  </div>
                                
                                  <!-- Confirm Password -->
                                  <div class="form-group1 mb-3 position-relative">
                                      <label>Confirm Password*</label>
                                      <div class="position-relative">
                                          <input type="password" placeholder="Confirm Password" id="confirm_password" 
                                              class="form-control pe-5" name="password_confirmation" required>
                                          <span class="toggle-password" style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;">
                                              👁️
                                          </span>
                                      </div>
                                      <small id="confirm-password-error" class="text-danger"></small>
                                  </div>



                                    <div id="otp-container" class="inputs d-flex flex-row justify-content-center mt-3 ot" style="display:none;">
                                        <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" disabled />
                                        <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" disabled />
                                        <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" disabled />
                                        <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" disabled />
                                        <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" disabled />
                                        <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" disabled />
                                    </div>

                                    <!-- Verify button (hidden initially) -->
                                    <button type="button" id="verifyOtpBtn" class="btn btn-primary mt-3" style="display:none;">
                                        Verify OTP
                                    </button>

                                        <input type="hidden" name="role" value="1">
                                       <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-success btn-lg btn-regis" id="submitBtn" disabled >Register</button>
                                        </div>
                                    </form>
                                    <div class="mt-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">
              <div class="text-center" style="margin-top:0px">
                <h4 class="mb-4">Do You Want To Become Seller ?</h4>
                <h6 class="mb-4">Register as a Seller</h6>
                <a href="{{ url('seller_register') }}" class="btn btn-default mr-2 registerBtn">Register Now</a>
              </div>
            </div>
        </div>
    </div>
    
    
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const confirmError = document.getElementById('confirm-password-error');
    const submitBtn = document.getElementById('submitBtn');

    const minLength = 10;
    const maxLength = 12;
    const uppercaseRegex = /[A-Z]/;
    const specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;

    // Show/hide password
    document.querySelectorAll('.toggle-password').forEach((eye, index) => {
        eye.addEventListener('click', () => {
            const input = index === 0 ? password : confirmPassword;
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    });

    // Validation function
    function validatePassword() {
        const val = password.value;
        let valid = true;

        // Min length
        const minEl = document.getElementById('min-length');
        if (val.length >= minLength) {
            minEl.textContent = '✅ At least 10 characters';
            minEl.classList.remove('text-danger');
            minEl.classList.add('text-success');
        } else {
            minEl.textContent = '❌ At least 10 characters';
            minEl.classList.remove('text-success');
            minEl.classList.add('text-danger');
            valid = false;
        }

        // Max length
        const maxEl = document.getElementById('max-length');
        if (val.length <= maxLength && val.length > 0) {
            maxEl.textContent = '✅ Maximum 12 characters';
            maxEl.classList.remove('text-danger');
            maxEl.classList.add('text-success');
        } else {
            maxEl.textContent = '❌ Maximum 12 characters';
            maxEl.classList.remove('text-success');
            maxEl.classList.add('text-danger');
            valid = false;
        }

        // Uppercase
        const upperEl = document.getElementById('uppercase');
        if (uppercaseRegex.test(val)) {
            upperEl.textContent = '✅ At least one uppercase letter';
            upperEl.classList.remove('text-danger');
            upperEl.classList.add('text-success');
        } else {
            upperEl.textContent = '❌ At least one uppercase letter';
            upperEl.classList.remove('text-success');
            upperEl.classList.add('text-danger');
            valid = false;
        }

        // Special character
        const specialEl = document.getElementById('special-char');
        if (specialCharRegex.test(val)) {
            specialEl.textContent = '✅ At least one special character';
            specialEl.classList.remove('text-danger');
            specialEl.classList.add('text-success');
        } else {
            specialEl.textContent = '❌ At least one special character';
            specialEl.classList.remove('text-success');
            specialEl.classList.add('text-danger');
            valid = false;
        }

        return valid;
    }

    function validateConfirmPassword() {
        if (confirmPassword.value !== password.value) {
            confirmError.textContent = "Passwords do not match.";
            return false;
        } else {
            confirmError.textContent = "";
            return true;
        }
    }

    // Real-time validation
    password.addEventListener('input', toggleSubmitButton);
    confirmPassword.addEventListener('input', toggleSubmitButton);

    function toggleSubmitButton() {
        const passwordValid = validatePassword();
        const confirmValid = validateConfirmPassword();
        submitBtn.disabled = !(passwordValid && confirmValid);
    }
});
</script>



    <script>
        var otpInputs = document.querySelectorAll('.otp-input');

        otpInputs.forEach(function(input, index) {
            input.addEventListener('input', function() {
                if (this.value.length >= 1) {
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                }
            });

            input.addEventListener('keydown', function(event) {
                if (event.key === 'Backspace' && this.value.length === 0) {
                    if (index > 0) {
                        otpInputs[index - 1].focus();
                    }
                }
            });
        });
    </script>

    <script>
        document.getElementById("two-tab").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("two").classList.add("show", "active");
            $('#one').removeClass('show active');
        });
        document.getElementById("one-tab").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("one").classList.add("show", "active");
            $('#two').removeClass('show active');
        });
    </script>
    <script>
        function sendOTP() {
            var phone = $('#phone').val();
            var country_code = $('#login_country_code').val();
            if (!phone) {
                alert('Please enter your phone number.');
                return;
            }
            $.ajax({
                url: '{{ url("send-otp") }}',
                method: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify({
                    phone: phone,
                    country_code: country_code,
                    _token: 'MAY1PWbrUhKjyrZUA5zjOtcnY5b1mP0i3h49Cnyb'
                }),
                success: function(response) {
                    console.log(response);
                    alert('OTP has been sent to your mobile.');
                },
                error: function(xhr, status, error) {
                    console.error('Error Status:', status);
                    console.error('Error Thrown:', error);
                    console.error('Response Text:', xhr.responseText);
                    alert('Error sending OTP: ' + xhr.responseText);
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.nav-tabs .nav-link').click(function() {
                $('.nav-tabs .nav-link').removeClass('active');
                $(this).addClass('active');

                $('.tab-pane').removeClass('show active');
                $($(this).attr('href')).addClass('show active');
            });
        });
    </script>
    <script>
        function showErrorAndStayOnRegisterTab(errorMessage, fieldType) {
            // Selecting the correct error div based on fieldType
            var errorDivId = fieldType === 'email' ? '#email-error' : '#phone-error';

            // Update the text of the appropriate error div
            $(errorDivId).text(errorMessage);

            // Simulate staying on the register tab and handling tab controls if required
            // Remove any listener on the login tab to enforce user correction of the form
            $('#one-tab').off('click');

            // Show the registration tab content
            $('#two').addClass('show active');
            $('#one').removeClass('show active');
            $('#two-tab').addClass('active');
            $('#one-tab').removeClass('active');
        }
    </script>


</div>

@endsection

@push('scripts')

<!-- <script>
    function sendOTP() {
        var phone = $('#phone').val();
        var country_code = $('#login_country_code').val();

        if (phone.length !== 10 || isNaN(phone)) {
            $('#phone-error').text("Enter a valid 10-digit mobile number").show();
            return;
        } else {
            $('#phone-error').hide();
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $.ajax({
        //     url: "{{ route('buyer.otp.send') }}", // Your Laravel route
        //     method: 'POST',
        //     data: {
        //         _token: '{{ csrf_token() }}',
        //         phone: phone,
        //         country_code: country_code
        //     },
        //     success: function(response) {
        //         $('#phone-error').hide();
        //         $('#otp-container').slideDown();
        //     },
        //     error: function(xhr) {
        //         $('#phone-error').text('Failed to send OTP. Please try again.').show();
        //     }
        // });

        $.ajax({
            url: "{{ route('buyer.otp.send') }}", // Your Laravel route
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                phone: phone,
                country_code: country_code
            },
            success: function(response) {
                // Check if OTP sent
                if (response.status === 'otp_sent') {
                    $('#phone-error').hide();
                    $('#otp-container').slideDown();
                     $('#success-message').text(response.message).show();
                }
            },
            error: function(xhr) {
                if (xhr.status === 404) {
                    $('#phone-error').text('User not found').show();
                } else {
                    $('#phone-error').text('Failed to send OTP. Please try again.').show();
                }
            }
        });

    }

    // Concatenate OTP values
    $(document).on('keyup', '.otp-input', function() {
        var $inputs = $('.otp-input');
        var index = $inputs.index(this);

        if (this.value.length === this.maxLength && index < $inputs.length - 1) {
            $inputs.eq(index + 1).focus();
        }

        // Join values and put in hidden input
        let otp = '';
        $inputs.each(function() {
            otp += $(this).val();
        });
        $('#otp').val(otp);
    });
</script> -->

<script>
    function sendOTP(isResend = false) {
    var phone = $('#phone').val();
    var country_code = $('#login_country_code').val();
    var password = $('#login_password').val();

    if (phone.length !== 10 || isNaN(phone)) {
        $('#login-phone-error').text("Enter a valid 10-digit mobile number").show();
        return;
    } else {
        $('#login-phone-error').hide();
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{ route('buyer.otp.send') }}",
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            phone: phone,
            country_code: country_code,
            password: password,
        },
        success: function(response) {
            if (response.status === 'otp_sent') {
                $('#login-phone-error').hide();
                $('#otp-container').slideDown();
                $('#success-message').text(response.message).show();

                document.getElementById("resendText").style.display = "block";
            }
        },
        error: function(xhr) {
            document.getElementById("resendText").style.display = "block";
            if (xhr.status === 404) {
                $('#login-phone-error').text('User not found').show();
            } else if (xhr.status === 401) {
                $('#password-error').text('Invalid password').show();
            } else {
                $('#login-phone-error').text('Failed to send OTP. Please try again.').show();
            }
        }
    });
}

$(document).on('keyup', '.otp-input', function() {
        var $inputs = $('.otp-input');
        var index = $inputs.index(this);

        if (this.value.length === this.maxLength && index < $inputs.length - 1) {
            $inputs.eq(index + 1).focus();
        }

        // Join values and put in hidden input
        let otp = '';
        $inputs.each(function() {
            otp += $(this).val();
        });
        $('#otp').val(otp);
    });
</script>

<!-- <script>
$('#registerForm').on('submit', function(e) {
    e.preventDefault(); // 🚫 Stop normal form submit

    $.ajax({
        url: "{{ route('buyer.register.store') }}",
        method: 'POST',
        data: $(this).serialize(),
        beforeSend: function() {
            // Show loading
            Swal.fire({
                title: 'Processing...',
                text: 'Please wait while we register you as a buyer.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        },

        
        success: function(response) {
            // Clear errors
            Swal.close();

            $('.error-message').remove();

            Swal.fire({
                title: "Success!",
                text: "Buyer Registered successfully.",
                // icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "{{ route('buyer.register') }}";
            });
        },
        error: function(xhr) {
    Swal.close();
    $('.error-message').remove();
    $('#phone_number_error').hide().text(''); // clear old phone error

    if (xhr.status === 422) {
        let errors = xhr.responseJSON.errors;

        $.each(errors, function(key, value) {
            if (key === 'phone') {
                // special handling for phone
                $('#phone_number_error').text(value[0]).show();
                $('#phone').addClass('is-invalid'); // optional red border
            } else {
                // other fields normal fallback
                let inputField = $('[name="' + key + '"]');
                inputField.after(
                    '<div class="error-message text-danger mb-1">' + value[0] + '</div>'
                );
            }
        });
    }
}
    });
});
</script> -->
<script>
/* --- helper: enable OTP inputs and focus first --- */
function enableOtpInputs() {
    const $inputs = $('.otp-input');
    $inputs.prop('disabled', false).val('');           // enable and clear
    $inputs.prop('required', true);                    // optional: make them required now
    $('#otp-container').show();
    $('#verifyOtpBtn').show();
    $('#resendText').show();
    $inputs.first().focus();
}

/* --- register submit (your existing code — updated to call enableOtpInputs) --- */
$('#registerForm').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: "{{ route('buyer.register.store') }}",
        method: 'POST',
        data: $(this).serialize(),
        beforeSend: function() {
            Swal.fire({
                title: 'Processing...',
                text: 'Please wait while we register you as a buyer.',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });
        },
        success: function(response) {
            Swal.close();
            $('.error-message').remove();

            if (response.status === 'otp_sent') {
                // hide register button, show+enable OTP, save user_id
                $('#registerForm button[type=submit]').hide();
                enableOtpInputs();

                // add hidden user_id
                if ($('#user_id').length === 0) {
                    $('<input>').attr({
                        type: 'hidden',
                        id: 'user_id',
                        name: 'user_id',
                        value: response.user_id
                    }).appendTo('#registerForm');
                } else {
                    $('#user_id').val(response.user_id);
                }

                Swal.fire({
                    title: "OTP Sent!",
                    text: response.message,
                    icon: "success"
                });
            } else {
                // fallback success handling
                Swal.fire("Success", "Buyer Registered successfully.", "success");
            }
        },
        error: function(xhr) {
            Swal.close();
            $('.error-message').remove();
            $('#phone_number_error').hide().text('');

            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    if (key === 'phone') {
                        $('#phone_number_error').text(value[0]).show();
                        $('#phone').addClass('is-invalid');
                    } else {
                        let inputField = $('[name="' + key + '"]');
                        inputField.after('<div class="error-message text-danger mb-1">' + value[0] + '</div>');
                    }
                });
            } else {
                Swal.fire("Error", "Something went wrong. Please try again.", "error");
            }
        }
    });
});

/* --- auto-tab and numeric-only for OTP boxes --- */
$(document).on('input', '.otp-input', function(e) {
    // allow only digits, single char
    this.value = this.value.replace(/\D/g, '').slice(0, 1);

    if (this.value.length === 1) {
        // go to next enabled otp input
        $(this).nextAll('.otp-input:enabled').first().focus();
    }
});

$(document).on('keydown', '.otp-input', function(e) {
    if (e.key === 'Backspace' && $(this).val() === '') {
        $(this).prevAll('.otp-input:enabled').first().focus();
    }
});

/* --- verify OTP click --- */
$(document).on('click', '#verifyOtpBtn', function() {
    let otp = '';
    $('.otp-input:enabled').each(function() { otp += $(this).val(); });

    if (otp.length !== 4 && otp.length !== 6) {
        Swal.fire("Error", "Please enter the 4- or 6-digit OTP.", "error");
        return;
    }

    $.ajax({
        url: "{{ route('buyer.verify.otp') }}",
        method: 'POST',
        data: {
            _token: "{{ csrf_token() }}",
            user_id: $('#user_id').val(),
            otp: otp
        },
        beforeSend: function() {
            Swal.fire({
                title: 'Verifying OTP...',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });
        },
        success: function(response) {
            Swal.close();
            Swal.fire({
                title: "Success!",
                text: "You are now logged in.",
                icon: "success"
            }).then(() => {
                window.location.href = response.redirect;
            });
        },
        error: function(xhr) {
            Swal.close();
            let msg = (xhr.responseJSON && (xhr.responseJSON.error || xhr.responseJSON.message)) || "Invalid or expired OTP";
            Swal.fire("Error", msg, "error");
        }
    });
});
</script>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script>
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>

<script>
    // JavaScript to handle the click event on the "Register" link
    document.getElementById("two-tab").addEventListener("click", function(event) {
        // Prevent default link behavior
        event.preventDefault();
        // Show the "Register" tab content
        document.getElementById("two").classList.add("show", "active");
        $('#one').removeClass('show active');
    });
    document.getElementById("one-tab").addEventListener("click", function(event) {
        // Prevent default link behavior
        event.preventDefault();
        // Show the "Register" tab content
        document.getElementById("one").classList.add("show", "active");
        $('#two').removeClass('show active');
    });
</script>
<script>
    $(document).ready(function() {
        $('.nav-tabs .nav-link').click(function() {
            $('.nav-tabs .nav-link').removeClass('active');
            $(this).addClass('active');

            $('.tab-pane').removeClass('show active');
            $($(this).attr('href')).addClass('show active');
        });
    });
</script>



@endpush