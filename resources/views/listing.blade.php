@extends('layouts.frontend')

@section('title', 'Material Listings | Builderstreat')

@section('content')
<section class="section wrap product-listings">
    <div class="section-head">
        <div class="eyebrow">LISTINGS</div>
        <h2>Explore Surplus Construction Materials</h2>
    </div>

    <form method="GET" action="{{ route('products.filter') }}" class="card p-3 border-1 listing-filter mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-lg-4 col-md-6">
                <label class="form-label fw-semibold" for="listing-query">Enter Keyword</label>
                <input id="listing-query" type="text" name="query" class="form-control" placeholder="Enter Keywords" value="{{ request('query') }}">
            </div>
            <div class="col-lg-3 col-md-6">
                <label class="form-label fw-semibold" for="listing-brand">Brand Name</label>
                <input id="listing-brand" type="text" name="brand_name" class="form-control" placeholder="Enter Brand Name" value="{{ request('brand_name') }}">
            </div>
            <div class="col-lg-3 col-md-6">
                <label class="form-label fw-semibold" for="listing-price">Price Range</label>
                <div class="d-flex align-items-center gap-2">
                    <input id="listing-price" type="range" name="price" class="form-range flex-grow-1 mb-0" min="0" max="{{ max(1, (int) round($highestPrice ?? 0)) }}" value="{{ request('price', 0) }}" step="2">
                    <span class="badge bg-success px-3 py-2" id="listing-price-value">${{ request('price', 0) }}</span>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 d-grid">
                <button type="submit" class="btn btn-primary text-center px-2">Apply Filters</button>
            </div>
        </div>
    </form>

    <div class="bt-grid">
        @forelse($products as $product)
            @php
                $discountAmount = ($product->offer * $product->discount) / 100;
                $finalPrice = $product->offer - $discountAmount;
            @endphp
            <article class="bt-card">
                <div class="bt-media">
                    <a href="{{ route('products.details', $product->id) }}">
                        <img src="{{ $product->image ? asset($product->image) : asset('public/assets/images/product.jpg') }}" alt="{{ $product->product_name }}" loading="lazy">
                    </a>
                    <button class="wishlist-btn" type="button" data-product-id="{{ $product->id }}" onclick="toggleWishlist({{ $product->id }})" aria-label="Toggle wishlist for {{ $product->product_name }}">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                </div>
                <div class="bt-body">
                    <div class="bt-info">
                        <p class="bt-cat">{{ optional($product->category)->name ?? 'Surplus Material' }}</p>
                        <h3 class="bt-title">{{ $product->product_name }}</h3>
                        <p class="bt-model">{{ $product->brand_name ?: ($product->model_number ?: 'Construction material') }}</p>
                    </div>
                    <div class="bt-pricing">
                        <div class="bt-price-row">
                            <p class="bt-price"><span class="bt-now">${{ number_format($finalPrice, 2) }}</span></p>
                            @if($product->discount)
                                <span class="bt-save">Save {{ rtrim(rtrim(number_format($product->discount, 2), '0'), '.') }}%</span>
                            @endif
                        </div>
                        <p class="bt-market">{{ Str::limit($product->description, 110) }}</p>
                    </div>
                    <div class="bt-actions">
                        <a href="{{ route('products.details', $product->id) }}" class="btn btn-sm bt-view">View</a>
                        @if(Auth::check())
                            <a href="{{ route('products.details', $product->id) }}" class="btn btn-amber btn-sm">Enquire</a>
                        @else
                            <a href="{{ route('buyer.register') }}" class="btn btn-amber btn-sm">Login to Enquire</a>
                        @endif
                    </div>
                </div>
            </article>
        @empty
            <p class="text-muted">No products found.</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</section>

<section class="section-tight wrap pt-0">
    <div class="cta-banner">
        <h2>Got a site that's about<br>to strip out?</h2>
        <div style="display:flex; gap:14px; flex-wrap:wrap;">
            <a href="{{ route('seller.register') }}" class="btn">List Your Surplus</a>
            <a href="{{ route('contact') }}" class="btn btn-ghost">Talk to Us</a>
        </div>
    </div>
</section>

<div class="toast-container" id="wishlist-toast-container" aria-live="polite"></div>

<style>
    .bt-media { position: relative; }
    .wishlist-btn { position: absolute; top: 12px; right: 12px; border: 0; border-radius: 50%; width: 40px; height: 40px; background: #fff; color: #7a746b; box-shadow: 0 2px 8px rgba(0,0,0,.15); }
    .wishlist-btn.active { color: #ae4a2b; }
    .toast-container { position: fixed; top: 20px; right: 20px; z-index: 1090; }
</style>

<script>
    const listingPrice = document.getElementById('listing-price');
    const listingPriceValue = document.getElementById('listing-price-value');
    if (listingPrice && listingPriceValue) {
        listingPrice.addEventListener('input', function () {
            listingPriceValue.textContent = '$' + this.value;
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.wishlist-btn').forEach(button => checkWishlistStatus(button.dataset.productId));
    });

    function checkWishlistStatus(productId) {
        fetch(@json(route('wishlist.check', ':productId')).replace(':productId', productId))
            .then(response => {
                if (!response.ok) throw new Error('Unable to check wishlist status');
                return response.json();
            })
            .then(data => {
                const button = document.querySelector('[data-product-id="' + productId + '"]');
                if (button) button.classList.toggle('active', Boolean(data.inWishlist));
            })
            .catch(error => console.error('Error checking wishlist status:', error));
    }

    function toggleWishlist(productId) {
        const button = document.querySelector('[data-product-id="' + productId + '"]');
        const token = document.querySelector('meta[name="csrf-token"]');
        if (!button || !token) return;

        const isInWishlist = button.classList.contains('active');
        const url = @json(route('wishlist.add', ':productId')).replace(':productId', productId);
        fetch(isInWishlist ? @json(route('wishlist.remove', ':productId')).replace(':productId', productId) : url, {
            method: isInWishlist ? 'DELETE' : 'POST',
            headers: { 'X-CSRF-TOKEN': token.content, 'Content-Type': 'application/json', 'Accept': 'application/json' }
        })
            .then(response => {
                if (!response.ok) {
                    if (response.status === 401) {
                        showToast('Please login first to add items to wishlist', 'warning');
                        return null;
                    }
                    throw new Error('Unable to update wishlist.');
                }
                return response.json();
            })
            .then(data => {
                if (!data) return;
                if (!data.success) throw new Error(data.message || 'Unable to update wishlist.');
                button.classList.toggle('active', !isInWishlist);
                showToast(data.message, 'success');
                if (typeof refreshWishlistCount === 'function') refreshWishlistCount();
                if (typeof refreshHeaderWishlistCount === 'function') refreshHeaderWishlistCount();
            })
            .catch(error => {
                console.error('Error updating wishlist:', error);
                showToast(error.message, 'error');
            });
    }

    function showToast(message, type) {
        const container = document.getElementById('wishlist-toast-container');
        const toast = document.createElement('div');
        const alertType = type === 'success' ? 'success' : type === 'warning' ? 'warning' : 'danger';
        toast.className = 'alert alert-' + alertType + ' alert-dismissible fade show';
        toast.appendChild(document.createTextNode(message || 'Wishlist updated.'));
        const close = document.createElement('button');
        close.type = 'button';
        close.className = 'btn-close';
        close.setAttribute('data-bs-dismiss', 'alert');
        close.setAttribute('aria-label', 'Close');
        toast.appendChild(close);
        container.appendChild(toast);
        window.setTimeout(() => toast.remove(), 5000);
    }
</script>
@endsection
