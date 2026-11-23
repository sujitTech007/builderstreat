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
.status-text-{{ $product->id ?? 'default' }} {
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
                                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                                    <div class="flex-grow-1">
                                        <h4 class="header-title">Product List</h4>
                                    </div>
                                </div>
                                <div class="container mt-1">
                                    <div class="d-flex justify-content-between mb-3">
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
                                            <input type="search" id="search" class="form-control d-inline w-auto" placeholder="Search products...">
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
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input toggle-switch" type="checkbox" 
                                                                       id="toggle_{{ $product->id }}" 
                                                                       data-product-id="{{ $product->id }}"
                                                                       data-route="{{ route('admin.products.status', $product) }}"
                                                                       {{ $product->status == '1' ? 'checked' : '' }}
                                                                       style="width: 3rem; height: 1.5rem;">
                                                                <label class="form-check-label ms-2" for="toggle_{{ $product->id }}">
                                                                    <span class="status-text-{{ $product->id }}">
                                                                        {{ $product->status == '1' ? 'Active' : 'Inactive' }}
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="{{ route('products.details', $product->id) }}" class="btn btn-info btn-sm" target="_blank" title="View"><i class="bi bi-eye"></i></a>
                                                            <!--<a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>-->
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
                                </div>
                            </div>
                        </div>
                    </div>
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

    @include('admin.include.footer')
</body>