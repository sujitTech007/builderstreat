@extends('layouts.buyer')
<style>
    .product-list-heading {
        text-align: center !important;
        font-size: 30px !important;
        font-weight: 600 !important;
        margin-top: 10px!important;
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
    .listing-filter{
        margin-top:0px;
    }
    .listing-filter-range{
        font-size: 15px;
        padding: 3px 5px 3px 5px;
        border: 1px solid #6e7e1d;
        background: #6e7e1d;
        border-radius: 15px;
        color: white;
    }
    .range-value{
        margin-top:10px;
        margin-right: 20px;
    }
    
    .range-input{
        width: 100%;
    }
</style>

@section('content')

<div class="page-head">
    <div>
        <h1>Browse Materials</h1>
        <p>Explore available products and save materials you want to revisit.</p>
    </div>
</div>

<div class="col-lg-9 col-md-8">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4" id="product-list">
                @forelse($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <button class="wishlist-btn" data-product-id="{{ $product->id }}" onclick="toggleWishlist({{ $product->id }})">
                            <i class="fas fa-heart"></i>
                        </button>
                        <a href="{{ route('buyer.products.details', $product->id) }}"> <img
                                src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/400x250' }}"
                                class="card-img-top prdct-img" alt="{{ $product->name }}"></a>
                        <div class="card-body">
                            <h5 class="card-title prdct-text1">{{ $product->product_name }}</h5>
                            <p class="card-text prdct-textp">{{ Str::limit($product->description, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                @php
                                    // discount is a percentage, e.g. 20 means 20%
                                    $discountAmount = ($product->offer * $product->discount) / 100;
                                    $finalPrice = $product->offer - $discountAmount;
                                @endphp
                            
                                <span class="fw-bold text-success">${{ number_format($finalPrice, 2) }}</span>
                                <a href="{{ route('buyer.products.details', $product->id) }}"
                                    class="btn btn-primary btn-sm listing-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center">No products found.</p>
                </div>
                @endforelse
            </div>
        </div>
<!-- end col-4 -->



                <!-- end col-4 -->
            </div>

            <script>
        // Check wishlist status for all products on page load
        document.addEventListener('DOMContentLoaded', function() {
            const wishlistButtons = document.querySelectorAll('.wishlist-btn');
            wishlistButtons.forEach(button => {
                const productId = button.getAttribute('data-product-id');
                checkWishlistStatus(productId);
            });
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
