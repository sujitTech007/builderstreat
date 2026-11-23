<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="(time in seconds)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DS+Sans&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/services.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/mostpopular.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/pricing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/team.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/testimonial.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/joinus.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/navbar2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/acordation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/missionstatement.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/aboutus.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/cdwasteproject1.css') }}"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Bootstrap 5 Bundle (no jQuery required) -->

    <style>
    .info {
        font-family: Montserrat;
        font-size: 14px;
        font-weight: 500;
        line-height: 25.2px;
        letter-spacing: 0.0015em;
        text-align: center;
        color: #FFFFFF;
        padding-left: 15px;
        padding-right: 15px;
        text-align: justify;
        text-justify: inter-word;
    }
	
	.headerContainer{
		padding-left: 100px !important;
		/* padding-right: 100px; */
	}

    /* Active nav styles */
    .nav-links .nav-link {
        color: #000000;
        position: relative;
    }
    .nav-links .nav-link.active {
        color: #6E7E1D !important;
        font-weight: 600;
    }
    .nav-links .link .nav-link:focus,
    .nav-links .link .nav-link:hover {
        color: #6E7E1D !important;
        font-weight: 600;
    }
    .nav-links .nav-link.active::after {
        /* content: ""; */
        position: absolute;
        left: 0;
        right: 0;
        bottom: -6px;
        height: 2px;
        background-color: #6E7E1D;
    }
    /* Keep dashboard/login button text white on hover */
    .nav-item.dropdown .nav-link,
    .nav-item.dropdown .nav-link:hover,
    .nav-item.dropdown .nav-link:focus {
        color: #ffffff !important;
    }

    .link a {
    font-family: Montserrat;
    font-size: 14px !important;
    font-weight: 500 !important;
    line-height: 17.07px;
    text-decoration: none;
    color: #646464;
    transition: transfrom 0.8s ease-in-out;
}
    
    .dropdown-item:hover {
    color: var(--bs-dropdown-link-hover-color);
    background-color: var(--bs-dropdown-link-hover-bg);
    color: #6e7e1d !important;
    border:1px solid #6e7e1d;
    border-radius: 2px;
}

    </style>
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/images/logo.png') }}">
</head>
<body>
    <title>BuildersTreat</title>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid headerContainer">
                <a class="navbar-brand logo1 " href="#">
                    <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="logo" class="fotter-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto nav-links">
                        <li class="nav-item link">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item link">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                        </li>
                        
                        <li class="nav-item link">
                            <a class="nav-link {{ request()->routeIs('ourcategories') ? 'active' : '' }}" href="{{ route('ourcategories') }}">Our Categories</a>
                        </li>
                        <li class="nav-item link">
                            <a class="nav-link {{ request()->routeIs('listing') ? 'active' : '' }}" href="{{ route('listing') }}">Material List</a>
                        </li>
                        <li class="nav-item link">
                            <a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">Pricing</a>
                        </li>
                        <li class="nav-item link">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                      
                     {{--   <li class="nav-item link">
                            <a class="nav-link pricing-link" href="{{ route('home') }}#pricemainnnn">Pricing</a>
                        </li>
                        <li class="nav-item link">
                            <a class="nav-link {{ request()->routeIs('team') ? 'active' : '' }}" href="{{ route('team') }}">Our Team</a>
                        </li> --}}
                      
                       @if(Auth::check())
                            @if(Auth::user()->role == 1)
                                <li class="nav-item dropdown" style="background: #6E7E1D;">
                                    <a class="nav-link" href="{{ route('buyer.profile.edit') }}" style="color:#fff;">Dashboard  <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="arrow"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('buyer.wishlist.index') }}" style="color:#6E7E1D;">
                                        <i class="fas fa-heart"></i> Wishlist
                                        <span class="badge bg-danger ms-1" id="header-wishlist-count">0</span>
                                    </a>
                                </li>
                            @elseif(Auth::user()->role == 2)
                                <li class="nav-item dropdown " style="background: #6E7E1D;">
                                    <a class="nav-link" href="{{ route('seller.dashboard') }}" style="color:#fff;">Dashboard  <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="arrow"></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown" style="background: #6E7E1D;">
                                <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" style="color:#fff;";
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Login/Register <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="arrow">
                                </a>
                                <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item text-white" href="{{ route('buyer.register') }}">Buyer</a></li>
                                    <hr class="p-0 m-0">
                                    <li><a class="dropdown-item text-white" href="{{ route('seller.register') }}">Seller</a></li>
                                </ul>
                            </li>
                        @endif
	 

                    </ul>
                </div>
            </div>
        </nav>
    </div> 
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mark Pricing active when URL has #pricemainnnn
    if (window.location.hash === '#pricemainnnn') {
        document.querySelectorAll('.nav-links .nav-link').forEach(function(a){ a.classList.remove('active'); });
        var pricing = document.querySelector('.nav-links .pricing-link');
        if (pricing) { pricing.classList.add('active'); }
    }

    // Update header wishlist count for logged-in buyers
    @if(Auth::check() && Auth::user()->role == 1)
        updateHeaderWishlistCount();
    @endif

    @if(session('success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: 'swal2-success-toast'
            }
        });
    @endif
    @if($errors->any())
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{ $errors->first() }}',
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: 'swal2-error-toast'
            }
        });
    @endif
});

function updateHeaderWishlistCount() {
    fetch('{{ route('wishlist.count') }}')
        .then(response => response.json())
        .then(data => {
            const countElement = document.getElementById('header-wishlist-count');
            if (countElement) {
                countElement.textContent = data.count;
            }
        })
        .catch(error => {
            console.error('Error updating header wishlist count:', error);
        });
}

// Function to be called from other pages when wishlist is updated
function refreshHeaderWishlistCount() {
    updateHeaderWishlistCount();
}
</script>
<style>
.swal2-success-toast {
    background: #28a745 !important;
    color: #fff !important;
    min-height: 50px;
    width: auto !important;
}
.swal2-error-toast {
    background: #dc3545 !important;
    color: #fff !important;
    min-height: 50px;
    width: auto !important;
}
</style> 