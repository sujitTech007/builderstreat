@extends('layouts.seller')

@section('content')
<div class="page-head">
    <div>
        <h1>Welcome Back, {{ Auth::user()->name }}</h1>
        <p>Manage your surplus listings and keep up with buyer demand.</p>
    </div>
    <div class="actions">
        <a class="btn btn-primary" href="{{ route('seller.products.create') }}"><i class="fa-solid fa-plus"></i> Add material</a>
    </div>
</div>

<section class="stats">
    <a class="stat text-decoration-none" href="{{ route('seller.products.index') }}">
        <div class="stat-icon icon-primary"><i class="fa-solid fa-list-check"></i></div>
        <div class="stat-content">
            <span>My Listings</span>
            <strong>{{ $totalProducts }}</strong>
            <em>Manage your materials</em>
        </div>
    </a>
    <a class="stat text-decoration-none" href="{{ route('seller.inquiries.index') }}">
        <div class="stat-icon icon-success"><i class="fa-solid fa-file-circle-question"></i></div>
        <div class="stat-content">
            <span>Total Enquiries</span>
            <strong>{{ $totalInquiries }}</strong>
            <em>Requests from buyers</em>
        </div>
    </a>
    <a class="stat text-decoration-none" href="{{ route('seller.products.index') }}">
        <div class="stat-icon icon-warning"><i class="fa-solid fa-layer-group"></i></div>
        <div class="stat-content">
            <span>Available Categories</span>
            <strong>{{ $totalCategories }}</strong>
            <em>Categories for your listings</em>
        </div>
    </a>
</section>

<section class="card border-0 shadow-none p-0">
    <div class="card-header bg-white border-0 px-0 py-3">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <div>
                <h5 class="mb-1 fw-semibold">Manage your materials</h5>
                <p class="text-muted mb-0 small">Update your listings or respond to buyer enquiries.</p>
            </div>
            <a href="{{ route('seller.inquiries.index') }}" class="btn btn-ghost btn-sm">View Enquiries</a>
        </div>
    </div>
</section>
@endsection 