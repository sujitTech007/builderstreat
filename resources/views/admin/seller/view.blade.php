@include('admin.include.header')

<h2 class="fw-bold mb-4">Seller Profile</h2>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card p-4 mx-auto" style="max-width: 600px;">
    <form action="{{ route('seller.profile.update') }}" method="POST" enctype="multipart/form-data" class="seller-dashboard-form">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $seller->name) }}" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $seller->email) }}" readonly>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $seller->phone) }}" readonly>
        </div>
        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $seller->company_name) }}" readonly>
        </div>
       <div class="mb-3">
    <label for="profile_image" class="form-label">Document</label>
    
    <div class="mt-2">
        @php
            $filePath = asset($seller->document);
            $fileExtension = pathinfo($seller->document, PATHINFO_EXTENSION);
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        @endphp

        @if(in_array(strtolower($fileExtension), $imageExtensions))
            <img src="{{ $filePath }}" alt="Current Image" width="100" style="object-fit: cover;" class="mb-2">
        @else
            <p class="text-muted mb-2">Preview not available for this file type ({{ strtoupper($fileExtension) }})</p>
        @endif

        {{-- Download button for all files --}}
        <a href="{{ $filePath }}" class="btn btn-sm btn-primary" download>
            Download File
        </a>
    </div>
</div>

        <a href="{{ route('admin.sellers')}}" class="btn btn-secondary btn-sm">Back</a>
    </form>
</div>

@include('admin.include.footer')