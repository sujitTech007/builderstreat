@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1">Order List</h1>
                <p class="text-muted mb-0">
                    Manage orders, payments, deliveries and order status.
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
        @if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
        <div class="table-responsive theme_table">
                                                                               <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                                                 <tr>
            <th>Order ID</th>
            <th>Enquiry ID</th>
            <th>Buyer</th>
            <th>Seller</th>
            <th>Material</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Payment Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->order_id }}</td>
            <td>
                @php 
                $inquiry = \App\Models\Inquiry::find($order->enquiry_id); 
                if($inquiry) { 
                    echo $inquiry->inquiry_id; 
                } else {
                    echo 'N/A';
                }
                @endphp

                    
            </td>
            <td>
                @php
                $buyer = App\Models\User::find($order->user_id);
                @endphp
                @if($buyer)
                {{ $buyer->name }}
                @endif
            </td>
            <td>{{ $order->seller->name ?? 'N/A' }}</td>
            <td>
                @php
                $productName = App\Models\Product::find($order->material_id);
                @endphp
                @if($productName)
                {{ $productName->product_name }}
                @endif
            </td>
            <td>{{ $order->quantity }}</td>
            <td>${{ number_format($order->amount, 2) }}</td>
            
            {{-- Order Status --}}
            <td>
                @if($order->status === 'pending')
                    <span class="badge bg-warning  text-warning p-2 bg-opacity-10">Pending</span>
                @elseif($order->status === 'approved')
                    <span class="badge bg-success text-success p-2 bg-opacity-10">Approved</span>
                @elseif($order->status === 'cancelled')
                    <span class="badge bg-danger text-danger p-2 bg-opacity-10">Cancelled</span>
                @else
                    <span class="badge bg-secondary p-2 bg-opacity-10">{{ ucfirst($order->status) }}</span>
                @endif
            </td>

            {{-- Payment Status --}}
            <td>
                @if($order->payment_status === 'unpaid')
                    <span class="badge bg-danger text-danger p-2 bg-opacity-10">Unpaid</span>
                @elseif($order->payment_status === 'paid')
                    <span class="badge bg-success text-success p-2 bg-opacity-10">Paid</span>
                @else
                    <span class="badge bg-secondary text-secondary p-2 bg-opacity-10">{{ ucfirst($order->payment_status) }}</span>
                @endif
            </td>

            <td>{{ $order->created_at->format('d M Y') }}</td>
        </tr>
        @endforeach
    </tbody>
        </table>
                                    </div>
                                   

    </div>
</main>

@include('admin.include.footer')