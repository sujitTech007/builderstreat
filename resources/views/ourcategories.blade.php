@extends('layouts.frontend')

@section('title', 'Our Categories | Builderstreat')

@section('content')
<section class="section categories-wrap">
    <div class="wrap">
        <div class="section-head">
            <div class="eyebrow">OUR CATEGORIES</div>
            <h2>Most popular categories</h2>
        </div>
        <div class="stories-grid">
            @php
                $categories = [
                    ['name' => 'Cement & Concrete', 'image' => 'cement-bag.png', 'description' => 'High-quality cement and concrete materials for strong, durable construction projects.'],
                    ['name' => 'Bricks & Blocks', 'image' => 'brick-block.png', 'description' => 'Durable bricks and blocks for strong, reliable, long-lasting building projects.'],
                    ['name' => 'Tiles & Flooring', 'image' => 'tiles-thumb.png', 'description' => 'Surplus ceramic, porcelain, vinyl and hardwood flooring at a fraction of retail.'],
                    ['name' => 'Pipes & Plumbing', 'image' => 'thumb-3.png', 'description' => 'PVC, PEX and copper pipes, fittings and valves ready for reuse.'],
                    ['name' => 'Lumber & Wood', 'image' => 'wood.png', 'description' => 'Framing lumber, plywood, boards and timber without paying new-stock prices.'],
                    ['name' => 'Doors & Windows', 'image' => 'door.png', 'description' => 'Quality doors and windows available from surplus construction projects.'],
                    ['name' => 'Electrical & Lighting', 'image' => 'electrical-items.png', 'description' => 'Electrical supplies and lighting for your next construction project.'],
                    ['name' => 'Kitchen & Bath', 'image' => 'bath-images.png', 'description' => 'Reusable fixtures and finishes for kitchen and bathroom projects.'],
                ];
            @endphp
            @foreach($categories as $category)
                <article class="story-card position-relative border-0">
                    <div class="story-photo">
                        <img src="{{ asset('public/assets/builderstreat-html/assets/images/' . $category['image']) }}" alt="{{ $category['name'] }}" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy">
                    </div>
                    <div class="story-body position-absolute bottom-0 start-0 w-100 p-3">
                        <h3 class="text-white fs-5">{{ $category['name'] }}</h3>
                        <p class="text-white">{{ $category['description'] }}</p>
                        <a href="{{ route('listing') }}" class="btn btn-amber btn-sm">View more</a>
                    </div>
                </article>
            @endforeach
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
