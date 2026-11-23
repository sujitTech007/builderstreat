@extends('layouts.seller')

@section('content')
<h2 class="fw-bold mb-4">Add Product</h2>

<div class="card p-4 mx-auto">
    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data" class="seller-dashboard-form">
        @csrf

        {{-- Create Listing Section --}}
        <h4 class="fw-bold mt-3 mb-3">Create Listing</h4>
        

        {{-- Listing Section --}}
        <!--<h4 class="fw-bold mt-4 mb-3">Listing</h4>-->
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="brand_name" value="{{ old('brand_name') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Model Number</label>
                <input type="text" class="form-control" name="model_number" value="{{ old('model_number') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Serial Number</label>
                <input type="text" class="form-control" name="serial_number" value="{{ old('serial_number') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Source</label>
                <select class="form-select" name="source">
                    <option value="">--Select Source--</option>
                    <option value="factory">Factory</option>
                    <option value="dealer">Dealer</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Condition Of Material</label>
                <select class="form-select" name="condition">
                    <option value="">--Please Select--</option>
                    <option value="new">New</option>
                    <option value="used">Used</option>
                    <option value="refurbished">Refurbished</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Discount</label>
                <input type="text" class="form-control" name="discount" value="{{ old('discount') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Offer</label>
                <input type="text" class="form-control" name="offer" value="{{ old('offer') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Pick Up Facility</label>
                <select class="form-select" name="pickup_facility">
                    <option value="">--Please Select--</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Categroy</label>
                <select class="form-select" name="category_id">
                    <option value="">--Please Select--</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Hours Of Operations</label>
                <input type="text" class="form-control" name="hours_of_operations" value="{{ old('hours_of_operations') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Availability</label>
                <input type="date" class="form-control" name="availability" value="{{ old('availability') }}">
            </div>
            
           
        </div>
        <div class="row mb-3">
         <div class="col-md-6">
            <label for="image" class="form-label">Add Photo</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*,video/*">
        </div>
</div>
        {{-- Pricing Section --}}
        <h4 class="fw-bold mt-4 mb-3">Pricing</h4>
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}" required>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="negotiable" value="1" {{ old('negotiable') ? 'checked' : '' }}>
                    <label class="form-check-label">Negotiable</label>
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Providing Transport</label>
                <select class="form-select" name="providing_transport">
                    <option value="">--Please Select--</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Cost Of Transportation</label>
                <input type="number" step="0.01" class="form-control" name="transport_cost" value="{{ old('transport_cost') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4">Save Post</button>
        <a href="{{ route('seller.products.index') }}" class="btn btn-secondary mt-4">Cancel</a>
    </form>
</div>
@endsection
