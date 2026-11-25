<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Builderstreat — Materials Exchange for Surplus Construction Material')</title>
    <link rel="icon" type="image/png" href="{{ asset('public/assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    @stack('styles')
    @stack('head-scripts')
</head>
<body>
    <header>
        <div class="wrap nav">
            <div class="brand">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('public/assets/builderstreat-html/assets/images/logo.png') }}" alt="Builderstreat">
                </a>
            </div>
            <nav class="links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
                <a href="{{ route('ourcategories') }}" class="{{ request()->routeIs('ourcategories') ? 'active' : '' }}">Our Categories</a>
                <a href="{{ route('listing') }}" class="{{ request()->routeIs('listing') || request()->routeIs('products.details') ? 'active' : '' }}">Material List</a>
                <a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'active' : '' }}">Pricing</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </nav>
            <div class="nav-cta">
                @auth
                    @if(Auth::user()->role == 1)
                        <a href="{{ route('buyer.dashboard') }}" class="btn btn-ghost btn-sm">Buyer Dashboard</a>
                        <a href="{{ route('buyer.wishlist.index') }}" class="btn btn-amber btn-sm">
                            Wishlist <span class="badge bg-danger ms-1" id="header-wishlist-count">0</span>
                        </a>
                    @elseif(Auth::user()->role == 2)
                        <a href="{{ route('seller.dashboard') }}" class="btn btn-ghost btn-sm">Seller Dashboard</a>
                        <a href="{{ route('seller.products.index') }}" class="btn btn-amber btn-sm">My Listings</a>
                    @endif
                @else
                    <a href="{{ route('buyer.register') }}" class="btn btn-ghost btn-sm">Log In</a>
                    <a href="{{ route('seller.register') }}" class="btn btn-amber btn-sm">Sign Up</a>
                @endauth
            </div>
            <button class="mobile-toggle" type="button" aria-label="Menu"><span></span><span></span><span></span></button>
        </div>
    </header>

    @if(session('success') || session('message') || $errors->any())
        <div class="wrap pt-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="wrap">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="brand" style="margin-bottom:6px;">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('public/assets/builderstreat-html/assets/images/logo.png') }}" alt="Builderstreat">
                        </a>
                    </div>
                    <p>At Builderstreat, our mission is to revolutionize the construction and demolition waste recycling industry by providing a seamless and sustainable solution for material exchange. We aim to connect stakeholders, minimize waste, and promote eco-friendly practices that build a greener future for all.</p>
                </div>
                <div>
                    <h5>Company</h5>
                    <ul class="ps-0">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('ourcategories') }}">Our Categories</a></li>
                        <li><a href="{{ route('listing') }}">Listings</a></li>
                        <li><a href="{{ route('pricing') }}">Pricing</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h5>Contact</h5>
                    <ul class="ps-0">
                        <li><a href="mailto:info@builderstreat.ca">info@builderstreat.ca</a></li>
                        <li><a href="tel:+1234567890">+1 (234) 567-8900</a></li>
                        <li>8920 Woodbine Ave Unit 304, Markham, ON L3R 9W9, Canada</li>
                    </ul>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/builderstreatsolutions/" aria-label="Facebook" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/builderstreatsolutions/" aria-label="Instagram" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/builderstreat-solutions-inc/" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <span>© {{ date('Y') }} Builderstreat. All rights reserved.</span>
                <span><a href="{{ route('privacy.policy') }}">Privacy Policy</a> &nbsp;·&nbsp; <a href="{{ route('terms.condition') }}">Terms &amp; Conditions</a></span>
            </div>
        </div>
    </footer>

    <script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/script.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.querySelector('.mobile-toggle');
            const links = document.querySelector('nav.links');
            const cta = document.querySelector('.nav-cta');
            if (!toggle || !links || !cta) return;

            toggle.addEventListener('click', function () {
                const showing = links.style.display === 'flex';
                links.style.display = showing ? 'none' : 'flex';
                cta.style.display = showing ? 'none' : 'flex';
                toggle.setAttribute('aria-expanded', String(!showing));
                links.style.flexDirection = 'column';
                links.style.position = 'absolute';
                links.style.top = '64px';
                links.style.left = '0';
                links.style.right = '0';
                links.style.background = 'var(--paper)';
                links.style.padding = '20px 28px';
                links.style.borderBottom = '1px solid var(--line)';
                links.style.gap = '18px';
                cta.style.position = 'absolute';
                cta.style.top = showing ? '64px' : (links.getBoundingClientRect().bottom + 16) + 'px';
                cta.style.left = '28px';
                cta.style.right = '0';
                cta.style.background = 'var(--paper)';
                cta.style.padding = '12px 28px';
            });

            const wishlistCount = document.getElementById('header-wishlist-count');
            if (wishlistCount) refreshHeaderWishlistCount();
        });

        function refreshHeaderWishlistCount() {
            const count = document.getElementById('header-wishlist-count');
            if (!count) return;
            fetch(@json(route('wishlist.count')))
                .then(response => {
                    if (!response.ok) throw new Error('Unable to fetch wishlist count');
                    return response.json();
                })
                .then(data => { count.textContent = data.count; })
                .catch(error => console.error('Error updating header wishlist count:', error));
        }
    </script>
    @stack('scripts')
</body>
</html>
