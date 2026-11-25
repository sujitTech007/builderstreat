<!DOCTYPE html>

<html lang="en" data-sidenav-size="sm-hover-active" data-bs-theme="light" data-menu-color="light"
    data-topbar-color="brand">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title><?php echo isset($page_title) ? $page_title : 'Default Site Title'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">

     <link rel="icon" type="image/png" href="{{ asset('public/assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/dashboard.css') }}">

    <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : "Default Title"; ?></title>
    <script src="{{asset('public/assets/admin/assets/js/chart.js')}}"></script>
   
</head>

<body>
    <div class="wrapper active app">
        <aside class="sidebar">
           <a href="/" class="brand">
                <img src="{{asset('public/assets/images/logo.png')}}" alt="" height="100">
            </a>

           
            <div class="sidebar_nav">
                <div class="role-chip"><i></i> Admin control</div>
                <div class="nav-label">Workspace</div>
                <nav class="nav">
                    <ul class="side-nav p-0">

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
                </nav>
                <div class="clearfix"></div>
            </div>
        </aside>
                            
                   
    <div class="main">
        <header class="topbar">
            <button class="icon-btn menu-btn d-block" data-menu type="button" aria-label="Open menu"><i class="fa-solid fa-bars"></i></button>        
            <div class="top-actions">                        
                @php
                    $notifications = App\Models\Notification::orderBy('created_at', 'desc')->get();
                    $unreadCount = App\Models\Notification::where('is_admin_read', 0)->count();
                @endphp


                    <div class="dropdown">
                        <a class="icon-btn text-decoration-none position-relative" href="javascript:void(0);"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        data-bs-auto-close="outside">

                            <i class="fa-solid fa-bell"></i>

                            @if($unreadCount > 0)
                                <span class="badge-dot"></span>
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end shadow border-0 p-0"
                            style="width: 350px; max-height: 400px; overflow-y: auto;">

                            <!-- Header -->
                            <div class="d-flex justify-content-between align-items-center px-3 py-3 border-bottom">
                                <h6 class="mb-0 fw-semibold">Notifications</h6>

                                @if($unreadCount > 0)
                                    <span class="badge bg-primary rounded-pill">
                                        {{ $unreadCount }} New
                                    </span>
                                @endif
                            </div>

                            <!-- Notifications -->
                            <div>
                                @forelse($notifications as $notification)

                                    <a href="javascript:void(0);"
                                    class="dropdown-item px-3 py-3 border-bottom text-wrap notification-item"
                                    data-id="{{ $notification->id }}"
                                    data-message="{{ $notification->message }}">

                                        <div class="d-flex gap-3">

                                            <div class="text-primary">
                                                <i class="fa-solid fa-bell"></i>
                                            </div>

                                            <div>
                                                <div class="fw-semibold">
                                                    {{ $notification->message }}
                                                </div>

                                                <small class="text-muted">
                                                    {{ $notification->is_admin_read ? 'Read notification' : 'New notification' }}
                                                </small>

                                                <div class="small text-muted mt-1">
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                @empty

                                    <div class="text-center text-muted py-4">
                                        No notifications found
                                    </div>

                                @endforelse
                            </div>

                            <!-- View All -->
                            <div class="p-2 text-center bg-white">
                                <a href="{{ route('admin.notifications.all') }}"
                                class="btn btn-primary p-2 w-100 text-center d-block">
                                    View All Notifications
                                </a>
                            </div>

                        </div>
                    </div>


                    <div class="dropdown">

                        <a href="javascript:void(0);" class="user-pill text-decoration-none"
                        data-bs-toggle="dropdown" aria-expanded="false">

                            <span class="avatar">
                                <img src="{{ asset('public/assets/images/avatar.png') }}"
                                    alt="Admin"
                                    class="userImage"
                                    style="width: 40px; height: 40px; object-fit: cover;">
                            </span>

                            <div>
                                <strong class="text-capitalize">
                                    @auth('admin')
                                        {{ Auth::guard('admin')->user()->name }}
                                    @endauth
                                </strong>
                            </div>

                            <i class="fa-solid fa-chevron-down ms-2 small"></i>

                        </a>

                        <div class="dropdown-menu dropdown-menu-end shadow border-0 p-2">

                            <!-- Welcome -->
                            <div class="dropdown-header">
                                Welcome, {{ Auth::guard('admin')->user()->name ?? 'Admin' }}!
                            </div>

                            <!-- Settings / Profile -->
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                            href="{{ route('admin.profile') }}">
                                <i class="fa-solid fa-gear"></i>
                                <span>Settings</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- Logout -->
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf

                                <button type="submit"
                                        class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger border-0 bg-transparent w-100">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>Logout</span>
                                </button>
                            </form>

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
