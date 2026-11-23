@extends('layouts.buyer')

@section('content')
<div class="page-head">
    <div>
        <h1>Buyer Dashboard</h1>
        <p>Browse surplus materials and keep track of your enquiries, saved products, and orders.</p>
    </div>
    <div class="actions">
        <a class="btn btn-primary" href="{{ route('listing') }}">Browse materials</a>
    </div>
</div>

<section class="grid-3">
    <a class="material-card" href="{{ route('buyer.inquiries.index') }}">
        <img src="{{ asset('assets/builderstreat-html/dashboard/assets/images/photo-1.avif') }}" alt="">
        <div class="body">
            <h3>My Enquiries</h3>
            <p class="help">Review your requests and seller responses.</p>
        </div>
    </a>
    <a class="material-card" href="{{ route('buyer.wishlist.index') }}">
        <img src="{{ asset('assets/builderstreat-html/dashboard/assets/images/tiles-thumb.png') }}" alt="">
        <div class="body">
            <h3>Saved Materials</h3>
            <p class="help">Return to materials you have added to your wishlist.</p>
        </div>
    </a>
    <a class="material-card" href="{{ route('buyer.orders.index') }}">
        <img src="{{ asset('assets/builderstreat-html/dashboard/assets/images/door.png') }}" alt="">
        <div class="body">
            <h3>My Orders</h3>
            <p class="help">View your order and payment activity.</p>
        </div>
    </a>
</section>
@endsection 