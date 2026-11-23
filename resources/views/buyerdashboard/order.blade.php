@extends('layouts.buyer')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- SweetAlert --}}

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">My Orders</h2>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->enquiry_id }}</td>
                    <td>{{ $order->material->name ?? 'N/A' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>${{ number_format($order->amount, 2) }}</td>
                    
                    {{-- Status --}}
                    <td>
                        <span class="badge 
                            @if($order->status === 'pending') bg-warning 
                            @elseif($order->status === 'approved') bg-success 
                            @elseif($order->status === 'cancelled') bg-danger 
                            @else bg-secondary @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>

                    {{-- Payment Status --}}
                    <td>
                        <span class="badge 
                            @if($order->payment_status === 'unpaid') bg-danger 
                            @elseif($order->payment_status === 'paid') bg-success 
                            @else bg-secondary @endif">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </td>

                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>
                        @if($order->payment_status === 'unpaid')
                            <button 
                                class="btn btn-sm btn-primary" 
                                onclick="openOrderPaymentModal({{ $order->id }}, '{{ $order->amount }}')">
                                Pay Now
                            </button>
                        @else
                            <span class="badge bg-success">Paid</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Payment Modal --}}
<div class="modal fade" id="orderPaymentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <h4 class="fw-semibold text-center mb-3">Order Payment</h4>
        <form id="order-payment-form">
          <input type="hidden" id="selectedOrderId">
          <input type="hidden" id="selectedOrderAmount">

          <label class="form-label">Card Details</label>
          <div id="order-card-element" class="form-control mb-2"></div>
          <div id="order-card-errors" class="text-danger small"></div>

          <div class="d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">Cancel</button>
            <button id="order-submit-btn" type="submit" class="btn btn-success">Pay</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
let stripe = Stripe("{{ env('STRIPE_KEY') }}");
let elements = stripe.elements();
let card = elements.create("card", { style: { base: { fontSize: "16px" } } });
card.mount("#order-card-element");

function openOrderPaymentModal(orderId, amount) {
    document.getElementById('selectedOrderId').value = orderId;
    document.getElementById('selectedOrderAmount').value = amount;
    new bootstrap.Modal(document.getElementById("orderPaymentModal")).show();
}

document.getElementById("order-payment-form").addEventListener("submit", function(e) {
    e.preventDefault();
    let orderId = document.getElementById("selectedOrderId").value;
    let amount  = document.getElementById("selectedOrderAmount").value;

    Swal.fire({
        title: "Processing Payment...",
        text: "Please wait while we complete your payment.",
        allowOutsideClick: false,
        didOpen: () => { Swal.showLoading(); }
    });

    stripe.createToken(card).then(function(result) {
        if (result.error) {
            Swal.fire("Error", result.error.message, "error");
        } else {
            fetch("{{ url('buyer/orders/pay') }}/" + orderId, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    stripeToken: result.token.id,
                    amount: amount
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "success") {
                    Swal.fire("Success", "Order paid successfully!", "success").then(() => location.reload());
                } else {
                    Swal.fire("Error", data.message || "Payment failed", "error");
                }
            })
            .catch(() => {
                Swal.fire("Error", "Something went wrong. Try again.", "error");
            });
        }
    });
});
</script>
@endsection
