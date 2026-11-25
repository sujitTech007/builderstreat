@extends('layouts.buyer')
<style>
    .product-list-heading {
        text-align: center !important;
        font-size: 30px !important;
        font-weight: 600 !important;
        margin-top: 10px !important;
    }

    img.card-img-top.prdct-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    h5.card-title.prdct-text1 {
        font-size: 17px;
        font-weight: 600;
    }

    p.card-text.prdct-textp {
        font-size: 14px;
        font-weight: 600;
        color: grey;
    }

    .d-img-top {
        border-top-left-radius: var(--bs-card-inner-border-radius);
        border-top-right-radius: var(--bs-card-inner-border-radius);
        height: 300px;
        object-fit: cover;
    }

    .listing-btn {
        background-color: #6E7E1D;
        border-color: #6E7E1D;
    }

    .wishlist-btn {
        position: absolute;
        top: 0;
        right: 10px;
        background: #ffeb3b;
        border: none;
        width: 38px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.2s ease;
        z-index: 10;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        clip-path: polygon(0 0, 100% 0, 100% 75%, 50% 100%, 0 75%);
    }

    .wishlist-btn i {
        font-size: 16px;
    }

    .wishlist-btn:hover {
        transform: translateY(-1px);
    }

    .wishlist-btn.active {
        color: #dc3545;
    }

    .wishlist-btn:not(.active) {
        color: #6c757d;
    }

    .card {
        position: relative;
    }

    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }

    .listing-filter {
        margin-top: 0px;
    }

    .listing-filter-range {
        font-size: 15px;
        padding: 3px 5px 3px 5px;
        border: 1px solid #6e7e1d;
        background: #6e7e1d;
        border-radius: 15px;
        color: white;
    }

    .range-value {
        margin-top: 10px;
        margin-right: 20px;
    }

    .range-input {
        width: 100%;
    }
</style>


<style>
    .rounded-start {
        border-bottom-left-radius: var(--bs-border-radius) !important;
        border-top-left-radius: var(--bs-border-radius) !important;
        height: 300px;
        object-fit: cover;
    }

    .listing-btn {
        background-color: #6E7E1D;
        border-color: #6E7E1D;
    }

    .wishlist-btn {
        position: absolute;
        top: 0;
        right: 10px;
        background: #ffeb3b;
        border: none;
        width: 38px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.2s ease;
        z-index: 10;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        clip-path: polygon(0 0, 100% 0, 100% 75%, 50% 100%, 0 75%);
    }

    .wishlist-btn i {
        font-size: 16px;
    }

    .wishlist-btn:hover {
        transform: translateY(-1px);
    }

    .wishlist-btn.active {
        color: #dc3545;
    }

    .wishlist-btn:not(.active) {
        color: #6c757d;
    }

    .card {
        position: relative;
    }

    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }
</style>

@section('content')
<div class="page-head">
    <div>
        <h1>Material Details</h1>
        <p>Review product information and contact the seller with an enquiry.</p>
    </div>
</div>
<div class="col-12">
    <div class="card mb-4 overflow-hidden">
        <button class="wishlist-btn" data-product-id="{{ $product->id }}" onclick="toggleWishlist({{ $product->id }})">
            <i class="fas fa-heart"></i>
        </button>
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/400x250' }}" class="img-fluid rounded-start w-100 h-100" alt="{{ $product->name }}" style="object-fit:cover; min-height:280px;">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h3 class="card-title mb-3">{{ $product->product_name }}</h3>
                    <p class="mb-2"><strong>Model:</strong> {{ $product->brand_name ?? '-' }}</p>
                    @php
                    // discount is a percentage, e.g. 20 means 20%
                    $discountAmount = ($product->offer * $product->discount) / 100;
                    $finalPrice = $product->offer - $discountAmount;
                    @endphp
                    <p class="mb-2"><strong>Price:</strong> ${{ number_format($finalPrice, 2) }}</p>
                    <p class="mb-2"><strong>Serial No:</strong> {{ $product->serial_number }}</p>
                    <p class="mb-2"><strong>Category ID:</strong> {{ $product->category_id }}</p>
                    <p class="mb-2"><strong>Model Number:</strong> {{ $product->model_number ?? '-' }}</p>
                    <p class="mb-2"><strong>Source:</strong> {{ $product->source ?? '-' }}</p>
                    <p class="mb-2"><strong>Condition:</strong> {{ $product->condition ?? '-' }}</p>
                    <p class="mb-2"><strong>Discount:</strong> {{ $product->discount ?? '0' }}%</p>
                    <p class="mb-2"><strong>Offer Price:</strong> {{ $product->offer ?? '-' }}</p>
                    <p class="mb-2"><strong>Pickup Facility:</strong> {{ $product->pickup_facility ?? '-' }}</p>
                    <p class="mb-2"><strong>Hours of Operations:</strong> {{ $product->hours_of_operations ?? '-' }}</p>
                    <p class="mb-2"><strong>Availability:</strong> {{ $product->availability ?? '-' }}</p>
                    <p class="mb-2"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    <p class="mb-2"><strong>Negotiable:</strong> {{ $product->negotiable ? 'Yes' : 'No' }}</p>
                    <p class="mb-2"><strong>Providing Transport:</strong> {{ $product->providing_transport ?? '-' }}</p>
                    <p class="mb-2"><strong>Transport Cost:</strong> ${{ number_format($product->transport_cost, 2) }}</p>
                    <p class="mb-2"><strong>Description:</strong><br>{{ $product->description ?? '-' }}</p>

                    <!-- <p class="mb-2"><strong>Description:</strong><br>{{ $product->description }}</p> -->
                    <a href="{{ route('buyer.category.index') }}" class="btn btn-secondary mt-3">Back to Listings</a>

                    @if(Auth::check())
                    <!-- Show Enquiry button if user is logged in -->
                    <button type="button" class="btn btn-primary mt-3 ms-2 listing-btn" data-bs-toggle="modal" data-bs-target="#enquiryModal">
                        Enquiry
                    </button>
                    @else
                    <!-- Show Login button if user is not logged in -->
                    <a href="{{ route('buyer.register') }}" class="btn btn-secondary mt-3 ms-2">
                        Login to Enquire
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>




@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Enquiry Modal -->
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
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="enquiryModalLabel">Shipping Address:</h5>
                </div>
                <div class="modal-body">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit Enquiry</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container"></div>


<script>
    // Check wishlist status on page load
    document.addEventListener('DOMContentLoaded', function() {
        const productId = {{ $product->id }};
        checkWishlistStatus(productId);
    });

    function checkWishlistStatus(productId) {
        fetch(`{{ route('wishlist.check', ':productId') }}`.replace(':productId', productId))
            .then(response => response.json())
            .then(data => {
                const button = document.querySelector(`[data-product-id="${productId}"]`);
                if (data.inWishlist) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            })
            .catch(error => {
                console.error('Error checking wishlist status:', error);
            });
    }

    function toggleWishlist(productId) {
        const button = document.querySelector(`[data-product-id="${productId}"]`);
        const isInWishlist = button.classList.contains('active');

        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            showToast('CSRF token not found. Please refresh the page.', 'error');
            return;
        }

        if (isInWishlist) {
            // Remove from wishlist
            fetch(`{{ route('wishlist.remove', ':productId') }}`.replace(':productId', productId), {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && data.success) {
                        button.classList.remove('active');
                        showToast(data.message, 'success');
                        // Update wishlist count if function exists
                        if (typeof refreshWishlistCount === 'function') {
                            refreshWishlistCount();
                        }
                        if (typeof refreshHeaderWishlistCount === 'function') {
                            refreshHeaderWishlistCount();
                        }
                    } else if (data) {
                        showToast(data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error removing from wishlist:', error);
                    showToast('Error removing from wishlist', 'error');
                });
        } else {
            // Add to wishlist
            fetch(`{{ route('wishlist.add', ':productId') }}`.replace(':productId', productId), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        if (response.status === 401) {
                            showToast('Please login first to add items to wishlist', 'warning');
                            return;
                        }
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && data.success) {
                        button.classList.add('active');
                        showToast(data.message, 'success');
                        // Update wishlist count if function exists
                        if (typeof refreshWishlistCount === 'function') {
                            refreshWishlistCount();
                        }
                        if (typeof refreshHeaderWishlistCount === 'function') {
                            refreshHeaderWishlistCount();
                        }
                    } else if (data) {
                        showToast(data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error adding to wishlist:', error);
                    showToast('Error adding to wishlist: ' + error.message, 'error');
                });
        }
    }

    function showToast(message, type = 'info') {
        const toastContainer = document.querySelector('.toast-container');
        const toast = document.createElement('div');
        toast.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : type === 'warning' ? 'warning' : 'info'} alert-dismissible fade show`;
        toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

        toastContainer.appendChild(toast);

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (toast.parentNode) {
                toast.remove();
            }
        }, 5000);
    }
</script>


@endsection