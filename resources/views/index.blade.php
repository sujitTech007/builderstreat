    @extends('layouts.frontend')

    @section('title', 'Builderstreat — Materials Exchange for Surplus Construction Material')

    @section('content')
    <section class="hero position-relative">
        <img src="{{ asset('public/assets/builderstreat-html/assets/images/hero.png') }}" alt="" class="hero-img position-absolute w-100 h-100" style="top:0; left:0; z-index:-1;">
        <div class="container">
            <div class="row">
                <div class="hero-grid">
                    <div>
                        <div class="eyebrow">A Marketplace for Surplus Building Materials</div>
                        <h1>The Smart Way to <br><strong>Buy &amp; Sell Surplus</strong> Construction Materials</h1>
                        <p class="lead">Keep valuable materials in circulation instead of sending them to landfill. Builderstreat helps businesses save money, generate revenue, and build more sustainably.</p>
                        <div class="hero-cta">
                            <a href="{{ route('listing') }}" class="btn">Browse Materials</a>
                            <a href="{{ route('seller.register') }}" class="btn btn-ghost">Join Builderstreat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="stats-bar">
        <div class="wrap stats-grid">
            <div class="stat"><b>412 t</b><span>Diverted From Landfill, YTD</span></div>
            <div class="stat"><b>1,180</b><span>Active Listings</span></div>
            <div class="stat"><b>26</b><span>Cities Served, ON &amp; Beyond</span></div>
            <div class="stat"><b>58%</b><span>Avg. Buyer Savings vs. Retail</span></div>
        </div>
    </div>

    <section class="section wrap">
        <div class="about-grid">
            <img src="{{ asset('public/assets/builderstreat-html/assets/images/thumb-1.jpeg') }}" alt="Reusable surplus construction materials">
            <div>
                <div class="eyebrow">ABOUT BUILDERSTREAT</div>
                <h2>Driving the Future of Circular Construction</h2>
                <p>Builderstreat is reimagining construction and waste recycling through sustainability and innovation. Our marketplace helps keep valuable materials in circulation by connecting businesses and individuals with surplus supplies.</p>
                <p>Reuse more, reduce waste, and find quality materials for your next project.</p>
                <a href="{{ route('about') }}" class="btn btn-ghost btn-sm">See how it works</a>
            </div>
        </div>
    </section>

    <section class="section pt-0">
        <div class="container">
            <div class="section-head">
                <div class="eyebrow">OUR SERVICES</div>
                <h2>Explore Our Range of Expert Services</h2>
                <p>No surprises at pickup. Sellers grade against a fixed standard, and buyers can connect directly with sellers to confirm material details.</p>
            </div>
            <div class="grade-grid">
                <article class="grade-card grade-a">
                    <div class="grade-letter"><i class="fa-solid fa-house"></i></div>
                    <h4>Residential Construction</h4>
                    <p>Find reusable materials for residential construction, renovations, and additions.</p>
                </article>
                <article class="grade-card grade-b">
                    <div class="grade-letter"><i class="fa-solid fa-building"></i></div>
                    <h4>Commercial Construction</h4>
                    <p>Source surplus supplies for offices, retail spaces, warehouses, and commercial projects.</p>
                </article>
                <article class="grade-card grade-c">
                    <div class="grade-letter"><i class="fa-solid fa-briefcase"></i></div>
                    <h4>Project Management</h4>
                    <p>Coordinate your material needs and connect with suppliers through one marketplace.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section categories-wrap p-0">
        <div class="container">
            <div class="section-head">
                <div class="eyebrow">OUR CATEGORIES</div>
                <h2>Most popular categories</h2>
            </div>
            <div class="stories-grid swiper storiesSwiper">
                @php
                $homeCategories = [
                ['Cement & Concrete', 'cement-bag.png', 'High-quality cement and concrete for strong, durable construction.'],
                ['Bricks & Blocks', 'brick-block.png', 'Durable bricks and blocks for long-lasting building projects.'],
                ['Tiles & Flooring', 'tiles-thumb.png', 'Surplus flooring at a fraction of retail.'],
                ['Pipes & Plumbing', 'thumb-3.png', 'Reusable pipes, fittings, and valves.'],
                ['Lumber & Wood', 'wood.png', 'Quality lumber without paying new-stock prices.'],
                ['Doors & Windows', 'door.png', 'Interior and exterior doors, windows, and frames.'],
                ['Electrical & Lighting', 'electrical-items.png', 'Wiring, panels, switches, and lighting supplies.'],
                ['Kitchen & Bath', 'bath-images.png', 'Cabinets, fixtures, and finishes for your project.'],
                ];
                @endphp
                @foreach($homeCategories as [$name, $image, $description])
                <article class="story-card position-relative border-0">
                    <div class="story-photo">
                        <img src="{{ asset('public/assets/builderstreat-html/assets/images/' . $image) }}" alt="{{ $name }}" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy">
                    </div>
                    <div class="story-body position-absolute bottom-0 start-0 w-100 p-3">
                        <h3>{{ $name }}</h3>
                        <p class="text-white">{{ $description }}</p>
                        <a href="{{ route('listing') }}" class="btn btn-amber btn-sm">View more</a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section wrap product-listings">
        <div class="d-flex justify-content-between w-100">
            <div class="section-head">
                <div class="eyebrow">LATEST LISTINGS</div>
                <h2>Explore Surplus Construction Materials</h2>
                <p>Browse quality surplus materials from sellers at competitive prices.</p>
            </div>
            <div class="text-center mt-4"><a href="{{ route('listing') }}" class="btn btn-primary">View all materials</a></div>
        </div>

        <div class="swiper btSwiper">
            <div class="swiper-wrapper">
                @forelse($products as $product)
                @php
                $discountAmount = ($product->offer * $product->discount) / 100;
                $finalPrice = $product->offer - $discountAmount;
                @endphp
                <div class="swiper-slide">
                    <article class="bt-card">
                        <div class="bt-media">
                            <a href="{{ route('products.details', $product->id) }}">
                                <img src="{{ $product->image ? asset($product->image) : asset('public/assets/builderstreat-html/assets/images/product.jpg') }}" alt="{{ $product->product_name }}" loading="lazy">
                            </a>
                            <button class="wishlist-btn" type="button" data-product-id="{{ $product->id }}" onclick="toggleWishlist({{ $product->id }})" aria-label="Toggle wishlist for {{ $product->product_name }}">
                                <i class="fa-solid fa-heart"></i>
                            </button>
                        </div>
                        <div class="bt-body">
                            <div class="bt-info">
                                <p class="bt-cat">{{ optional($product->category)->name ?? 'Surplus Material' }}</p>
                                <h3 class="bt-title">{{ $product->product_name }}</h3>
                                <p class="bt-model">{{ $product->brand_name ?: ($product->model_number ?: 'Construction material') }}</p>
                            </div>
                            <div class="bt-pricing">
                                <div class="bt-price-row">
                                    <p class="bt-price"><span class="bt-now">${{ number_format($finalPrice, 2) }}</span></p>
                                    @if($product->discount)
                                    <span class="bt-save">Save {{ rtrim(rtrim(number_format($product->discount, 2), '0'), '.') }}%</span>
                                    @endif
                                </div>
                                <p class="bt-market">{{ Str::limit($product->description, 110) }}</p>
                            </div>
                            <div class="bt-actions">
                                <a href="{{ route('products.details', $product->id) }}" class="btn btn-sm bt-view">View</a>
                                @if(Auth::check())
                                <a href="{{ route('products.details', $product->id) }}" class="btn btn-amber btn-sm">Enquire</a>
                                @else
                                <a href="{{ route('buyer.register') }}" class="btn btn-amber btn-sm">Login to Enquire</a>
                                @endif
                            </div>
                        </div>
                    </article>
                </div>
                @empty

                <p class="text-muted">No products found.</p>
                @endforelse



            </div>
            <div class="bt-swiper-pagination d-flex justify-content-center mt-5"></div>
        </div>

    </section>

    <section class="section position-relative">
        <img src="{{ asset('public/assets/builderstreat-html/assets/images/what-we-do-bg.png') }}" alt="" class="bg-img position-absolute w-100 h-100" style="object-fit:cover; top:0; left:0; z-index:-1;">
        <div class="wrap">
            <div class="about-grid">
                <div>
                    <div class="eyebrow">WHAT WE DO</div>
                    <h2 class="mb-3">We Help You to Build Something For Future</h2>
                    <p>Our digital marketplace helps contractors and construction sites find and exchange reusable surplus materials.</p>
                    <p>Big construction companies can reduce their ecological impact and material waste while smaller sites find the resources they need.</p>
                    <a href="{{ route('about') }}" class="btn btn-ghost">Learn more</a>
                </div>
                <div></div>
            </div>
        </div>
    </section>




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
                                    <dt class="col-6 text-muted">Category</dt>
                                    <dd class="col-6 text-end" id="summary-category">Buyer</dd>
                                    <dt class="col-6 text-muted">Subscription Plan</dt>
                                    <dd class="col-6 text-end" id="summary-plan">-</dd>
                                    <dt class="col-6 text-muted">Payment Status</dt>
                                    <dd class="col-6 text-end" id="summary-status">Pending</dd>
                                    <dt class="col-6 text-muted">Time Period</dt>
                                    <dd class="col-6 text-end" id="summary-period">-</dd>
                                    <dt class="col-6 text-muted">Amount</dt>
                                    <dd class="col-6 text-end" id="summary-amount">-</dd>
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

    @push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const stripe = Stripe(@json(env('STRIPE_KEY')));
        const elements = stripe.elements({
            fonts: [{
                cssSrc: 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap'
            }]
        });
        const elementStyle = {
            base: {
                color: '#2b2b2b',
                fontFamily: 'Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial',
                fontSize: '14px',
                '::placeholder': {
                    color: '#a0a0a0'
                }
            },
            invalid: {
                color: '#dc3545'
            }
        };
        const cardNumber = elements.create('cardNumber', {
            style: elementStyle
        });
        const cardExpiry = elements.create('cardExpiry', {
            style: elementStyle
        });
        const cardCvc = elements.create('cardCvc', {
            style: elementStyle
        });
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
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': @json(csrf_token())
                    },
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

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const cardHolderName = document.getElementById('card-holder-name').value || undefined;
            setProcessing(true);
            stripe.createToken(cardNumber, {
                name: cardHolderName
            }).then(result => {
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
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': @json(csrf_token())
                    },
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


    <section class="section section_how_it_work py-5" id="how">
        <div class="container">
            <div class="row">
                <div class="section-head">
                    <div class="eyebrow">THE PROCESS</div>
                    <h2>How it works</h2>
                    <p>A simpler way to exchange surplus construction materials.</p>
                </div>

                <div class="tabs-head">
                    <ul class="nav nav-tabs p-0" id="buyerSellerTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link bg-transparent active"
                                id="buyers-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#buyers"
                                type="button"
                                role="tab"
                                aria-controls="buyers"
                                aria-selected="true">
                                For Buyers
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link bg-transparent"
                                id="sellers-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#sellers"
                                type="button"
                                role="tab"
                                aria-controls="sellers"
                                aria-selected="false">
                                For Sellers
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="buyerSellerTabsContent">

                    <!-- Buyers -->
                    <div class="tab-pane fade show active"
                        id="buyers"
                        role="tabpanel"
                        aria-labelledby="buyers-tab">

                        <div class="tab-pane-content">

                            <div class="step">
                                <div class="step-num">01</div>
                                <h4>Find the Right Materials</h4>
                                <p>Browse surplus materials by type, grade, quantity, and location.</p>
                            </div>

                            <div class="step">
                                <div class="step-num">02</div>
                                <h4>Connect with Sellers</h4>
                                <p>Send enquiries, discuss pricing, and confirm material availability.</p>
                            </div>

                            <div class="step">
                                <div class="step-num">03</div>
                                <h4>Agree on the Details</h4>
                                <p>Finalize quantities, pricing, and pickup or delivery arrangements.</p>
                            </div>

                            <div class="step">
                                <div class="step-num">04</div>
                                <h4>Complete Your Purchase</h4>
                                <p>Collect or receive your materials and complete the transaction.</p>
                            </div>

                        </div>
                    </div>

                    <!-- Sellers -->
                    <div class="tab-pane fade"
                        id="sellers"
                        role="tabpanel"
                        aria-labelledby="sellers-tab">

                        <div class="tab-pane-content">

                            <div class="step">
                                <div class="step-num">01</div>
                                <h4>List Your Surplus</h4>
                                <p>Upload material photos, add descriptions, and specify quantity and location.</p>
                            </div>

                            <div class="step">
                                <div class="step-num">02</div>
                                <h4>Set Your Asking Price</h4>
                                <p>Choose your price and make your surplus materials available to buyers.</p>
                            </div>

                            <div class="step">
                                <div class="step-num">03</div>
                                <h4>Connect with Buyers</h4>
                                <p>Receive enquiries, discuss offers, and confirm sale details.</p>
                            </div>

                            <div class="step">
                                <div class="step-num">04</div>
                                <h4>Complete the Sale</h4>
                                <p>Arrange pickup or delivery and turn surplus materials into value.</p>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- <ul class="nav nav-tabs p-0" id="buyerSellerTabs" role="tablist">
            <li class="nav-item" role="presentation"><button class="nav-link active" id="buyers-tab" data-bs-toggle="tab" data-bs-target="#buyers" type="button" role="tab" aria-controls="buyers" aria-selected="true">For Buyers</button></li>
            <li class="nav-item" role="presentation"><button class="nav-link" id="sellers-tab" data-bs-toggle="tab" data-bs-target="#sellers" type="button" role="tab" aria-controls="sellers" aria-selected="false">For Sellers</button></li>
        </ul>
        <div class="tab-content pt-4" id="buyerSellerTabsContent">
            <div class="tab-pane fade show active" id="buyers" role="tabpanel" aria-labelledby="buyers-tab">
                <div class="grade-grid">
                    <article class="grade-card"><h4>Search the yard</h4><p>Browse available materials and find the right fit for your project.</p></article>
                    <article class="grade-card"><h4>Send an enquiry</h4><p>Contact the seller with your requested quantity and details.</p></article>
                    <article class="grade-card"><h4>Agree on details</h4><p>Confirm pricing, pickup, or delivery arrangements with the seller.</p></article>
                </div>
            </div>
            <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                <div class="grade-grid">
                    <article class="grade-card"><h4>List your surplus</h4><p>Add your available materials to the marketplace.</p></article>
                    <article class="grade-card"><h4>Respond to buyers</h4><p>Review incoming enquiries and discuss the material details.</p></article>
                    <article class="grade-card"><h4>Complete the sale</h4><p>Coordinate the handoff and keep your listing up to date.</p></article>
                </div>
            </div>
        </div> -->
            </div>
        </div>
    </section>



    <section class="section wrap section-stories py-3 pt-5">

        <div class="section-head">

            <div class="eyebrow">Project Stories</div>

            <h2>See How Builders Create More Value</h2>

        </div>

        <div class="stories-grid">



            <div class="story-card">

                <div class="story-photo">

                    <img src="{{ asset('public/assets/builderstreat-html/assets/images/thumb-1.jpeg') }}" alt="Building Smarter with Reclaimed Materials"

                        class="img-fluid w-100 h-100 object-fit-cover">

                </div>

                <div class="story-body">

                    <h3 style="font-size:1rem;">Building Smarter with Reclaimed Materials</h3>

                    <p>A residential builder sourced reclaimed bricks and structural steel through Builderstreat, reducing project

                        costs while keeping quality construction materials in circulation.</p>

                    <div class="story-meta">Small Residential Builder — Toronto, ON</div>

                </div>

            </div>



            <div class="story-card">

                <div class="story-photo">

                    <img src="{{ asset('public/assets/builderstreat-html/assets/images/thumb-2.jpeg') }}" alt="Building Smarter with Reclaimed Materials"

                        class="img-fluid w-100 h-100 object-fit-cover">

                </div>

                <div class="story-body">

                    <h3 style="font-size:1rem;">Turning Surplus into New Opportunities</h3>

                    <p>A demolition contractor listed reusable steel and concrete materials, preventing landfill waste and

                        connecting them with builders who needed affordable supplies.</p>

                    <div class="story-meta">Demolition Contractor — Mississauga, ON</div>

                </div>

            </div>



            <div class="story-card">

                <div class="story-photo">

                    <img src="{{ asset('public/assets/builderstreat-html/assets/images/thumb-3.png') }}" alt="Building Smarter with Reclaimed Materials"

                        class="img-fluid w-100 h-100 object-fit-cover">

                </div>

                <div class="story-body">

                    <h3 style="font-size:1rem;">Keeping Projects on Schedule</h3>

                    <p>When new materials faced delivery delays, a contractor sourced quality surplus inventory locally through

                        Builderstreat, completing the project on time and within budget.</p>

                    <div class="story-meta">General Contractor — Brampton, ON</div>

                </div>

            </div>

        </div>

    </section>



    <section class="testimonial-section py-5">

        <div class="container">

            <div class="row">

                <div class="section-head text-center m-auto mx-none">

                    <div class="w-100 mb-2">

                        <div class="eyebrow text-center m-auto" style="width: fit-content;">Happy clients</div>

                    </div>

                    <h2>Trusted by Builders. Valued by Contractors.</h2>

                    <p>Trusted by construction professionals who build smarter with Builderstreat.</p>

                </div>

                <div class="swiper testimonialSlider">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide">

                            <div class="testimonial-box text-center">

                                <img src="{{ asset('public/assets/builderstreat-html/assets/images/client-1.png') }}" class="client-img" alt="">

                                <div class="stars mt-4">

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                </div>

                                <p class="mt-4">"Builderstreat completely changed the game for us. Their innovative approach to project management and their attention to detail made our project a success beyond our expectations."</p>



                                <h4>David Thompson</h4>

                                <span>Project Manager • Skyline Construction</span>



                            </div>



                        </div>

                        <div class="swiper-slide">

                            <div class="testimonial-box text-center">

                                <img src="{{ asset('public/assets/builderstreat-html/assets/images/client-1.png') }}" class="client-img" alt="">



                                <div class="stars mt-4">

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                </div>



                                <p class="mt-4">"Builderstreat completely changed the game for us. Their innovative approach to project

                                    management and their attention to detail made our project a success beyond our expectations."</p>

                                <h4>Sauqi Arief</h4>

                                <span>CEO Of Mabar</span>

                            </div>

                        </div>



                        <div class="swiper-slide">

                            <div class="testimonial-box text-center">

                                <img src="{{ asset('public/assets/builderstreat-html/assets/images/client-2.png') }}" class="client-img" alt="">



                                <div class="stars mt-4">

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                </div>



                                <p class="mt-4">"We were skeptical at first, but after seeing the results in our first project with

                                    Builderstreat, we knew we had found a partner we could trust. Their commitment to quality and customer

                                    satisfaction is unmatched."</p>

                                <h4>Emilia Tadashi</h4>

                                <span>Housewife</span>

                            </div>

                        </div>



                        <div class="swiper-slide">

                            <div class="testimonial-box text-center">

                                <img src="{{ asset('public/assets/builderstreat-html/assets/images/client-3.png') }}" class="client-img" alt="">



                                <div class="stars mt-4">

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                    <i class="fa-solid fa-star"></i>

                                </div>



                                <p class="mt-4">"Builderstreat not only helped us complete our project on time and on budget but also

                                    offered valuable insights that improved the overall design and functionality of our building. We

                                    couldn't be happier with the outcome."</p>

                                <h4>Faiza Mubarak</h4>

                                <span>Succes Man</span>

                            </div>

                        </div>



                    </div>



                    <div class="swiper-button-prev"></div>

                    <div class="swiper-button-next"></div>

                    <div class="swiper-pagination"></div>



                </div>



            </div>



        </div>

    </section>







    <!-- FAQ -->

    <section class="section wrap pt-0" id="faq">

        <div class="section-head">

            <div class="eyebrow">FAQ</div>

            <h2>Frequently Asked Questions</h2>

            <p>Explore our FAQs for quick answers to common inquiries and concerns.</p>

        </div>

        <div class="accordion" id="builderstreatFaq">

            <!-- FAQ 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingOne">
                    <button class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqOne"
                        aria-expanded="true"
                        aria-controls="faqOne">
                        What is Builderstreat?
                    </button>
                </h2>

                <div id="faqOne"
                    class="accordion-collapse collapse show"
                    aria-labelledby="faqHeadingOne"
                    data-bs-parent="#builderstreatFaq">

                    <div class="accordion-body">
                        <p>
                            Builderstreat is a technology company specializing in creating solutions
                            that expand the capabilities of the Construction and Demolition (C&D)
                            waste recycling industry. Our digital marketplace connects companies
                            and individuals with C&D waste to other parties that will either use
                            it for a new purpose or efficiently recycle or dispose of it, promoting
                            a more sustainable construction industry.
                        </p>
                    </div>

                </div>
            </div>


            <!-- FAQ 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingTwo">
                    <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqTwo"
                        aria-expanded="false"
                        aria-controls="faqTwo">
                        What types of materials can be exchanged on Builderstreat?
                    </button>
                </h2>

                <div id="faqTwo"
                    class="accordion-collapse collapse"
                    aria-labelledby="faqHeadingTwo"
                    data-bs-parent="#builderstreatFaq">

                    <div class="accordion-body">
                        <p>
                            Builderstreat facilitates the exchange of various materials generated
                            from construction and demolition activities, including but not limited
                            to concrete, wood, metal, plastic, glass, and asphalt. We aim to promote
                            the reuse and recycling of these materials to minimize waste and
                            environmental impact.
                        </p>
                    </div>

                </div>
            </div>


            <!-- FAQ 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingThree">
                    <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqThree"
                        aria-expanded="false"
                        aria-controls="faqThree">
                        Is Builderstreat available in multiple countries?
                    </button>
                </h2>

                <div id="faqThree"
                    class="accordion-collapse collapse"
                    aria-labelledby="faqHeadingThree"
                    data-bs-parent="#builderstreatFaq">

                    <div class="accordion-body">
                        <p>
                            Now, Builderstreat operates primarily in Canada and the United States.
                            However, we have plans to expand into other regions in the future as
                            part of our growth strategy.
                        </p>
                    </div>

                </div>
            </div>


            <!-- FAQ 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingFour">
                    <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqFour"
                        aria-expanded="false"
                        aria-controls="faqFour">
                        Can Builderstreat users access customer support?
                    </button>
                </h2>

                <div id="faqFour"
                    class="accordion-collapse collapse"
                    aria-labelledby="faqHeadingFour"
                    data-bs-parent="#builderstreatFaq">

                    <div class="accordion-body">
                        <p>
                            Yes, Builderstreat provides customer support to assist users with any
                            questions, issues, or concerns they may have. Users can reach out to
                            our support team through the platform's messaging system or contact us
                            via email or phone for assistance.
                        </p>
                    </div>

                </div>
            </div>


            <!-- FAQ 5 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingFive">
                    <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqFive"
                        aria-expanded="false"
                        aria-controls="faqFive">
                        Who can use Builderstreat?
                    </button>
                </h2>

                <div id="faqFive"
                    class="accordion-collapse collapse"
                    aria-labelledby="faqHeadingFive"
                    data-bs-parent="#builderstreatFaq">

                    <div class="accordion-body">
                        <p>
                            Builderstreat is designed for a wide range of users within the
                            construction industry, including large construction companies,
                            individual contractors, waste management businesses, and suppliers
                            of recycled materials. Whether you have surplus materials to sell
                            or are looking for specific materials for your project, Builderstreat
                            provides a platform for connecting with relevant parties.
                        </p>
                    </div>

                </div>
            </div>


            <!-- FAQ 6 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingSix">
                    <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqSix"
                        aria-expanded="false"
                        aria-controls="faqSix">
                        How does Builderstreat handle transactions and payments?
                    </button>
                </h2>

                <div id="faqSix"
                    class="accordion-collapse collapse"
                    aria-labelledby="faqHeadingSix"
                    data-bs-parent="#builderstreatFaq">

                    <div class="accordion-body">
                        <p>
                            Builderstreat facilitates transactions between buyers and sellers on
                            the platform. Payments are securely processed through the platform,
                            and transaction funds are held in escrow until both parties confirm
                            completion. This ensures transparency and protects the interests of
                            all parties involved in the transaction.
                        </p>
                    </div>

                </div>
            </div>


            <!-- FAQ 7 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingSeven">
                    <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqSeven"
                        aria-expanded="false"
                        aria-controls="faqSeven">
                        How can I get started with Builderstreat?
                    </button>
                </h2>

                <div id="faqSeven"
                    class="accordion-collapse collapse"
                    aria-labelledby="faqHeadingSeven"
                    data-bs-parent="#builderstreatFaq">

                    <div class="accordion-body">
                        <p>
                            To get started with Builderstreat, simply visit our website, and sign
                            up for a membership. Once registered, you can create a profile, list
                            materials, browse listings, and connect with other users on the
                            platform to start exchanging C&D waste materials efficiently and
                            sustainably.
                        </p>
                    </div>

                </div>
            </div>

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
    @endsection