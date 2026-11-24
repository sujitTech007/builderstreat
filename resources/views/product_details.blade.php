@extends('layouts.frontend')

@section('title', $product->product_name . ' | Builderstreat')

@section('content')
@php
$discountAmount = ($product->offer * $product->discount) / 100;
$finalPrice = $product->offer - $discountAmount;
@endphp

<section class="section wrap">
    <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a><span>/</span>
        <a href="{{ route('listing') }}">Material List</a><span>/</span>
        <strong>{{ $product->product_name }}</strong>
    </nav>

    <div class="product_details">
        <div class="product-photo">
            <img src="{{ $product->image ? asset($product->image) : asset('public/assets/images/product.jpg') }}" alt="{{ $product->product_name }}">
            <button class="wishlist-btn" type="button" data-product-id="{{ $product->id }}" onclick="toggleWishlist({{ $product->id }})" aria-label="Toggle wishlist for {{ $product->product_name }}">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>
        <div>
            <p class="product_categories">{{ optional($product->category)->name ?? 'Surplus Material' }}</p>
            <h1>{{ $product->product_name }}</h1>
            <p class="prodcut-model">{{ $product->brand_name ?: ($product->model_number ?: 'Construction material') }}</p>

            <div class="product-value">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                    <h2 class="text-color-primary">${{ number_format($finalPrice, 2) }}</h2>
                    @if($product->discount)
                    <span class="bg-success text-success bg-opacity-25 rounded-4 px-2 py-1 fs-12">Save {{ rtrim(rtrim(number_format($product->discount, 2), '0'), '.') }}%</span>
                    @endif
                </div>
                @if($product->offer)
                <p class="fs-12">Listed price <small class="text-muted">${{ number_format($product->offer, 2) }}</small></p>
                @endif
                <div class="d-flex flex-wrap gap-2 mt-3">
                    @if(Auth::check())
                    <button type="button" class="btn btn-amber" data-bs-toggle="modal" data-bs-target="#enquiryModal">Enquire Now</button>
                    @else
                    <a href="{{ route('buyer.register') }}" class="btn btn-amber">Login to Enquire</a>
                    @endif
                    <a href="{{ route('listing') }}" class="btn btn-ghost">Back to Listings</a>
                </div>
            </div>

            <ol class="steps d-grid gap-2">
                <li>Send an enquiry for the material and quantity you need.</li>
                <li>Confirm the details and arrangements with the seller.</li>
                <li>Review your enquiry and orders from your Buyer Dashboard.</li>
            </ol>
        </div>
    </div>

    <div class="product-details">
        <div>
            <h3>Description</h3>
            <p>{{ $product->description }}</p>
        </div>
        <div>
            <h3>Specifications</h3>
            <table class="w-100 border-1">
                <tbody>
                    <tr>
                        <th>Category</th>
                        <td>{{ optional($product->category)->name ?? 'Surplus Material' }}</td>
                    </tr>
                    <tr>
                        <th>Brand</th>
                        <td>{{ $product->brand_name ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Model</th>
                        <td>{{ $product->model_number ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Serial No.</th>
                        <td>{{ $product->serial_number ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Our price</th>
                        <td>${{ number_format($finalPrice, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>


<section class="related_products mb-5">
    <div class="container">
        <div class="row">
            <h3></h3>
        </div>
        <div class="section-head">

            <div class="eyebrow">Related products</div>

            <h2>More Surplus Materials</h2>

        </div>
        <div class="row">
            <div class="related_products_list">
                <div class="swiper btSwiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <a class="related_product" href="material-details.html">

                                <div class="related_product-img"><img src="{{ asset('public/assets/images/tiles-thumb.png') }}" alt="Porcelain Floor Tiles"

                                        loading="lazy"></div>

                                <div class="related_product-body">

                                    <h4>Porcelain Floor Tiles</h4>

                                    <p>$2.25 <small>/ sq ft</small></p>

                                </div>

                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="related_product" href="material-details.html">

                                <div class="related_product-img"><img src="{{ asset('public/assets/images/wood.png') }}" alt="Framing Lumber"

                                        loading="lazy"></div>

                                <div class="related_product-body">

                                    <h4>Framing Lumber</h4>

                                    <p>$2.75 <small>/ piece</small></p>

                                </div>

                            </a>

                        </div>
                        <div class="swiper-slide">
                            <a class="related_product" href="material-details.html">

                                <div class="related_product-img"><img src="{{ asset('public/assets/images/door.png') }}" alt="Interior Doors"

                                        loading="lazy"></div>

                                <div class="related_product-body">

                                    <h4>Interior Doors</h4>

                                    <p>$195.00 <small>/ door</small></p>

                                </div>

                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="related_product" href="material-details.html">

                                <div class="related_product-img"><img src="{{ asset('public/assets/images/product-3.jpg') }}" alt="Cement" loading="lazy"></div>

                                <div class="related_product-body">

                                    <h4>Cement</h4>

                                    <p>$10.50 <small>/ bag</small></p>

                                </div>

                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



</section>

@if(Auth::check())
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('products.enquiry', $product->id) }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="enquiryModalLabel">Product Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" id="qty" name="qty" class="form-control" placeholder="Enter Quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Type your enquiry here..."></textarea>
                    </div>
                    <h5 class="modal-title mb-3">Shipping Address</h5>
                    <div class="mb-3">
                        <label for="contact_person" class="form-label">Contact Person Name (Optional)</label>
                        <input type="text" id="contact_person" name="contact_person" class="form-control" placeholder="Enter your contact person name...">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address..." required>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" id="state" name="state" class="form-control" placeholder="Enter your state..." required>
                    </div>
                    <div class="mb-3">
                        <label for="postal" class="form-label">Postal Code</label>
                        <input type="text" id="postal" name="postal_code" class="form-control" placeholder="Enter your postal code..." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-ghost" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit Enquiry</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<div class="toast-container" id="wishlist-toast-container" aria-live="polite"></div>

<style>
    .product-photo {
        position: relative;
    }

    .wishlist-btn {
        position: absolute;
        top: 16px;
        right: 16px;
        border: 0;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        background: #fff;
        color: #7a746b;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .15);
    }

    .wishlist-btn.active {
        color: #ae4a2b;
    }

    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1090;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        checkWishlistStatus({
            {
                $product - > id
            }
        });
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
        const addUrl = @json(route('wishlist.add', ':productId')).replace(':productId', productId);
        const removeUrl = @json(route('wishlist.remove', ':productId')).replace(':productId', productId);
        fetch(isInWishlist ? removeUrl : addUrl, {
                method: isInWishlist ? 'DELETE' : 'POST',
                headers: {
                    'X-CSRF-TOKEN': token.content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
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
                button.setAttribute('aria-pressed', String(!isInWishlist));
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