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
.status-text-{{ $enquiry->id ?? 'default' }} {
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




<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="page-content">


  <div class="meetingPpage">
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
            <div class="flex-grow-1">
              <h4 class="header-title">RFQs
              </h4>
            </div>

            <!-- <div class="d-flex flex-wrap flex-lg-nowrap gap-2">

                                    <a href="add-team.html" class="btn themeBtn"><i
                                            class="ri-add-line me-1"></i>Subscription Management
                                    </a>
                                </div>     -->
            <!-- end d-flex -->
          </div>

          <div class="card-body p-0 tableCustom">

            <div class="table-responsive pt-2">
              <div id="complex-header-datatable_wrapper" class="dt-container dt-empty-footer">

                <div class="dt-layout-row dt-layout-table">
                  <div class="dt-layout-cell  dt-layout-full">
                    <div class="table-responsive pt-2">
                      <div class="dt-container dt-empty-footer">
                        <div class="dt-layout-row dt-layout-table">
                          <div class="dt-layout-cell dt-layout-full">
                            <table class="table table-custom table-centered table-sm table-nowrap table-hover mb-0 dataTable" id="textile-enquiry-table" style="width: 100%;">
                              <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone No</th>
                                  <th>RFQs Date</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($enquiries as $index => $enquiry)
                                <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>
                                    <div class="d-flex align-items-center">
                                      
                                      <div>
                                        <h5 class="fs-14 mt-1">{{ $enquiry->buyer ? $enquiry->buyer->name : 'Guest' }}</h5>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <h5 class="fs-14 mt-1 fw-normal">{{ $enquiry->buyer ? $enquiry->buyer->email : '-' }}</h5>
                                  </td>
                                  <td>
                                    <h5 class="fs-14 mt-1 fw-normal">{{ $enquiry->buyer ? $enquiry->buyer->phone : '-' }}</h5>
                                  </td>
                                  <td>{{ $enquiry->created_at->format('d/m/Y h:i A') }}</td>
                                  <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input toggle-switch" type="checkbox" 
                                               id="toggle_{{ $enquiry->id }}" 
                                               data-enquiry-id="{{ $enquiry->id }}"
                                               data-route="{{ route('admin.enquiry.status', $enquiry) }}"
                                               {{ $enquiry->status == '1' ? 'checked' : '' }}
                                               style="width: 3rem; height: 1.5rem;">
                                        <label class="form-check-label ms-2" for="toggle_{{ $enquiry->id }}">
                                          <span class="status-text-{{ $enquiry->id }}">
                                            {{ $enquiry->status == '1' ? 'Active' : 'Inactive' }}
                                          </span>
                                        </label>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <a href="{{ route('admin.enquiry.view', $enquiry->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('admin.enquiry.delete', $enquiry->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                  </td>

                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>


                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div> <!-- end table-responsive-->

          </div> <!-- end card-body-->


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
                const enquiryId = this.getAttribute('data-enquiry-id');
                const route = this.getAttribute('data-route');
                const isChecked = this.checked;
                const statusText = this.parentElement.querySelector('.status-text-' + enquiryId);
                
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
                        showNotification('Enquiry status updated successfully!', 'success');
                    } else {
                        // Revert toggle if failed
                        this.checked = !isChecked;
                        statusText.textContent = originalText;
                        showNotification('Failed to update enquiry status. Please try again.', 'error');
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

  <!-- <div class="myaccountPage p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="userProfile">
                        <div class="userThumb">
                            <img src="assets/images/user.png" alt="">
                        </div>
                        <div class="userName">
                            <h3>Alexa Rawles</h3>
                            <p><i class="ri-mail-line"></i> alexarawles@gmail.com</p>
                        </div>
                    </div>
                    <div class="editBtn">
                        <button class="lab-btn"><i class="ri-pencil-line"></i> Edit</button>
                    </div>
                </div>
                <div class="dashboardForms py-5"> 
                    <form id="survey-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="name-label" for="name">First Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter First Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="name-label" for="lastname">Last Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter Last Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="email-label" for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="email-label" for="phone">Phone No</label>
                                    <input type="number" name="phone" id="email" placeholder="Enter your Phone" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select id="dropdown" name="role" class="form-control" required>
                                        <option value="United States">United States</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <select id="dropdown" name="role" class="form-control" required>
                                        <option disabled selected value>Select</option>
                                        <option value="United States">United States</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                       
            
            
                       
                        
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <button type="submit" id="submit" class="lab-btn">Submit</button>
                            </div>
                        </div>
            
                    </form>
                </div>
               </div> -->



</div> <!-- container -->
@include('admin.include.footer')