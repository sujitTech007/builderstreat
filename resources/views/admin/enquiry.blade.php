@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1">RFQs</h1>
                <p class="text-muted mb-0">
                    Manage customer inquiries, quotations and requests. 
                </p>
            </div>


        </div>

        <div class="table-responsive theme_table">
            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                   <tr><th>Sr. No.</th>
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
                                    {{ $enquiry->buyer ? $enquiry->buyer->name : 'Guest' }}
                                  </td>
                                  <td>{{ $enquiry->buyer ? $enquiry->buyer->email : '-' }}
                                  </td>
                                  <td>
                                    {{ $enquiry->buyer ? $enquiry->buyer->phone : '-' }}
                                  </td>
                                  <td>{{ $enquiry->created_at->format('d/m/Y h:i A') }}</td>
                                  <td>
                                    
                                      <div class="form-check form-switch">
                                        <input class="form-check-input toggle-switch" type="checkbox" 
                                               id="toggle_{{ $enquiry->id }}" 
                                               data-enquiry-id="{{ $enquiry->id }}"
                                               data-route="{{ route('admin.enquiry.status', $enquiry) }}"
                                               {{ $enquiry->status == '1' ? 'checked' : '' }}
                                               style="width: 3rem; height: 1.5rem;">
                                        <!-- <label class="form-check-label ms-2" for="toggle_{{ $enquiry->id }}">
                                          <span class="status-text-{{ $enquiry->id }}">
                                            {{ $enquiry->status == '1' ? 'Active' : 'Inactive' }}
                                          </span>
                                        </label> -->
                                      </div>
                                  </td>
                                  <td>
                                    
                                            <div class="table-actions d-flex gap-2">
                                    <a href="{{ route('admin.enquiry.view', $enquiry->id) }}" class="btn btn-sm btn-info text-white"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('admin.enquiry.delete', $enquiry->id) }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                  </td>

                                </tr>
                                @endforeach
                </tbody>
            </table>
        </div>


    </div>
</main>

@include('admin.include.footer')