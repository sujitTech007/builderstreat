@extends('layouts.buyer')

@section('content')
    <div class="page-head">
        <div>
            <h1>Order Payment History</h1>
            <p>Track payments made for your orders.</p>
        </div>
    </div>
   <div class="card border-0 p-0">
   <div class="table-responsive">
       <table class="table table-striped theme_table align-middle mb-0">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Stripe ID</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th>Payment Date</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    
                    <td>{{ $order->stripe_id ?? '-' }}</td>
                    <td>${{ number_format($order->amount, 2) }}</td>
                    <td>{{ strtoupper($order->currency) }}</td>
                    <td>
                        @if($order->status == 'paid')
                        <span class="badge bg-success">Success</span>
                        @elseif($order->status == 'unpaid')
                        <span class="badge bg-warning">Pending</span>
                        @else
                        <span class="badge bg-danger">Failed</span>
                        @endif
                    </td>
                    <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

@endsection