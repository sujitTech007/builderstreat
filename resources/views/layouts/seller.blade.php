<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Seller Dashboard | Builderstreat')</title>
    <link rel="stylesheet" href="{{ asset('public/assets/builderstreat-html/dashboard/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/builderstreat-html/dashboard/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/builderstreat-html/dashboard/assets/css/style.css') }}">
    @stack('styles')
</head>
<body>
    @php
        $dashboardNotifications = App\Models\Notification::where('connection_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $dashboardUnreadCount = $dashboardNotifications->where('is_read', 0)->count();
    @endphp

    <header class="bg-white position-fixed top-0 w-100 z-1">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a class="brand bg-transparent p-0" href="{{ route('home') }}">
                    <img src="{{ asset('public/assets/builderstreat-html/dashboard/assets/images/logo.png') }}" alt="Builderstreat">
                </a>
                <div class="top-actions">
                    <div class="dropdown">
                        <a class="icon-btn text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications">
                            <i class="fa-solid fa-bell"></i>
                            @if($dashboardUnreadCount > 0)<span class="badge-dot"></span>@endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow border-0 p-0" style="width: 350px; max-height: 420px; overflow-y: auto;">
                            <div class="d-flex justify-content-between align-items-center px-3 py-3 border-bottom">
                                <h6 class="mb-0 fw-semibold">Notifications</h6>
                                <span class="badge bg-primary rounded-pill">{{ $dashboardUnreadCount }} New</span>
                            </div>
                            @forelse($dashboardNotifications as $notification)
                                <a href="#" class="dropdown-item px-3 py-3 border-bottom text-wrap dashboard-notification" data-message="{{ $notification->message }}" data-read-url="{{ route('notifications.read', $notification->id) }}">
                                    <div class="d-flex gap-3">
                                        <div class="{{ $notification->is_read ? 'text-muted' : 'text-primary' }}"><i class="fa-solid fa-bell"></i></div>
                                        <div>
                                            <div class="fw-semibold">{{ $notification->message }}</div>
                                            <div class="small text-muted mt-1">{{ $notification->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p class="px-3 py-3 mb-0 text-muted small">You have no notifications.</p>
                            @endforelse
                            <div class="p-2 text-center">
                                <a href="{{ route('notifications.all') }}" class="btn btn-primary p-2 w-100">View All Notifications</a>
                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->hasActiveSubscription())
                        <a class="btn btn-olive btn-sm" href="{{ route('seller.plan.index') }}">Active Subscription</a>
                    @elseif(Auth::user()->subscriptions()->exists())
                        <a class="btn btn-primary btn-sm" href="{{ route('seller.payments.index') }}">Renew Subscription</a>
                    @else
                        <a class="btn btn-olive btn-sm" href="{{ route('pricing') }}">Buy Subscription Plan</a>
                    @endif

                    <div class="dropdown">
                        <a href="#" class="user-pill text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            <div>
                                <strong>{{ Auth::user()->name }}</strong>
                                <small class="d-block small">Seller workspace</small>
                            </div>
                            <i class="fa-solid fa-chevron-down ms-2 small"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow border-0 p-2">
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('seller.profile.edit') }}">
                                <i class="fa-regular fa-user"></i><span>Profile</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('seller.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger">
                                    <i class="fa-solid fa-right-from-bracket"></i><span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <button class="menu-btn" type="button" data-menu aria-label="Open menu"><i class="fa-solid fa-bars"></i></button>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="user_app app">
            <aside class="sidebar user_sidebar">
                <div class="sidebar_nav">
                    <div class="role-chip"><i></i> Seller workspace</div>
                    <div class="nav-label">Workspace</div>
                    <nav class="nav flex-column">
                        <a class="nav-link{{ request()->routeIs('seller.dashboard') ? ' active' : '' }}" href="{{ route('seller.dashboard') }}">
                            <i class="fa-solid fa-table-columns"></i><span>Dashboard</span>
                        </a>
                        <a class="nav-link{{ request()->routeIs('seller.products.*') ? ' active' : '' }}" href="{{ route('seller.products.index') }}">
                            <i class="fa-solid fa-list"></i><span>My Listings</span>
                        </a>
                        <a class="nav-link{{ request()->routeIs('seller.products.create') ? ' active' : '' }}" href="{{ route('seller.products.create') }}">
                            <i class="fa-solid fa-plus"></i><span>Add Material</span>
                        </a>
                        <a class="nav-link{{ request()->routeIs('seller.inquiries.*') ? ' active' : '' }}" href="{{ route('seller.inquiries.index') }}">
                            <i class="fa-regular fa-comments"></i><span>Buyer Enquiries</span>
                        </a>
                        <a class="nav-link{{ request()->routeIs('seller.orders.*') ? ' active' : '' }}" href="{{ route('seller.orders.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i><span>Orders</span>
                        </a>
                        <a class="nav-link{{ request()->routeIs('seller.payments.*') ? ' active' : '' }}" href="{{ route('seller.payments.index') }}">
                            <i class="fa-regular fa-credit-card"></i><span>Payments</span>
                        </a>
                        <a class="nav-link{{ request()->routeIs('seller.plan.*') ? ' active' : '' }}" href="{{ route('seller.plan.index') }}">
                            <i class="fa-solid fa-tag"></i><span>Plan</span>
                        </a>
                        <a class="nav-link{{ request()->routeIs('seller.profile.*') ? ' active' : '' }}" href="{{ route('seller.profile.edit') }}">
                            <i class="fa-regular fa-user"></i><span>Profile &amp; Settings</span>
                        </a>
                        <a class="nav-link" href="{{ route('notifications.all') }}">
                            <i class="fa-regular fa-bell"></i><span>Notifications</span>
                        </a>
                        <form method="POST" action="{{ route('seller.logout') }}">
                            @csrf
                            <button type="submit" class="nav-link text-start"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></button>
                        </form>
                    </nav>
                </div>
            </aside>
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="notificationContent"></div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/assets/builderstreat-html/dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/builderstreat-html/dashboard/assets/js/dashboard.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.dashboard-notification').forEach(item => {
                item.addEventListener('click', function (event) {
                    event.preventDefault();
                    document.getElementById('notificationContent').innerText = this.dataset.message;
                    bootstrap.Modal.getOrCreateInstance(document.getElementById('notificationModal')).show();
                    fetch(this.dataset.readUrl, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': @json(csrf_token()), 'Accept': 'application/json' }
                    }).then(response => {
                        if (!response.ok) throw new Error('Unable to mark notification as read');
                        window.location.reload();
                    }).catch(error => console.error('Error marking notification as read:', error));
                });
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
