@extends('layouts.seller')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">My Products</h2>
    <a href="{{ route('seller.products.create') }}" class="btn btn-success"><i class="fa fa-plus me-1"></i> Add Product</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
   .modal-content {
    border-radius: 10px;
}

.modal-header {
    background-color: #ffffff;
    border-bottom: none;
    text-align: center;
}

.modal-title {
    font-size: 20px;
    font-weight: 600;
    color: #333;
}

.modal-body {
    font-size: 16px;
    color: #555;
    padding: 40px;
    text-align: center;
}

.modal-body i {
    font-size: 50px;
    color: #4db8b8;  /* Same as the rotating icon color */
    margin-bottom: 20px;
}

.modal-footer {
    border-top: none;
    justify-content: center;
}

.btn-info {
    background-color: #4db8b8;
    border-color: #4db8b8;
}

.btn-secondary {
    background-color: #4db8b8;
    border-color: #4db8b8;
    color: white;
}
</style>
<div class="card p-3">
    <div class="table-responsive">
        <table class="table seller-dashboard-table align-middle">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Brand Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Serial No</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset( $product->image)  }}" alt="{{ $product->name }}" width="60" height="60" style="object-fit:cover;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->brand_name }}</td>
                    <td>{{ $product->category ? $product->category->name : '-' }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->serial_number }}</td>
                    <td>
                        @if($product->status == 0)
                        <button class="btn btn-info btn-sm" title="Info" data-toggle="modal" data-target="#infoModal">
                            <i class="fa fa-sync-alt fa-spin"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="border-radius: 10px;">
                                    <div class="modal-header" style="background-color: #ffffff; border-bottom: none;">
                                        <h5 class="modal-title" id="infoModalLabel" style="font-weight: 600; text-align: right; font-size: 20px; color: #333;">Changes Await Approval!</h5>
                                    </div>
                                    <div class="modal-body" style="text-align: center; font-size: 16px; color: #555; padding: 40px;">
                                        <i class="fa fa-sync-alt" style="color: #4db8b8; font-size: 50px;"></i><br><br>
                                        You can edit the items you've added. Please note that any changes made will need to be approved by the admin before they go live. Thank you for your understanding!
                                    </div>
                                    <div class="modal-footer" style="border-top: none; justify-content: center;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #4db8b8; color: white;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <a href="{{ route('seller.products.show', $product) }}" class="btn btn-info btn-sm" title="View"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('seller.products.edit', $product) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                        @endif
                       {{-- <form action="{{ route('seller.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button>
                        </form>--}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $products->links() }}
    </div>
</div>
@endsection 