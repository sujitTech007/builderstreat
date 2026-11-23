@extends('layouts.buyer')

@section('content')
<h2 class="fw-bold mb-4">My Wishlist</h2>

@if($wishlists->isEmpty())
    <div class="alert alert-info">You have no items in your wishlist yet.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Added</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($wishlists as $item)
                    <tr>
                        <td>
                            <a href="{{ route('products.details', $item->product->id) }}" class="text-decoration-none">
                                {{ $item->product->product_name }}
                            </a>
                        </td>
                         @php
                                    // discount is a percentage, e.g. 20 means 20%
                                    $discountAmount = ($item->product->offer * $item->product->discount) / 100;
                                    $finalPrice = $item->product->offer - $discountAmount;
                                @endphp
                        <td>${{ number_format($finalPrice, 2) }}</td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('products.details', $item->product->id) }}">View</a>
                            <button class="btn btn-sm btn-outline-danger ms-1" onclick="removeFromWishlist({{ $item->product->id }})">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $wishlists->links() }}
@endif

<script>
function removeFromWishlist(productId) {
    Swal.fire({
        title: 'Remove from Wishlist?',
        text: 'Are you sure you want to remove this item from your wishlist?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, remove it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state
            Swal.fire({
                title: 'Removing...',
                text: 'Please wait while we remove the item from your wishlist.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            fetch(`{{ route('wishlist.remove', ':productId') }}`.replace(':productId', productId), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Removed!',
                        text: 'Item has been removed from your wishlist.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        // Reload the page to show updated wishlist
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message || 'Error removing item from wishlist',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error removing from wishlist:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }
    });
}
</script>
@endsection


