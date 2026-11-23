@extends('layouts.seller')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">My Order</h2>
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
                    <th>Order Status</th>
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

                    <td>
                        @php
                        $statusLabels = [
                        0 => ['text' => 'Raised', 'color' => 'bg-danger'],
                        1 => ['text' => 'Pending', 'color' => 'bg-warning'],
                        2 => ['text' => 'Received', 'color' => 'bg-success'],
                        ];
                        $currentStatus = $statusLabels[$inquiry->order_status ?? 1] ?? ['text' => 'Pending', 'color' => 'bg-warning'];
                        @endphp

                        @if(($inquiry->order_status ?? 1) == 1)

                        <select class="form-select form-select-sm update-status" data-inquiry-id="{{ $inquiry->id }}">
                            <option value="1" {{ $inquiry->order_status == 1 ? 'selected' : '' }}>Pending</option>
                            <option value="2">Received</option>
                            <!-- <option value="0">Raised</option> -->
                        </select>

                        @else

                        <span class="badge {{ $currentStatus['color'] }} text-white px-2 py-1">
                            {{ $currentStatus['text'] }}
                        </span>

                        @endif
                    </td>



                    <td>{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
$(function() {

    $(document).on('change', '.update-status', function () {
        const select = $(this);
        const inquiryId = select.data('inquiry-id');
        const status = select.val();

        if (!inquiryId) {
            alert('Missing inquiry id.');
            return;
        }

        select.prop('disabled', true);

        $.ajax({
    url: "{{ route('seller.update.inquiry.status') }}",
    method: "POST",
    contentType: "application/json",
    headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
    },
    data: JSON.stringify({ inquiry_id: inquiryId, status: status })
})
        .done(function (res) {
            if (res.success) {
                const text = res.text ?? (status == 0 ? 'Raised' : (status == 1 ? 'Pending' : 'Received'));
                const color = res.color ?? (status == 0 ? 'bg-danger' : (status == 1 ? 'bg-warning' : 'bg-success'));

                // replace dropdown with badge
                select.replaceWith(`<span class="badge ${color} text-white px-2 py-1">${text}</span>`);
            } else {
                alert(res.message || 'Update failed.');
                select.prop('disabled', false);
            }
        })
        .fail(function (xhr) {
            console.error('AJAX error', xhr);
            alert('Request failed — check console / network tab.');
            select.prop('disabled', false);
        });
    });
});
</script>

@endsection