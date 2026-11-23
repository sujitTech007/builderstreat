@include('admin.include.header')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Subscription Plan Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.subscription-plans.index') }}">Subscription Plans</a></li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Plan Details: {{ $subscriptionPlan->name }}</h4>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.subscription-plans.edit', $subscriptionPlan) }}" class="btn btn-warning">
                                    <i class="ri-edit-line align-bottom me-1"></i> Edit
                                </a>
                                <a href="{{ route('admin.subscription-plans.index') }}" class="btn btn-secondary">
                                    <i class="ri-arrow-left-line align-bottom me-1"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Plan Name</label>
                                            <p class="form-control-plaintext">{{ $subscriptionPlan->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Price</label>
                                            <p class="form-control-plaintext">{{ $subscriptionPlan->formatted_price }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Description</label>
                                    <p class="form-control-plaintext">{{ $subscriptionPlan->description }}</p>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Billing Period</label>
                                            <p class="form-control-plaintext">
                                                <span class="badge bg-info">{{ $subscriptionPlan->billing_period_display }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Sort Order</label>
                                            <p class="form-control-plaintext">{{ $subscriptionPlan->sort_order }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Status</label>
                                            <p class="form-control-plaintext">
                                                @if($subscriptionPlan->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Featured</label>
                                            <p class="form-control-plaintext">
                                                @if($subscriptionPlan->is_featured)
                                                    <span class="badge bg-warning">Featured</span>
                                                @else
                                                    <span class="badge bg-secondary">Not Featured</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                @if($subscriptionPlan->features)
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Features</label>
                                    <ul class="list-group">
                                        @foreach($subscriptionPlan->features as $feature)
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="ri-check-line text-success me-2"></i>
                                            {{ $feature }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <div class="card border">
                                    <div class="card-header bg-light">
                                        <h5 class="card-title mb-0">Plan Icon</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        @if($subscriptionPlan->icon)
                                            <div class="avatar-lg mx-auto mb-3">
                                                <div class="avatar-title rounded-circle bg-light text-{{ $subscriptionPlan->icon_color ?? 'primary' }}" style="font-size: 3rem;">
                                                    <i class="{{ $subscriptionPlan->icon }}"></i>
                                                </div>
                                            </div>
                                            <p class="text-muted mb-0">{{ $subscriptionPlan->icon }}</p>
                                        @else
                                            <div class="avatar-lg mx-auto mb-3">
                                                <div class="avatar-title rounded-circle bg-light text-secondary" style="font-size: 3rem;">
                                                    <i class="ri-price-tag-3-line"></i>
                                                </div>
                                            </div>
                                            <p class="text-muted mb-0">No icon set</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="card border mt-3">
                                    <div class="card-header bg-light">
                                        <h5 class="card-title mb-0">Statistics</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Total Subscriptions:</span>
                                            <span class="fw-bold">{{ $subscriptionPlan->subscriptions->count() }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Active Subscriptions:</span>
                                            <span class="fw-bold text-success">{{ $subscriptionPlan->subscriptions->where('is_active', true)->count() }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Created:</span>
                                            <span class="fw-bold">{{ $subscriptionPlan->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.include.footer')