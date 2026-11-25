@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1">Subscription Plans</h1>
                <p class="text-muted mb-0">
                    Users, material approvals, orders and marketplace activity.
                </p>
            </div>


        </div>

        <div class="table-responsive theme_table">
            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    </tr>
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
                        <td>
                            <span class="badge text-white p-2 bg-opacity-75 bg-{{ $subscription->payment_status == 'paid' ? 'success' : ($subscription->payment_status == 'pending' ? 'warning' : 'danger') }} m-2">{{ $subscription->payment_status }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</main>

@include('admin.include.footer')