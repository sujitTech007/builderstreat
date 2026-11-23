@include('admin.include.header')

<style>
/* Custom Toggle Switch Styles */
.form-check-input.toggle-switch {
    background-color: #6c757d;
    border-color: #6c757d;
    cursor: pointer;
    transition: all 0.3s ease;
}

.form-check-input.toggle-switch:checked {
    background-color: #198754;
    border-color: #198754;
}

.form-check-input.toggle-switch:focus {
    box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
}

.form-check-input.toggle-switch:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.form-check-label {
    font-weight: 500;
    cursor: pointer;
    user-select: none;
}

/* Status text colors */
.status-text-{{ $buyer->id ?? 'default' }} {
    transition: color 0.3s ease;
}

/* Loading animation */
@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}

.form-check-input.toggle-switch:disabled + .form-check-label {
    animation: pulse 1.5s infinite;
}
</style>

<body>
    <div class="wrapper active">
        <div class="page-content">

            <div class="page-container p-3">

                <div class="meetingPpage">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div
                                    class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                                    <div class="flex-grow-1">
                                        <h4 class="header-title">Buyer Request</h4>
                                    </div>
                                </div>
                                <div class="container mt-1">
                                    <div class=" d-flex justify-content-between mb-3">
                                        <!-- <div>
                                            Show Entries
                                            <select class="form-select d-inline w-auto">
                                                <option>10</option>
                                                <option>25</option>
                                                <option>50</option>
                                            </select>
                                        </div> -->
                                        <div>
                                            <label for="search" class="form-label mb-0 me-1">Search:</label>
                                            <input type="search" id="search" class="form-control d-inline w-auto" placeholder="Search buyers...">
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
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center align-middle">
                                            <thead class="table-primary">
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
                                                @foreach($buyers as $buyer)
                                                <tr>
                                                    <td>{{$index++}}</td>
                                                    <td>{{ $buyer->name }}</td>
                                                    <td>{{ $buyer->email }}</td>
                                                    <td>{{ $buyer->phone}}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input toggle-switch" type="checkbox" 
                                                                       id="toggle_{{ $buyer->id }}" 
                                                                       data-buyer-id="{{ $buyer->id }}"
                                                                       data-route="{{ route('admin.buyer.approval', $buyer->id) }}"
                                                                       {{ $buyer->is_active ? 'checked' : '' }}
                                                                       style="width: 3rem; height: 1.5rem;">
                                                                <label class="form-check-label ms-2" for="toggle_{{ $buyer->id }}">
                                                                    <span class="status-text-{{ $buyer->id }}">
                                                                        {{ $buyer->is_active ? 'Approved' : 'Not Approved' }}
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                     <td>
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="{{ route('admin.buyer.view', $buyer->id) }}" title="View"><i class="bi bi-eye text-primary"></i></a>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
                                            const buyerId = this.getAttribute('data-buyer-id');
                                            const route = this.getAttribute('data-route');
                                            const isChecked = this.checked;
                                            const statusText = this.parentElement.querySelector('.status-text-' + buyerId);
                                            
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



                                <!-- end table-responsive-->

                            </div> <!-- end card-body-->


                        </div>













                    </div>

                </div>
            </div>


        </div> <!-- container -->

        @include('admin.include.footer')
