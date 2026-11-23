@extends('layouts.seller')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">My Payments</h2>
</div>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card p-3">
    <div class="table-responsive">
        <table class="table seller-dashboard-table align-middle">
            <thead>
        <tr>
            <th>Order ID</th>
            <th>Enquiry ID</th>
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
            <td>{{ $order->id }}</td>
            <td>{{ $order->enquiry_id }}</td>
            <td>{{ $order->material->name ?? 'N/A' }}</td>
            <td>{{ $order->quantity }}</td>
            <td>${{ number_format($order->amount, 2) }}</td>
            
            {{-- Order Status --}}
            <td>
                @if($order->status === 'pending')
                    <span class="badge bg-warning">Pending</span>
                @elseif($order->status === 'approved')
                    <span class="badge bg-success">Approved</span>
                @elseif($order->status === 'cancelled')
                    <span class="badge bg-danger">Cancelled</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                @endif
            </td>

            {{-- Payment Status --}}
            <td>
                @if($order->payment_status === 'unpaid')
                    <span class="badge bg-danger">Unpaid</span>
                @elseif($order->payment_status === 'paid')
                    <span class="badge bg-success">Paid</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($order->payment_status) }}</span>
                @endif
            </td>

            <td>{{ $order->created_at->format('d M Y') }}</td>
        </tr>
        @endforeach
    </tbody>
        </table>
    </div>

</div>


@endsection