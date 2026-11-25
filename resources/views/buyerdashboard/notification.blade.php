@extends('layouts.buyer')

@section('content')
<div class="page-head">
    <div>
        <h1>Notifications</h1>
        <p>Updates about your account and activity.</p>
    </div>
</div>
<section class="card">
    <ul class="list-group list-group-flush">
        @foreach($notifications as $notification)
            <li class="list-group-item d-flex justify-content-between align-items-center gap-3 py-3">
                <div class="d-flex align-items-start gap-3">
                    <i class="fa-solid fa-envelope{{ $notification->is_read ? '-open' : '' }} text-primary"></i>
                    <div>
                        <strong>{{ $notification->message }}</strong>
                        <small class="d-block text-muted mt-1">{{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                @if(!$notification->is_read)
                    <form method="POST" action="{{ route('buyer.notifications.read', ['id' => $notification->id]) }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary text-nowrap">Mark as Read</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</section>
@endsection
