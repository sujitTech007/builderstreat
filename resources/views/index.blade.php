@extends('layouts.frontend')

@section('title', 'Builderstreat — Materials Exchange for Surplus Construction Material')

@section('content')
<section class="hero position-relative">
    <img src="{{ asset('public/assets/images/hero.png') }}" alt="" class="hero-img position-absolute w-100 h-100" style="top:0; left:0; z-index:-1;">
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
        <img src="{{ asset('public/assets/images/thumb-1.jpeg') }}" alt="Reusable surplus construction materials">
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
                        <img src="{{ asset('public/assets/images/' . $image) }}" alt="{{ $name }}" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy">
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
    <div class="section-head">
        <div class="eyebrow">LATEST LISTINGS</div>
        <h2>Explore Surplus Construction Materials</h2>
        <p>Browse quality surplus materials from sellers at competitive prices.</p>
    </div>
    <div class="bt-grid">
        @forelse($products as $product)
            @php
                $discountAmount = ($product->offer * $product->discount) / 100;
                $finalPrice = $product->offer - $discountAmount;
            @endphp
            <article class="bt-card">
                <div class="bt-media">
                    <a href="{{ route('products.details', $product->id) }}">
                        <img src="{{ $product->image ? asset($product->image) : asset('public/assets/images/product.jpg') }}" alt="{{ $product->product_name }}" loading="lazy">
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
        @empty
            <p class="text-muted">No products found.</p>
        @endforelse
        
        
    </div>
    <div class="text-center mt-4"><a href="{{ route('listing') }}" class="btn btn-primary">View all materials</a></div>
</section>

<section class="section position-relative">
    <img src="{{ asset('public/assets/images/what-we-do-bg.png') }}" alt="" class="bg-img position-absolute w-100 h-100" style="object-fit:cover; top:0; left:0; z-index:-1;">
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

<section class="section wrap" id="how">
    <div class="section-head">
        <div class="eyebrow">THE PROCESS</div>
        <h2>How it works</h2>
        <p>A simpler way to exchange surplus construction materials.</p>
    </div>
    <ul class="nav nav-tabs p-0" id="buyerSellerTabs" role="tablist">
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
    </div>
</section>

<section class="section wrap pt-0" id="faq">
    <div class="section-head">
        <div class="eyebrow">FAQ</div>
        <h2>Frequently Asked Questions</h2>
    </div>
    <div class="accordion" id="builderstreatFaq">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeadingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">What is Builderstreat?</button></h2>
            <div id="faqOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#builderstreatFaq"><div class="accordion-body">Builderstreat is a digital marketplace connecting people with surplus construction and demolition materials to those who can reuse them.</div></div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeadingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">What types of materials can be exchanged?</button></h2>
            <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#builderstreatFaq"><div class="accordion-body">The marketplace supports a range of construction materials, including concrete, wood, metal, plastic, glass, and other surplus supplies.</div></div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeadingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">How can I get started?</button></h2>
            <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#builderstreatFaq"><div class="accordion-body">Create a buyer or seller account, then browse materials or add your surplus listings.</div></div>
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
