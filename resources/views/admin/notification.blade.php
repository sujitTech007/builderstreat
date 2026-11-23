@include('admin.include.header')

<div class="page-content">
<div class="container">
    <h4>All Notifications</h4>
    <ul class="list-group">
        @foreach($notifications as $notification)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div>
                    <i class="fa-solid fa-envelope{{ $notification->is_admin_read ? '-open' : '' }} text-primary"></i>
                    <strong>{{ $notification->message }}</strong><br>
                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                </div>
                @if(!$notification->is_admin_read)
                    <form method="POST" action="{{ route('admin.notifications.read', ['id' => $notification->id]) }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary">Mark as Read</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</div>
</div>
@include('admin.include.footer')
