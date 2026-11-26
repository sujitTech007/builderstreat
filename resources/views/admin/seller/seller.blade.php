@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1">Seller Request</h1>
                <p class="text-muted mb-0">
                    Manage sellers, approvals, orders and marketplace activity.
                </p>
            </div>

            <div>
                <div class="d-flex align-items-center gap-2">
                    <label for="search" class="form-label mb-0 me-1">Search:</label>
                        <input type="search" id="search" class="form-control d-inline w-auto" placeholder="Search sellers...">
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const searchInput = document.getElementById('search');
                            searchInput.addEventListener('keyup', function () {
                                const filter = searchInput.value.toLowerCase();
                                const table = document.querySelector('table');
                                const rows = table.querySelectorAll('tbody tr');
                                rows.forEach(function (row) {
                                    const text = row.textContent.toLowerCase();
                                    row.style.display = text.includes(filter) ? '' : 'none';
                                });
                            });
                        });
                    </script>
            </div>
        </div>
        <div class="table-responsive theme_table">
                                                                               <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Name</th>
                                                    <th>Email ID</th>
                                                    <th>Phone No.</th>
                                                    <th>Approved Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php 
                                                $index = 1
                                                @endphp
                                                @foreach($sellers as $seller)
                                                <tr>
                                                    <td>{{$index++}}</td>
                                                    <td>{{ $seller->name }}</td>
                                                    <td>{{ $seller->email }}</td>
                                                    <td>{{ $seller->phone }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="form-check form-switch d-flex">
                                                                <input class="form-check-input toggle-switch" type="checkbox" 
                                                                       id="toggle_{{ $seller->id }}" 
                                                                       data-seller-id="{{ $seller->id }}"
                                                                       data-route="{{ route('admin.sellers.approval', $seller->id) }}"
                                                                       {{ $seller->is_active ? 'checked' : '' }}
                                                                       style="width: 3rem; height: 1.5rem;">
                                                                <label class="form-check-label ms-2 ms-2 fs-10" for="toggle_{{ $seller->id }}">
                                                                    <span class="status-text-{{ $seller->id }}">
                                                                        {{ $seller->is_active ? 'Approved' : 'Not Approved' }}
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                  
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="{{ route('admin.seller.products', $seller->id) }}" title="View"><i class="bi bi-bag-check text-primary"></i></a>
                                                            <a href="{{ route('admin.seller.view', $seller->id) }}" title="View"><i class="bi bi-eye text-primary"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
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