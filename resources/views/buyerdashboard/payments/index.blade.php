@extends('layouts.buyer')


@section('content')


<style>
  /* Keep the method button static (no hover visual change) */
  #paymentModal .btn-no-hover:hover,
  #paymentModal .btn-no-hover:focus,
  #paymentModal .btn-no-hover:active {
    background-color: #198754 !important;
    border-color: #198754 !important;
    color: #ffffff !important;
    box-shadow: none !important;
  }
  /* Allow overlay on the whole dialog */
  #paymentModal .modal-content { position: relative; }
  #paymentProcessingOverlay { background: rgba(255,255,255,0.85); z-index: 10; }
  #paymentProcessingOverlay .spinner-border { width: 3rem; height: 3rem; }
</style>
<style>
  /* Make the method button appear static (no hover/focus/active visual change) */
  #paymentModal .btn-no-hover:hover,
  #paymentModal .btn-no-hover:focus,
  #paymentModal .btn-no-hover:active {
    background-color: #198754 !important; /* same as .btn-success */
    border-color: #198754 !important;
    color: #ffffff !important;
    box-shadow: none !important;
  }
</style>

<div class="page-head">
    <div>
        <h1>Payment History</h1>
        <p>Review your subscription payments and plan status.</p>
    </div>
</div>
@if($subscriptions->isEmpty())
    <div class="card"><div class="alert alert-info mb-0">No subscription payments found.</div></div>
@else
    <div class="card border-0 p-0">
    <div class="table-responsive">
        <table class="table table-striped theme_table align-middle mb-0">
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Billing Period</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $subscription)
                    <tr>
                        <td>{{ $subscription->plan_name ?? optional($subscription->plan)->name }}</td>
                        <td>
                            @php
                                $daysLeft = now()->diffInDays(\Carbon\Carbon::parse($subscription->end_date), false);
                            @endphp
                            @if($daysLeft > 0)
                                {{ round($daysLeft) }} days left
                            @else
                                Expired
                            @endif
                        </td>
                        <td>₹{{ number_format($subscription->price ?? optional($subscription->plan)->price ?? 0, 2) }}</td>
                        <td>
                            <span class="badge {{ ($subscription->payment_status ?? 'paid') === 'paid' ? 'bg-success' : 'bg-secondary' }}">
                                {{ strtoupper($subscription->payment_status ?? 'paid') }}
                            </span>
                        </td>
                        <td>{{ optional($subscription->start_date)->format('Y-m-d') }}</td>
                        <td>{{ optional($subscription->end_date)->format('Y-m-d') }}</td>

                        <td>
                            @if(optional($subscription->end_date) && $subscription->end_date->isPast())
                                <button 
                                    class="btn btn-sm btn-success"
                                    onclick="handleRenew({{ $subscription->id }}, '{{ $subscription->plan_name }}', {{ $subscription->price }})">
                                    Renew Plan
                                </button>
                            @else
                                <span class="badge bg-success text-muted">Active</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    {{-- Stripe Payment Modal --}}
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <!-- Left: Checkout -->
                        <div class="col-lg-7 p-4">
                            <h4 class="fw-semibold text-center mb-4">Payment Checkout</h4>
                            <form id="payment-form" class="mt-2">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Card Number</label>
                                        <div id="card-number-element" class="form-control"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Valid Through</label>
                                        <div id="card-expiry-element" class="form-control"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">CVV</label>
                                        <div id="card-cvc-element" class="form-control"></div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Card Holder Name</label>
                                        <input id="card-holder-name" type="text" class="form-control" placeholder="Card Holder Name">
                                    </div>
                                </div>
                                <div id="card-errors" class="text-danger small mt-2" role="alert"></div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button id="submit-button" type="submit" class="btn btn-success px-4">Pay</button>
                                </div>
                                <input type="hidden" id="selectedPlanInput">
                            </form>
                        </div>
                        <!-- Right: Summary -->
                        <div class="col-lg-5 p-4 bg-light border-start">
                            <h4 class="fw-semibold text-center mb-4">Confirm And Pay</h4>
                            <dl class="row mb-0">
                                <dt class="col-6 text-muted">Subscription Plan</dt>
                                <dd class="col-6 text-end" id="summary-plan">-</dd>
                                <dt class="col-6 text-muted">Time Period</dt>
                                <dd class="col-6 text-end" id="summary-period">-</dd>
                                <dt class="col-6 text-muted">Amount</dt>
                                <dd class="col-6 text-end" id="summary-amount">-</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <!-- processing overlay -->
                <div id="paymentProcessingOverlay" class="position-absolute top-0 start-0 w-100 h-100 d-none align-items-center justify-content-center">
                    <div class="text-center">
                        <div class="spinner-border text-success mb-3" role="status"></div>
                        <div class="fw-semibold">Payment processing...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let stripe = Stripe("{{ env('STRIPE_KEY') }}");
        let elements = stripe.elements();
        let cardNumber = elements.create('cardNumber');
        let cardExpiry = elements.create('cardExpiry');
        let cardCvc    = elements.create('cardCvc');
        cardNumber.mount('#card-number-element');
        cardExpiry.mount('#card-expiry-element');
        cardCvc.mount('#card-cvc-element');

        function openPaymentModal(planDetails) {
            document.getElementById("selectedPlanInput").value = JSON.stringify(planDetails);
            document.getElementById('summary-plan').textContent = planDetails.name.toUpperCase();
            document.getElementById('summary-period').textContent = planDetails.duration || "1 Month";
            document.getElementById('summary-amount').textContent = `$${Number(planDetails.price || 0).toFixed(2)}`;
            const modal = new bootstrap.Modal(document.getElementById("paymentModal"));
            modal.show();
        }
        const overlay = document.getElementById('paymentProcessingOverlay');

        function handleRenew(subscriptionId, planName, planPrice) {
            const planDetails = { id: subscriptionId, name: planName, price: planPrice, duration: "1 Month" };
            openPaymentModal(planDetails);
        }

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            stripe.createToken(cardNumber, { name: document.getElementById('card-holder-name').value }).then(function (result) {
                if (result.error) {
                    document.getElementById('card-errors').textContent = result.error.message;
                } else {
                    document.getElementById('card-errors').textContent = '';
                    submitPayment(result.token);
                }
            });
        });

        function submitPayment(token) {
    const selectedPlan = JSON.parse(document.getElementById("selectedPlanInput").value);
    let url = "{{ route('stripe.charge') }}";  
    let payload = {
        stripeToken: token.id,
        plan_name: selectedPlan.name,
        plan_price: selectedPlan.price,
        plan_duration: selectedPlan.duration
    };

    if (selectedPlan.id) { // renewal
        url = "{{ url('subscription/:id/renew') }}".replace(':id', selectedPlan.id);
        payload = { stripeToken: token.id };
    }

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify(payload)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            Swal.fire("Success", "Payment successful! Renew your subscription Plan.", "success").then(() => location.reload());
        } else {
            Swal.fire("Error", data.message || "Payment failed!", "error");
        }
    });
}
    </script>

    <div class="mt-3">{{ $subscriptions->links() }}</div>
@endif
@endsection
