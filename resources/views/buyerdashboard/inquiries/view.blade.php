@extends('layouts.buyer')
@section('content')

    <div class="page-head">
        <div>
            <h1>Enquiry Details</h1>
            <p>Review your request and the delivery information shared with the seller.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100 p-4">
            <h2 class="h4 fw-bold mb-4">RFQ Details</h2>
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" value="{{ $inquiry->product->product_name ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" value="{{ $inquiry->qty }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="4" disabled>{{ $inquiry->message }}</textarea>
                </div>
                
            </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card p-4 mb-4">
                <h5>Contact Information</h5>
                <p><strong>Name:</strong> {{ $inquiry->buyer->name }}</p>
                <p><strong>Email:</strong> {{ $inquiry->buyer->email }}</p>
                <p><strong>Phone:</strong> {{ $inquiry->buyer->phone }}</p>
            </div>

            <div class="card p-4 mb-4">
                <h5>Shipping Address 
  <a href="#" class="float-end" data-bs-toggle="modal" data-bs-target="#editAddressModal">Edit ✏️</a>
</h5>
                <p><strong>Name:</strong> {{ $inquiry->contact_person }}</p>
                <p><strong>Company:</strong> {{ $inquiry->buyer->company_name }}</p>
                <p><strong>Country:</strong> Canada</p>
                <p><strong>Address:</strong> {{ $inquiry->address }}</p>
                <p><strong>State:</strong> {{ $inquiry->state }}</p>
                <p><strong>Zip Code:</strong> {{ $inquiry->postal_code }}</p>
            </div>
        </div>


<!-- Edit Address Modal -->
<div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('buyer.updateAddress', $inquiry->id) }}" method="POST">
      @csrf
     
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editAddressModalLabel">Edit Shipping Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="company_name" value="{{ $inquiry->buyer->company_name }}">
          </div>
          
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" value="{{ $inquiry->address }}">
          </div>
          <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" name="state" value="{{ $inquiry->state }}">
          </div>
          <div class="mb-3">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input type="text" class="form-control" name="postal_code" value="{{ $inquiry->postal_code }}">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </form>
  </div>
</div>


</div>
@endsection
