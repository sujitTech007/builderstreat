@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1">Subscription Plans</h1>
                <p class="text-muted mb-0">
                    Manage subscription plans, pricing, features and renewals.
                </p>
            </div>
            <div>
                <a href="{{ route('admin.subscription-plans.create') }}" class="btn btn-primary">
                                <i class="ri-add-line align-bottom me-1"></i> Add New Plan
                            </a>
            </div>

                
        </div>
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
        <div class="table-responsive theme_table">
                                                                               <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                                                <tr>
                                                    <th width="40">ID</th>
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
                                            
<div class="d-flex align-items-center gap-2">

    @if($plan->icon)
        <div class="d-flex align-items-center justify-content-center rounded-3 bg-{{ $plan->icon_color ?? 'primary' }} bg-opacity-10 text-{{ $plan->icon_color ?? 'primary' }}"
             style="width: 42px; height: 42px; flex-shrink: 0;">

            <i class="{{ $plan->icon }}" style="font-size: 21px;"></i>
        </div>
    @endif

    <div class="d-flex flex-column">
        <strong class="text-dark fw-semibold">
            {{ $plan->name }}
        </strong>

        @if($plan->is_featured)
            <span class="badge bg-warning text-dark rounded-pill mt-1"
                  style="width: fit-content; font-size: 10px;">
                <i class="fa-solid fa-star me-1"></i> Featured
            </span>
        @endif
    </div>

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

               

                                            <div class="table-actions d-flex gap-2">
                                                <a href="{{ route('admin.subscription-plans.show', $plan) }}" 
                                                   class="btn btn-sm btn-info text-white" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.subscription-plans.edit', $plan) }}" 
                                                   class="btn btn-sm btn-warning text-dark" title="Edit">
                                                   <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <form action="{{ route('admin.subscription-plans.toggle-status', $plan) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm w-auto px-2 btn-{{ $plan->is_active ? 'secondary' : 'success' }} d-flex align-items-center" 
                                                            title="{{ $plan->is_active ? 'Deactivate' : 'Activate' }}">
                                                        <i class="fa-solid {{ $plan->is_active ? 'fa-xmark' : 'fa-check' }}"></i>
                                                        {{ $plan->is_active ? 'Deactivate' : 'Activate' }}
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.subscription-plans.destroy', $plan) }}" 
                                                      method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Are you sure you want to delete this plan?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fa-solid fa-trash"></i>
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

                                <!-- Popup Modal -->
                                <div class="modal fade" id="confirmModal" tabindex="-1"
                                    aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-4">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="modal-title fw-bold text-primary">Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <p class="mb-4">Do you want to approve/reject this request?</p>
                                            <div class="d-flex justify-content-center gap-3">
                                                <button type="button" class="btn btn-success">Approved</button>
                                                <button type="button" class="btn btn-danger">Reject</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               <script>
                                    function showConfirm(status) {
                                        const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
                                        modal.show();
                                    }

                                    // Toggle Switch Functionality
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const toggleSwitches = document.querySelectorAll('.toggle-switch');
                                        
                                        toggleSwitches.forEach(function(toggle) {
                                            toggle.addEventListener('change', function() {
                                                const sellerId = this.getAttribute('data-seller-id');
                                                const route = this.getAttribute('data-route');
                                                const isChecked = this.checked;
                                                const statusText = this.parentElement.querySelector('.status-text-' + sellerId);
                                                
                                                // Show loading state
                                                this.disabled = true;
                                                const originalText = statusText.textContent;
                                                statusText.textContent = 'Updating...';
                                                
                                                // Create form data
                                                const formData = new FormData();
                                                formData.append('_token', '{{ csrf_token() }}');
                                                formData.append('_method', 'PATCH');
                                                formData.append('status', isChecked ? '1' : '0');
                                                
                                                // Send AJAX request
                                                fetch(route, {
                                                    method: 'POST',
                                                    body: formData,
                                                    headers: {
                                                        'X-Requested-With': 'XMLHttpRequest'
                                                    }
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        // Update status text
                                                        statusText.textContent = isChecked ? 'Approved' : 'Not Approved';
                                                        
                                                        // Show success message
                                                        showNotification('Status updated successfully!', 'success');
                                                    } else {
                                                        // Revert toggle if failed
                                                        this.checked = !isChecked;
                                                        statusText.textContent = originalText;
                                                        showNotification('Failed to update status. Please try again.', 'error');
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                    // Revert toggle if failed
                                                    this.checked = !isChecked;
                                                    statusText.textContent = originalText;
                                                    showNotification('An error occurred. Please try again.', 'error');
                                                })
                                                .finally(() => {
                                                    // Re-enable toggle
                                                    this.disabled = false;
                                                });
                                            });
                                        });
                                    });

                                    // Notification function
                                    function showNotification(message, type) {
                                        // Create notification element
                                        const notification = document.createElement('div');
                                        notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
                                        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
                                        notification.innerHTML = `
                                            ${message}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        `;
                                        
                                        // Add to page
                                        document.body.appendChild(notification);
                                        
                                        // Auto remove after 3 seconds
                                        setTimeout(() => {
                                            if (notification.parentNode) {
                                                notification.remove();
                                            }
                                        }, 3000);
                                    }
                                </script>
    </div>
</main>

@include('admin.include.footer')