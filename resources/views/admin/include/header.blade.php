<!DOCTYPE html>

<html lang="en" data-sidenav-size="sm-hover-active" data-bs-theme="light" data-menu-color="light"
    data-topbar-color="brand">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title><?php echo isset($page_title) ? $page_title : 'Default Site Title'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/admin/assets/images/qby-logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/images/logo.png') }}">

    <!-- Vendor css -->
    <link href="{{ asset('assets/admin/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="{{asset('assets/admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style">

    <!-- Icons css -->
    <link href="{{asset('assets/admin/assets/css/icons.min.css" rel="stylesheet') }}" type="text/css">
    <link href="{{asset('assets/admin/assets/css/custom.css" rel="stylesheet') }}" type="text/css">

    <!-- Theme Config Js -->
    <script src="{{asset('assets/admin/assets/js/config.js.download')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : "Default Title"; ?></title>
    <script src="{{asset('assets/admin/assets/js/chart.js')}}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <style>
        span.noti-icon-badge.bg-danger {
    width: 25px;
    height: 25px;
    border-radius: 50px;
    color: #fff;
    font-size: 14px;
    display: flex
;
    align-items: center;
    justify-content: center;
}
.notification-item{
    white-space: normal;
}
    </style>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper active">

        <!-- Menu -->
        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu show">

            <!-- Brand Logo -->
            <a href="/" class="logo">
                <img src="{{asset('assets/admin/assets/images/logo.png')}}" alt="" height="100">
            </a>

            <!-- Full Sidebar Menu Close Button -->
            <button class="button-close-fullsidebar">
                <i class="ri-close-line align-middle"></i>
            </button>

            <div data-simplebar="init" class="simplebar-scrollable-y">
                <div class="simplebar-wrapper active" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask show">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper active" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content show" style="padding: 0px;">

                                    <!--- Sidenav Menu -->
                                    <ul class="side-nav">

                                        <li class="side-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                            <a href="{{ route('admin.dashboard') }}" class="side-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z">
                                                        </path>
                                                    </svg></span>
                                                <span class="menu-text"> Dashboard </span>
                                                <!-- <span class="badge bg-danger rounded"></span> -->
                                            </a>
                                        </li>
                                        <li class="side-nav-item {{ request()->routeIs('admin.buyers') || request()->routeIs('admin.buyer.view') ? 'active' : '' }}">
                                            <a href="{{ route('admin.buyers') }}" class="side-nav-link {{ request()->routeIs('admin.buyers') || request()->routeIs('admin.buyer.view') ? 'active' : '' }}">
                                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z">
                                                        </path>
                                                    </svg></span>
                                                <span class="menu-text"> Buyer Request
                                                </span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item {{ request()->routeIs('admin.sellers') || request()->routeIs('admin.seller.view') ? 'active' : '' }}">
                                            <a href="{{ route('admin.sellers') }}" class="side-nav-link {{ request()->routeIs('admin.sellers') || request()->routeIs('admin.seller.view') ? 'active' : '' }}">
                                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z">
                                                        </path>
                                                    </svg></span>
                                                <span class="menu-text"> Seller Request
                                                </span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.products') }}" class="side-nav-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                                                <span class="menu-icon">
                                                    <i class="fa fa-box"></i>
                                                </span>
                                                <span class="menu-text"> Products </span>
                                            </a>
                                        </li>
                                        <li class="side-nav-item {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.orders') }}" class="side-nav-link {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                                                <span class="menu-icon">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </span>
                                                <span class="menu-text"> Orders </span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item {{ request()->routeIs('admin.plans') ? 'active' : '' }}">
                                            <a href="{{ route('admin.plans') }}" class="side-nav-link {{ request()->routeIs('admin.plans') ? 'active' : '' }}">
                                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path>
                                                    </svg></span>
                                                <span class="menu-text"> Subscription
                                                </span>
                                            </a>
                                        </li>
                                        <li class="side-nav-item {{ request()->routeIs('admin.subscription-plans*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.subscription-plans.index') }}" class="side-nav-link {{ request()->routeIs('admin.subscription-plans*') ? 'active' : '' }}">
                                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path>
                                                    </svg></span>
                                                <span class="menu-text"> Subscription Plans
                                                </span>
                                            </a>
                                        </li>
                                        <li class="side-nav-item {{ request()->routeIs('admin.enquiries') || request()->routeIs('admin.enquiry.*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.enquiries') }}" class="side-nav-link {{ request()->routeIs('admin.enquiries') || request()->routeIs('admin.enquiry.*') ? 'active' : '' }}">
                                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z">
                                                        </path>
                                                    </svg></span>
                                                <span class="menu-text"> RFQs
                                                </span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.contact-messages.index') }}" class="side-nav-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                                                <span class="menu-icon"><i class="fa fa-envelope"></i></span>
                                                <span class="menu-text"> Contact Messages</span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                                            <a href="{{ route('admin.profile') }}" class="side-nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z">
                                                        </path>
                                                    </svg></span>
                                                <span class="menu-text"> Profile
                                                </span>
                                            </a>
                                        </li>
                                        <li class="side-nav-item">
                                            <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="side-nav-link" style="background:none;border:none;padding-left:15px;">
                                                    <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" data-lucide="share"
                                                            class="lucide lucide-share">
                                                            <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                                            <polyline points="16 6 12 2 8 6"></polyline>
                                                            <line x1="12" x2="12" y1="2" y2="15"></line>
                                                        </svg></span>
                                                    <span class="menu-text"> Log Out</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>


                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 240px; height: 826px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 527px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
            </div>
        </div>
        <!-- Sidenav Menu End -->

        <!-- Topbar Start -->
        <header class="app-topbar">
            <div class="page-container topbar-menu d-flex justify-content-end">
                <div class="d-flex align-items-center gap-2">



                    <!-- Sidebar Menu Toggle Button -->
                    <button class="sidenav-toggle-button px-2">
                        <i class="ri-menu-2-line fs-24"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="topnav-toggle-button px-2" data-bs-toggle="collapse"
                        data-bs-target="#topnav-menu-content">
                        <i class="ri-menu-2-line fs-24"></i>
                    </button>

                    <!-- Search for small devices -->
                    <div class="topbar-item d-flex d-xl-none">
                        <button class="topbar-link" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">
                            <i class="ri-search-line fs-22"></i>
                        </button>
                    </div>

                    <!-- Button Trigger Search Modal -->
                    <div class="topbar-search">

                        <form>

                            <div class="p-0 d-flex flex-row align-items-center" id="top-search">
                                <i class="ri-search-line fs-22"></i>
                                <input type="search" class="form-control border-0 bg-transparent"
                                    id="search-modal-input" placeholder="Search for actions, people,">
                                <button type="submit" class="btn p-0" data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                            </div>
                        </form>
                    </div>
                </div>
                  @php
    $notifications = App\Models\Notification::orderBy('created_at', 'desc')->get();
    $unreadCount = App\Models\Notification::where('is_admin_read', 0)->count();
@endphp

<div class="d-flex align-items-center gap-2">
    <div class="topbar-item">
        <div class="dropdown">
            <!-- Bell Icon -->
            <button class="topbar-link dropdown-toggle drop-arrow-none btnBG" data-bs-toggle="dropdown"
                data-bs-offset="0,25" type="button" data-bs-auto-close="outside" aria-haspopup="false"
                aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-bell animate-ring fs-22">
                    <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                    <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 
                        18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                </svg>

                @if($unreadCount > 0)
                    <span class="noti-icon-badge bg-danger">{{ $unreadCount }}</span>
                @endif
            </button>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg"
                style="height: 400px; overflow-y:auto;">
                
                <div class="p-2 border-bottom position-relative border-dashed">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0 fs-16 fw-semibold">Notifications</h6>
                        </div>
                    </div>
                </div>

                <div class="p-2">
                    @forelse($notifications as $notification)
                        <a href="javascript:void(0);"
                           class="dropdown-item d-flex align-items-start gap-2 notification-item"
                           data-id="{{ $notification->id }}" 
                           data-message="{{ $notification->message }}">
                            <i class="fa-solid fa-envelope{{ $notification->is_admin_read ? '-open' : '' }} text-primary"></i>
                            <div>
                                <strong>{{ $notification->message }}</strong><br>
                                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                    @empty
                        <div class="text-center text-muted py-3">No notifications found</div>
                    @endforelse
                </div>

                <!-- View All -->
                
                <div class="position-sticky bottom-0 start-0 end-0 bg-white">
                    <a href="{{ route('admin.notifications.all') }}"
                   class="btn dropdown-item position-absolute bottom-0 text-center text-reset text-decoration-underline fw-bold border-top border-light bg-white py-2">
                    View All
                </a>
                </div>
            </div>
        </div>
    </div>
</div>



                    <!-- User Dropdown -->
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"
                                data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('assets/admin/assets/images/user.png')}}" width="32"
                                    class="rounded-circle me-lg-2 d-flex userImage" alt="user-image" style="width:50px; height:50px;">
                                <span class="d-lg-flex flex-column gap-1 d-none">

                                    <span class="fw-semibold">@auth('admin')
    {{ Auth::guard('admin')->user()->name }}
@endauth</span>
                                </span>
                                <i class="ri-arrow-down-s-line d-none d-lg-block align-middle ms-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('admin.profile') }}" class="dropdown-item">
                                    <i class="ri-account-circle-line me-1 fs-16 align-middle"></i>
                                    <span class="align-middle">My Account</span>
                                </a>



                                <!-- item-->

                                <div class="dropdown-divider"></div>


                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item fw-semibold text-danger">
                                    <i class="ri-logout-box-line me-1 fs-16 align-middle"></i>
                                    <span class="align-middle">Sign Out</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Topbar End -->
        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if(session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('
                    success ') }}',
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

        
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const notificationItems = document.querySelectorAll('.notification-item');

    notificationItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            const message = this.getAttribute('data-message');

            // Show message in modal
            document.getElementById('notificationContent').innerText = message;
            let modal = new bootstrap.Modal(document.getElementById('notificationModal'));
            modal.show();

            // Mark as read
            fetch(route('notifications.read', { id: id }), {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Optionally refresh notification UI or remove badge
                    location.reload(); // Or dynamically update badge/icon
                }
            });
        });
    });
});
</script>


<!-- Modal for Notification Preview -->
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="notificationContent">
        <!-- Filled dynamically -->
      </div>
    </div>
  </div>
</div>
