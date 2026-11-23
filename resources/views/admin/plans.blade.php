@include('admin.include.header')




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
                            <h4 class="header-title">Subscription Plans</h4>
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
                                                                    <th>Subscription</th>
                                                                    <th>Price</th>
                                                                    <th>commission</th>
                                                                    <th>Total Amount</th>
                                                                    <th>Commission Amount</th>
                                                                    <th>Payment Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($subscriptions as $subscription)
                                                                @php
                                                                $user = App\Models\User::find($subscription->user_id);
                                                                @endphp
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $user->name ?? ''}}</td>
                                                                    <td>{{ $user->email ?? ''}}</td>
                                                                    <td>{{ $user->phone ?? ''}}</td>
                                                                    <td>{{ $subscription->plan_name ?? ''}}</td>
                                                                    <td>${{ $subscription->price ?? ''}}</td>
                                                                    <td>${{ $subscription->commission  ?? '-'}}</td>
                                                                    <td>${{ $subscription->total_amount  ?? '-'}}</td>
                                                                    <td>${{ $subscription->commission_amount ?? '-' }}</td>
                                                                    <td class="badge bg-{{ $subscription->payment_status == 'paid' ? 'success' : ($subscription->payment_status == 'pending' ? 'warning' : 'danger') }} m-2">{{ $subscription->payment_status }}</td>
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


@include('admin.include.footer')