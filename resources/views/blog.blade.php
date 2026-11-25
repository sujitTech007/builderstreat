@extends('layouts.frontend')

@section('title', 'Knowledge Center — Builderstreat')

@section('content')
<section class="section wrap">
    <div class="section-head">
        <div class="eyebrow">KNOWLEDGE CENTER</div>
        <h2>Knowledge center about our various C&amp;D waste projects</h2>
    </div>

    <div class="know-grid">
        <article class="know-card">
            <img src="{{ asset('public/assets/frontend-remove/images/4.png') }}" alt="" class="img-fluid rounded mb-3">
            <div class="eyebrow">RESEARCH</div>
            <h4>White Papers</h4>
            <p>In-depth research papers highlighting the environmental impact of C&amp;D waste and the benefits of recycling and re-using such materials.</p>
        </article>
        <article class="know-card">
            <img src="{{ asset('public/assets/frontend-remove/images/5.png') }}" alt="" class="img-fluid rounded mb-3">
            <div class="eyebrow">LATEST INSIGHTS</div>
            <h4>Blog Posts</h4>
            <p>Updated blog posts discussing various topics related to C&amp;D waste management, recycling techniques, innovative uses of recycled materials in construction, and success stories of businesses implementing sustainable practices.</p>
        </article>
        <article class="know-card">
            <img src="{{ asset('public/assets/frontend-remove/images/7.png') }}" alt="" class="img-fluid rounded mb-3">
            <div class="eyebrow">LEARN WITH US</div>
            <h4>Information Workshops</h4>
            <p>Workshops or webinars to provide interactive learning experiences for users. Sessions will cover topics such as C&amp;D waste segregation, recycling technologies, regulatory guidelines, and sustainable construction practices.</p>
        </article>
        <article class="know-card">
            <img src="{{ asset('public/assets/frontend-remove/images/8.jpg') }}" alt="" class="img-fluid rounded mb-3">
            <div class="eyebrow">COMMUNITY</div>
            <h4>User Testimonials</h4>
            <p>Testimonials from businesses and individuals who have successfully incorporated C&amp;D waste recycling and re-use into their construction projects.</p>
        </article>
    </div>
</section>
@endsection
