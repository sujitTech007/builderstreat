<!DOCTYPE html>

<html lang="en" data-sidenav-size="md-sidebar">

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
           <a href="{{ route('admin.dashboard') }}" class="brand">
                <img src="{{asset('public/assets/images/logo.png')}}" alt="" height="100">
            </a>

           
            <div class="sidebar_nav">
                <div class="role-chip"><i></i> Admin control</div>
                <div class="nav-label">Workspace</div>
                <nav class="nav">
                    <ul class="side-nav p-0">
                        
                    <li class="side-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="side-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-gauge-high"></i>
                            </span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.buyers') || request()->routeIs('admin.buyer.view') ? 'active' : '' }}">
                        <a href="{{ route('admin.buyers') }}" class="side-nav-link {{ request()->routeIs('admin.buyers') || request()->routeIs('admin.buyer.view') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-users"></i>
                            </span>
                            <span class="menu-text">Buyer Request</span>
                        </a>
                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.sellers') || request()->routeIs('admin.seller.view') ? 'active' : '' }}">
                        <a href="{{ route('admin.sellers') }}" class="side-nav-link {{ request()->routeIs('admin.sellers') || request()->routeIs('admin.seller.view') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </span>
                            <span class="menu-text">Seller Request</span>
                        </a>
                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                        <a href="{{ route('admin.products') }}" class="side-nav-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-box"></i>
                            </span>
                            <span class="menu-text">Products</span>
                        </a>
                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                        <a href="{{ route('admin.orders') }}" class="side-nav-link {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </span>
                            <span class="menu-text">Orders</span>
                        </a>
                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.plans') ? 'active' : '' }}">
                        <a href="{{ route('admin.plans') }}" class="side-nav-link {{ request()->routeIs('admin.plans') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-credit-card"></i>
                            </span>
                            <span class="menu-text">Subscription</span>
                        </a>
                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.subscription-plans*') ? 'active' : '' }}">
                        <a href="{{ route('admin.subscription-plans.index') }}" class="side-nav-link {{ request()->routeIs('admin.subscription-plans*') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-layer-group"></i>
                            </span>
                            <span class="menu-text">Subscription Plans</span>
                        </a>
                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.enquiries') || request()->routeIs('admin.enquiry.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.enquiries') }}" class="side-nav-link {{ request()->routeIs('admin.enquiries') || request()->routeIs('admin.enquiry.*') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-file-invoice"></i>
                            </span>
                            <span class="menu-text">RFQs</span>
                        </a>
                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.contact-messages.index') }}" class="side-nav-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <span class="menu-text">Contact Messages</span>
                        </a>
                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                        <a href="{{ route('admin.profile') }}" class="side-nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-user-circle"></i>
                            </span>
                            <span class="menu-text">Profile</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="side-nav-link text-danger rounded-2 border-0 fs-12 p-2 px-3 fs-14 bg-transparent fw-bold">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </span>
                                <span class="menu-text">Log Out</span>
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
            <button class="icon-btn menu-btn d-block" type="button" aria-label="Toggle sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>
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
                                    <span class="btn btn-primary fs-10 rounded-pill">
                                        {{ $unreadCount }} New
                                    </span>
                                @endif
                            </div>

                            <!-- Notifications -->
                            <div>
                                @forelse($notifications as $notification)

                                    <a href="javascript:void(0);"
                                    class="dropdown-item px-3 py-2 border-bottom text-wrap notification-item"
                                    data-id="{{ $notification->id }}"
                                    data-message="{{ $notification->message }}">

                                        <div class="d-flex gap-2">

                                            <div class="text-primary">
                                                <i class="fa-solid fa-bell"></i>
                                            </div>

                                            <div>
                                                <div class="fw-semibold fs-12">
                                                    {{ $notification->message }}
                                                </div>

                                                <div class="text-muted fs-12 mt-2">
                                                    <span>{{ $notification->is_admin_read ? 'Read notification' : 'New notification' }}</span>
                                                    
                                                </div>

                                                <div class="small text-muted mt-1 fs-12">
                                                    <span>{{ $notification->created_at->diffForHumans() }}</span>
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
                                <strong class="text-capitalize fs-12">
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
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2 fs-14"
                            href="{{ route('admin.profile') }}">
                                <i class="fa-solid fa-gear"></i>
                                <span>Settings</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- Logout -->
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf

                                <button type="submit"
                                        class="dropdown-item d-flex align-items-center gap-2 py-2 fs-14 text-danger border-0 bg-transparent w-100">
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
