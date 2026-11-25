@extends('layouts.frontend')

@section('title', 'Buyer Login | Builderstreat')

@section('content')
<section class="section wrap">
    <div class="section-head text-center">
        <div class="eyebrow">Buyer Login</div>
        <h1>Sign in to your account</h1>
        <p>Enter your phone number and password to receive a verification code.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="login-form rounded-4 p-4">
                <form method="POST" action="{{ route('buyer.otp.login') }}" id="buyer-login-form">
                    @csrf
                    <div class="mb-3">
                        <label for="login-country-code" class="form-label">Country code</label>
                        <select class="form-select" name="country_code" id="login-country-code">
                            <option value="+1">+1 Canada</option>
                            <option value="+91" selected>+91 India</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="login-phone" class="form-label">Mobile number</label>
                        <input class="form-control" type="tel" name="phone" id="login-phone" inputmode="numeric" maxlength="10" required>
                    </div>
                    <div class="mb-3">
                        <label for="login-password" class="form-label">Password</label>
                        <input class="form-control" type="password" id="login-password" required>
                    </div>
                    <button class="btn btn-ghost mb-3" type="button" id="send-buyer-otp">Send code</button>
                    <div class="small mb-3" id="buyer-otp-message" role="status" aria-live="polite"></div>
                    <div class="d-flex gap-2 mb-3" id="buyer-otp-inputs" hidden>
                        @for($i = 0; $i < 6; $i++)
                            <input class="form-control text-center buyer-otp-digit" type="text" inputmode="numeric" maxlength="1" aria-label="OTP digit {{ $i + 1 }}">
                        @endfor
                    </div>
                    <input type="hidden" name="otp" id="buyer-otp">
                    <button class="btn btn-amber w-100" type="submit">Log in</button>
                </form>
                <p class="text-center mt-4 mb-0">New to Builderstreat? <a href="{{ route('buyer.register') }}">Create an account</a></p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('buyer-login-form');
        const sendButton = document.getElementById('send-buyer-otp');
        const phone = document.getElementById('login-phone');
        const countryCode = document.getElementById('login-country-code');
        const password = document.getElementById('login-password');
        const inputs = Array.from(document.querySelectorAll('.buyer-otp-digit'));
        const hiddenOtp = document.getElementById('buyer-otp');
        const message = document.getElementById('buyer-otp-message');

        sendButton.addEventListener('click', function () {
            message.textContent = '';
            const body = new URLSearchParams({
                _token: form.querySelector('input[name="_token"]').value,
                phone: phone.value,
                country_code: countryCode.value,
                password: password.value
            });

            fetch(@json(route('buyer.otp.send')), {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: body
            })
                .then(async function (response) {
                    const data = await response.json();
                    if (!response.ok) throw new Error(data.error || data.message || 'Unable to send verification code.');
                    return data;
                })
                .then(function (data) {
                    document.getElementById('buyer-otp-inputs').hidden = false;
                    message.textContent = data.message;
                    inputs[0].focus();
                })
                .catch(function (error) {
                    message.textContent = error.message;
                });
        });

        inputs.forEach(function (input, index) {
            input.addEventListener('input', function () {
                input.value = input.value.replace(/\D/g, '').slice(0, 1);
                hiddenOtp.value = inputs.map(function (digit) { return digit.value; }).join('').replace(/\s+$/, '');
                if (input.value && inputs[index + 1]) inputs[index + 1].focus();
            });
            input.addEventListener('keydown', function (event) {
                if (event.key === 'Backspace' && !input.value && inputs[index - 1]) inputs[index - 1].focus();
            });
        });
    });
</script>
@endpush
