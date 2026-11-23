@extends('layouts.frontend')

@section('title', 'Contact Us | Builderstreat')

@section('content')
<section class="section wrap" id="contact">
    <div class="section-head text-center mx-auto mb-5" style="max-width: 760px;">
        <div class="eyebrow justify-content-center">CONTACT US</div>
        <h2>Let's Build Something Great Together</h2>
        <p>We'd love to hear from you. Share your query and our team will respond within 1–2 business days.</p>
    </div>

    <div class="section-contacts">
        <div class="calc-box">
            <div class="contact-details">
                <div class="section-head">
                    <div class="eyebrow">CONTACT</div>
                    <h2>Get in touch</h2>
                    <p>Reach us via email or visit our office.</p>
                </div>
                <div class="card mb-3 rounded-4 bg-transparent border-0 text-white">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle border d-flex align-items-center justify-content-center me-3 contact-icons">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">Email</h5>
                            <a href="mailto:info@builderstreat.ca" class="text-decoration-none">info@builderstreat.ca</a>
                        </div>
                    </div>
                </div>
                <div class="card rounded-4 bg-transparent border-0 text-white">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle border d-flex align-items-center justify-content-center me-3 contact-icons">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">Address</h5>
                            <p class="mb-0">8920 Woodbine Ave Unit 304, Markham, ON L3R 9W9, Canada</p>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <h4 class="fw-bold mb-3">Follow us</h4>
                <div class="d-flex gap-3">
                    <a href="https://www.facebook.com/builderstreatsolutions/" aria-label="Facebook" target="_blank" rel="noopener" class="btn btn-outline-warning rounded-circle d-flex align-items-center justify-content-center social-icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/builderstreatsolutions/" aria-label="Instagram" target="_blank" rel="noopener" class="btn btn-outline-warning rounded-circle d-flex align-items-center justify-content-center social-icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/builderstreat-solutions-inc/" aria-label="LinkedIn" target="_blank" rel="noopener" class="btn btn-outline-warning rounded-circle d-flex align-items-center justify-content-center social-icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>

            <div>
                <div class="calc-form">
                    <h2 class="text_dark fw-bold">Let's chat</h2>
                    <p class="mb-4">Tell us about your project or question.</p>
                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" for="contact-name">Full Name</label>
                                <input id="contact-name" name="name" type="text" class="form-control" placeholder="Jane Doe" value="{{ old('name') }}" required maxlength="120">
                                @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" for="contact-email">Email</label>
                                <input id="contact-email" name="email" type="email" class="form-control" placeholder="jane@example.com" value="{{ old('email') }}" required>
                                @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" for="contact-phone">Phone</label>
                                <input id="contact-phone" name="phone" type="tel" class="form-control" placeholder="+1 (555) 000-0000" value="{{ old('phone') }}" maxlength="40">
                                @error('phone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" for="contact-subject">Subject</label>
                                <input id="contact-subject" name="subject" type="text" class="form-control" placeholder="How can we help?" value="{{ old('subject') }}" maxlength="150">
                                @error('subject')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold" for="contact-message">Message</label>
                                <textarea id="contact-message" name="message" rows="6" class="form-control" placeholder="Write your message..." required maxlength="2000">{{ old('message') }}</textarea>
                                @error('message')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                    <label class="form-check-label small" for="agreeTerms">
                                        By submitting, you agree to our <a href="{{ route('terms.condition') }}">Terms &amp; Conditions</a> and <a href="{{ route('privacy.policy') }}">Privacy Policy</a>.
                                    </label>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="send-btn btn btn-success rounded-pill px-5 py-3">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
