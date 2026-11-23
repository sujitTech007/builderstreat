@include('admin.include.header')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Subscription Plans</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Subscription Plans</li>
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
                            <h4 class="card-title mb-0">All Subscription Plans</h4>
                            <a href="{{ route('admin.subscription-plans.create') }}" class="btn btn-primary">
                                <i class="ri-add-line align-bottom me-1"></i> Add New Plan
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Billing Period</th>
                                        <th>Features</th>
                                        <th>Status</th>
                                        <th>Sort Order</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($plan->icon)
                                                    <div class="avatar-xs me-2">
                                                        <div class="avatar-title rounded-circle bg-light text-{{ $plan->icon_color ?? 'primary' }}">
                                                            <i class="{{ $plan->icon }}"></i>
                                                        </div>
                                                    </div>
                                                @endif
                                                <strong>{{ $plan->name }}</strong>
                                                @if($plan->is_featured)
                                                    <span class="badge bg-warning ms-2">Featured</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($plan->description, 50) }}</td>
                                        <td>
                                            <span class="fw-bold">{{ $plan->formatted_price }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ $plan->billing_period_display }}</span>
                                        </td>
                                        <td>
                                            @if($plan->features)
                                                <ul class="list-unstyled mb-0">
                                                    @foreach(array_slice($plan->features, 0, 3) as $feature)
                                                        <li><i class="ri-check-line text-success me-1"></i>{{ $feature }}</li>
                                                    @endforeach
                                                    @if(count($plan->features) > 3)
                                                        <li class="text-muted">+{{ count($plan->features) - 3 }} more</li>
                                                    @endif
                                                </ul>
                                            @else
                                                <span class="text-muted">No features</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($plan->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $plan->sort_order }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.subscription-plans.show', $plan) }}" 
                                                   class="btn btn-sm btn-info d-flex align-items-center" title="View">
                                                    <i class="ri-eye-line me-1" style="font-size: 1.1em;"></i> View
                                                </a>
                                                <a href="{{ route('admin.subscription-plans.edit', $plan) }}" 
                                                   class="btn btn-sm btn-warning d-flex align-items-center" title="Edit">
                                                    <i class="ri-edit-line me-1" style="font-size: 1.1em;"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.subscription-plans.toggle-status', $plan) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-{{ $plan->is_active ? 'secondary' : 'success' }} d-flex align-items-center" 
                                                            title="{{ $plan->is_active ? 'Deactivate' : 'Activate' }}">
                                                        <i class="ri-{{ $plan->is_active ? 'close-line' : 'check-line' }} me-1" style="font-size: 1.1em;"></i>
                                                        {{ $plan->is_active ? 'Deactivate' : 'Activate' }}
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.subscription-plans.destroy', $plan) }}" 
                                                      method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Are you sure you want to delete this plan?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center" title="Delete">
                                                        <i class="ri-delete-bin-line me-1" style="font-size: 1.1em;"></i> Delete
                                                    </button>
                                                </form>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No subscription plans found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 @include('admin.include.footer')