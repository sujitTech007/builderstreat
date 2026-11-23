@extends('layouts.frontend')

@section('title', 'Pricing | Builderstreat')

@section('content')
@if(session('message'))
    <div class="wrap pt-4">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<section class="section wrap text-center" id="pricing">
    <div class="section-head text-center mx-auto mb-5" style="max-width: 760px;">
        <div class="eyebrow justify-content-center">PRICING</div>
        <h2>Simple, sale-based pricing</h2>
        <p>Buyers never pay to browse or buy. Sellers pay commission only when a lot actually sells.</p>
    </div>

    <div class="price-grid">
        @foreach($plans as $plan)
            @php
                $features = is_array($plan->features) ? $plan->features : (json_decode($plan->features, true) ?? []);
            @endphp
            <article class="price-card {{ $loop->first ? 'featured' : '' }}">
                <div class="price-tag">{{ $plan->name }}</div>
                <p>{{ $plan->description }}</p>
                <div class="price-amount">${{ number_format($plan->price, 2) }} <sub>{{ $plan->billing_period }}</sub></div>
                <ul class="price-list">
                    @foreach($features as $feature)
                        <li><i class="fa-solid fa-check me-2"></i>{{ is_array($feature) ? ($feature['text'] ?? '') : $feature }}</li>
                    @endforeach
                </ul>
                <a class="btn {{ $loop->first ? 'btn-amber' : 'btn-ghost' }}" href="javascript:void(0);" onclick='handlePlanChoose(@json([
                    "name" => strtolower($plan->name),
                    "price" => $plan->price,
                    "duration" => $plan->billing_period
                ]))'>Choose Plan</a>
            </article>
        @endforeach
    </div>
</section>

<section class="section-tight wrap pt-0">
    <div class="cta-banner">
        <h2>Got a site that's about<br>to strip out?</h2>
        <div style="display:flex; gap:14px; flex-wrap:wrap;">
            <a href="{{ route('seller.register') }}" class="btn">List Your Surplus</a>
            <a href="{{ route('contact') }}" class="btn btn-ghost">Talk to Us</a>
        </div>
    </div>
</section>

<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body p-0">
                <div class="row g-0">
                    <div class="col-lg-6 p-4">
                        <div class="d-flex flex-column h-100">
                            <h4 class="fw-semibold text-center mb-4">Payment Checkout</h4>
                            <button type="button" class="btn btn-success text-white text-start py-3 mb-4">Credit/Debit Card</button>
                            <form id="payment-form" class="mt-2">
                                <div class="small text-muted mb-2">Choose Card</div>
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa" height="22">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg" alt="Mastercard" height="22">
                                </div>
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
                                        <label for="card-holder-name" class="form-label">Card Holder Name</label>
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
                    </div>
                    <div class="col-lg-6 p-4 bg-light border-start">
                        <div class="d-flex flex-column h-100">
                            <h4 class="fw-semibold text-center mb-4">Confirm And Pay</h4>
                            <dl class="row mb-0">
                                <dt class="col-6 text-muted">Category</dt><dd class="col-6 text-end" id="summary-category">Buyer</dd>
                                <dt class="col-6 text-muted">Subscription Plan</dt><dd class="col-6 text-end" id="summary-plan">-</dd>
                                <dt class="col-6 text-muted">Payment Status</dt><dd class="col-6 text-end" id="summary-status">Pending</dd>
                                <dt class="col-6 text-muted">Time Period</dt><dd class="col-6 text-end" id="summary-period">-</dd>
                                <dt class="col-6 text-muted">Amount</dt><dd class="col-6 text-end" id="summary-amount">-</dd>
                            </dl>
                            <div class="mt-auto d-flex justify-content-between pt-4">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" id="confirm-button" class="btn btn-success">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="paymentProcessingOverlay" class="position-absolute top-0 start-0 w-100 h-100 d-none align-items-center justify-content-center bg-white bg-opacity-75">
                <div class="text-center">
                    <div class="spinner-border text-success mb-3" role="status"></div>
                    <div class="fw-semibold">Payment processing...</div>
                    <div class="small text-muted">Please do not close or refresh this window</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const stripe = Stripe(@json(env('STRIPE_KEY')));
    const elements = stripe.elements({
        fonts: [{ cssSrc: 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap' }]
    });
    const elementStyle = {
        base: {
            color: '#2b2b2b',
            fontFamily: 'Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial',
            fontSize: '14px',
            '::placeholder': { color: '#a0a0a0' }
        },
        invalid: { color: '#dc3545' }
    };
    const cardNumber = elements.create('cardNumber', { style: elementStyle });
    const cardExpiry = elements.create('cardExpiry', { style: elementStyle });
    const cardCvc = elements.create('cardCvc', { style: elementStyle });
    cardNumber.mount('#card-number-element');
    cardExpiry.mount('#card-expiry-element');
    cardCvc.mount('#card-cvc-element');

    function handlePlanChoose(planData) {
        const user = @json(Auth::user());
        if (!user) {
            Swal.fire('Login Required', 'Please login to choose a plan.', 'warning').then(() => {
                window.location.href = @json(route('seller.register'));
            });
            return;
        }

        if (Number(planData.price) === 0) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to activate the Free Plan?',
                showCancelButton: true,
                confirmButtonText: 'Yes, Activate',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#6E7E1D',
                cancelButtonColor: '#6c757d'
            }).then(result => {
                if (result.isConfirmed) createFreeSubscription(planData);
            });
            return;
        }

        openPaymentModal(planData);
    }

    function createFreeSubscription(planDetails) {
        setProcessing(true);
        fetch(@json(route('subscription.free')), {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': @json(csrf_token()) },
            body: JSON.stringify({
                plan_name: planDetails.name,
                plan_price: planDetails.price,
                plan_duration: planDetails.duration
            })
        })
            .then(response => response.json())
            .then(data => {
                setProcessing(false);
                if (data.status === 'success') {
                    Swal.fire('Success', 'Free plan activated successfully!', 'success').then(() => location.reload());
                } else {
                    Swal.fire('Error', data.message || 'Failed to activate free plan', 'error');
                }
            })
            .catch(() => {
                setProcessing(false);
                Swal.fire('Error', 'Something went wrong!', 'error');
            });
    }

    function openPaymentModal(planDetails) {
        document.getElementById('selectedPlanInput').value = JSON.stringify(planDetails);
        document.getElementById('summary-plan').textContent = planDetails.name.toUpperCase();
        document.getElementById('summary-period').textContent = String(planDetails.duration || '').toUpperCase();
        document.getElementById('summary-amount').textContent = '$' + Number(planDetails.price || 0).toFixed(2);
        bootstrap.Modal.getOrCreateInstance(document.getElementById('paymentModal')).show();
    }

    const form = document.getElementById('payment-form');
    const overlay = document.getElementById('paymentProcessingOverlay');
    const submitBtn = document.getElementById('submit-button');
    const confirmBtn = document.getElementById('confirm-button');

    function setProcessing(isProcessing) {
        overlay.classList.toggle('d-none', !isProcessing);
        overlay.classList.toggle('d-flex', isProcessing);
        submitBtn.disabled = isProcessing;
        confirmBtn.disabled = isProcessing;
    }

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const cardHolderName = document.getElementById('card-holder-name').value || undefined;
        setProcessing(true);
        stripe.createToken(cardNumber, { name: cardHolderName }).then(result => {
            if (result.error) {
                document.getElementById('card-errors').textContent = result.error.message;
                setProcessing(false);
            } else {
                document.getElementById('card-errors').textContent = '';
                submitPayment(result.token);
            }
        });
    });

    confirmBtn.addEventListener('click', () => form.dispatchEvent(new Event('submit')));

    function submitPayment(token) {
        const selectedPlan = JSON.parse(document.getElementById('selectedPlanInput').value);
        fetch(@json(route('stripe.charge')), {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': @json(csrf_token()) },
            body: JSON.stringify({
                stripeToken: token.id,
                plan_name: selectedPlan.name,
                plan_price: selectedPlan.price,
                plan_duration: selectedPlan.duration
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire('Success', 'Payment successful!', 'success').then(() => location.reload());
                } else {
                    Swal.fire('Error', data.message || 'Payment failed!', 'error');
                    setProcessing(false);
                }
            })
            .catch(() => {
                Swal.fire('Error', 'Something went wrong!', 'error');
                setProcessing(false);
            });
    }
</script>
@endpush
