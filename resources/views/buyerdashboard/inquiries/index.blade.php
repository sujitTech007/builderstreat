@extends('layouts.buyer')

@section('content')
<h2 class="fw-bold mb-4">RFQs list</h2>
<div class="card p-3">
    <div class="table-responsive">
        <table class="table seller-dashboard-table align-middle">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Buyer</th>
                    <th>Quantity</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Chat</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries as $inquiry)
                <tr>
                    <td>
                        @if($inquiry->product)
                            <a href="{{ route('products.details', $inquiry->product_id) }}" target="_blank" style="text-decoration: none;">{{ $inquiry->product->product_name }}</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $inquiry->buyer->name ?? '-' }}</td>
                    <td>{{ $inquiry->qty }}</td>
                    <td>{{ $inquiry->message }}</td>
                    <td>{{ ucfirst($inquiry->status ?? 'pending') }}</td>
                    <td>{{ $inquiry->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <a href="{{ route('buyer.inquiry.view', $inquiry->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('buyer.chat', $inquiry->id) }}" class="btn btn-primary btn-sm">Chat</a>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No inquiries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $inquiries->links() }}
    </div>
</div>
@endsection 