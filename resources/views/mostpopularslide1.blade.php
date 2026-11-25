@extends('layouts.frontend')

@section('title', 'Most Popular Materials — Builderstreat')

@section('content')
<section class="section wrap">
    <div class="section-head">
        <div class="eyebrow">OUR CATEGORIES</div>
        <h2>Most popular categories</h2>
    </div>

    <div class="swiper popularMaterialsSlider">
        <div class="swiper-wrapper">
            @foreach ([
                ['Maskgroup1.jpg', 'Bricks'],
                ['Maskgroup2.png', 'Metals'],
                ['Maskgroup3.png', 'Cement'],
                ['Maskgroup1.jpg', 'Bricks'],
                ['Maskgroup2.png', 'Metals'],
                ['Maskgroup3.png', 'Cement'],
                ['Maskgroup1.jpg', 'Bricks'],
                ['Maskgroup2.png', 'Metals'],
                ['Maskgroup3.png', 'Cement'],
            ] as [$image, $name])
                <article class="swiper-slide story-card">
                    <div class="story-photo">
                        <img src="{{ asset('public/assets/frontend-remove/assests/' . $image) }}" alt="{{ $name }}" class="img-fluid w-100 h-100">
                    </div>
                    <div class="story-body">
                        <h3>{{ $name }}</h3>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="swiper-button-prev popular-materials-prev"></div>
        <div class="swiper-button-next popular-materials-next"></div>
        <div class="swiper-pagination popular-materials-pagination"></div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.popularMaterialsSlider', {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: '.popular-materials-next',
                prevEl: '.popular-materials-prev'
            },
            pagination: {
                el: '.popular-materials-pagination',
                clickable: true
            },
            breakpoints: {
                576: { slidesPerView: 2, slidesPerGroup: 2 },
                992: { slidesPerView: 3, slidesPerGroup: 3 }
            }
        });
    });
</script>
@endpush
