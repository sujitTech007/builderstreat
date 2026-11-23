@extends('layouts.frontend')

@section('title', 'About Builderstreat')

@section('content')
<section class="section wrap">
    <div class="about-grid">
        <img src="{{ asset('assets/builderstreat-html/assets/images/thumb-1.jpeg') }}" alt="Construction materials ready for reuse">
        <div>
            <div class="eyebrow">ABOUT BUILDERSTREAT</div>
            <h2>Driving the Future of Circular Construction</h2>
            <p>Builderstreat is pioneering circular-economy solutions for a sustainable future. We’re reimagining construction and waste recycling through sustainability and innovation, transforming today’s by-products into tomorrow’s resources.</p>
            <p>Our marketplace connects businesses and individuals so surplus construction materials can be reused instead of sent to landfill.</p>
        </div>
    </div>
</section>

<section class="section wrap">
    <div class="about-grid">
        <div>
            <div class="eyebrow">MISSION STATEMENT</div>
            <h2>Builderstreat Mission</h2>
            <p>Our mission is to revolutionize construction and demolition waste recycling by delivering seamless, sustainable solutions for material exchange. We are committed to building a circular economy where overabundant materials are repurposed, waste is minimized, and environmental impact is reduced.</p>
            <p>By leveraging our platform, we empower businesses and individuals to collaborate and contribute to a greener future.</p>
        </div>
        <img src="{{ asset('assets/builderstreat-html/assets/images/thumb-2.jpeg') }}" alt="Reclaimed construction materials">
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

<section class="section position-relative">
    <img src="{{ asset('assets/builderstreat-html/assets/images/what-we-do-bg.png') }}" alt="" class="bg-img position-absolute w-100 h-100" style="object-fit:cover; top:0; left:0; z-index:-1;">
    <div class="wrap">
        <div class="about-grid">
            <div>
                <div class="eyebrow">WHAT WE DO</div>
                <h2 class="mb-3">We Help You to Build Something For Future</h2>
                <p>Our digital marketplace helps contractors and construction sites find and exchange reusable surplus materials.</p>
                <p>Businesses can reduce their ecological impact and material waste while finding the supplies their projects need.</p>
                <a href="{{ route('listing') }}" class="btn btn-amber">Browse Materials</a>
            </div>
            <div></div>
        </div>
    </div>
</section>

<section class="section wrap">
    <div class="section-head">
        <div class="eyebrow">OUR TEAM</div>
        <h2>Experienced leadership. <span>Built with purpose.</span></h2>
        <p>Our leadership team brings industry experience and a shared vision to create a more accessible, efficient, and sustainable marketplace for surplus construction materials.</p>
    </div>
    <div class="stories-grid">
        <article class="story-card">
            <div class="story-photo"><img src="{{ asset('assets/builderstreat-html/assets/images/javaid.jpg') }}" alt="Mr. Javaid Latif"></div>
            <div class="story-body"><h3>Mr. Javaid Latif</h3><div class="story-meta">Co-Founder &amp; CEO</div></div>
        </article>
        <article class="story-card">
            <div class="story-photo"><img src="{{ asset('assets/builderstreat-html/assets/images/usman.jpg') }}" alt="Mr. Usman Rasheed Lone"></div>
            <div class="story-body"><h3>Mr. Usman Rasheed Lone</h3><div class="story-meta">Co-Founder &amp; COO</div></div>
        </article>
        <article class="story-card">
            <div class="story-photo"><img src="{{ asset('assets/builderstreat-html/assets/images/kasif.jpg') }}" alt="Mr. Kashif Faisal"></div>
            <div class="story-body"><h3>Mr. Kashif Faisal</h3><div class="story-meta">Co-Founder &amp; CFO</div></div>
        </article>
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
