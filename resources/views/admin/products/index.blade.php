@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1">Product List</h1>
                <p class="text-muted mb-0">
                    Users, material approvals, orders and marketplace activity.
                </p>
            </div>

            <div>
                <div class="d-flex align-items-center gap-2">
                    <label for="search" class="form-label mb-0 me-1">Search:</label>
                                            <input type="search" id="search" class="form-control d-inline w-auto fs-12" placeholder="Search products...">
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
                                                    <th>Product Name</th>
                                                    <th>Seller</th>
                                                    <th>Seller Email</th>
                                                    <th>Seller Phone</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $index => $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->seller ? $product->seller->name : 'N/A' }}</td>
                                                    <td>{{ $product->seller ? $product->seller->email : 'N/A' }}</td>
                                                    <td>{{ $product->seller ? $product->seller->phone : 'N/A' }}</td>
                                                    <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                                                    <td>
                                                        
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input toggle-switch" type="checkbox" 
                                                                       id="toggle_{{ $product->id }}" 
                                                                       data-product-id="{{ $product->id }}"
                                                                       data-route="{{ route('admin.products.status', $product) }}"
                                                                       {{ $product->status == '1' ? 'checked' : '' }}
                                                                       style="width: 3rem; height: 1.5rem;">
                                                                <!-- <label class="form-check-label ms-2" for="toggle_{{ $product->id }}">
                                                                    <span class="status-text-{{ $product->id }}">
                                                                        {{ $product->status == '1' ? 'Active' : 'Inactive' }}
                                                                    </span>
                                                                </label> -->
                                                            </div>
                                                    </td>
                                                    <td>
                                                        <div class="justify-content-center gap-2 table-actions gap-2">
                                                            <a href="{{ route('products.details', $product->id) }}" class="btn btn-sm btn-info text-white" target="_blank" title="View"><i class="fa-solid fa-eye"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{ $products->links() }}
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
        // Toggle Switch Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const toggleSwitches = document.querySelectorAll('.toggle-switch');
            
            toggleSwitches.forEach(function(toggle) {
                toggle.addEventListener('change', function() {
                    const productId = this.getAttribute('data-product-id');
                    const route = this.getAttribute('data-route');
                    const isChecked = this.checked;
                    const statusText = this.parentElement.querySelector('.status-text-' + productId);
                    
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
                            statusText.textContent = isChecked ? 'Active' : 'Inactive';
                            
                            // Show success message
                            showNotification('Product status updated successfully!', 'success');
                        } else {
                            // Revert toggle if failed
                            this.checked = !isChecked;
                            statusText.textContent = originalText;
                            showNotification('Failed to update product status. Please try again.', 'error');
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