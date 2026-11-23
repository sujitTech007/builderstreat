@extends('layouts.seller')

@section('content')
<h2 class="fw-bold mb-4">RFQs List</h2>
<div class="card p-3">
    <div class="table-responsive">
        <table class="table seller-dashboard-table align-middle">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Buyer</th>
                    <th>Buyer Email</th>
                    <th>Buyer Phone</th>
                    <th>Quantity</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Chat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries as $inquiry)
                <tr>
                    <td>
                        @if($inquiry->product)
                            <a href="{{ route('products.details', $inquiry->product_id) }}" target="_blank" style="text-decoration: none;" >{{ $inquiry->product->product_name }}</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $inquiry->buyer->name ?? '-' }}</td>
                    <td>{{ $inquiry->buyer->email ?? '-' }}</td>
                    <td>{{ $inquiry->buyer->phone ?? '-' }}</td>
                    <td>{{ $inquiry->qty }}</td>
                    <td>{{ $inquiry->message }}</td>
                    <td>
                      @php
                            $statusLabels = [
                                0 => ['text' => 'Raised', 'color' => 'bg-danger'],   // Red
                                1 => ['text' => 'Pending', 'color' => 'bg-warning'], // Yellow
                                2 => ['text' => 'Received', 'color' => 'bg-success'], // Green
                            ];

                            $status = $statusLabels[$inquiry->order_status ?? 1] ?? ['text' => 'Pending', 'color' => 'bg-warning'];
                        @endphp

                        <span class="badge {{ $status['color'] }} text-white px-2 py-2 fs-6">
                            {{ $status['text'] }}
                        </span>

                    </td>
                    <td>{{ $inquiry->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                       <a href="{{ route('seller.chat', $inquiry->id) }}" class="btn btn-sm btn-primary">Chat</a>
                    </td>
                    <td>
                     {{--   @if($inquiry->approval == 0)
                       <a href="{{ route('seller.enquiry.approved', $inquiry->id) }}" class="btn btn-sm btn-primary">Approve & Create Order</a>
                       @endif --}}
                       <a href="{{ route('seller.inquiries.view', $inquiry->id) }}" class="btn btn-sm btn-primary">View</a>
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