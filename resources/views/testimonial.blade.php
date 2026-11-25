@extends('layouts.frontend')

@section('title', 'Testimonials — Builderstreat')

@section('content')
<section class="testimonial-section py-5">
    <div class="container">
        <div class="section-head text-center m-auto">
            <div class="w-100 mb-2">
                <div class="eyebrow text-center m-auto" style="width: fit-content;">HAPPY CLIENTS</div>
            </div>
            <h2>What Our Clients Says!</h2>
            <p>These are the things that clients who have our Feature say</p>
        </div>

        <div class="swiper testimonialSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <article class="testimonial-box text-center">
                        <img class="client-img" src="{{ asset('public/assets/frontend-remove/images/testi1.png') }}" alt="Sauqi Arief">
                        <div class="stars mt-4">
                            @for ($star = 0; $star < 5; $star++)
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                            @endfor
                        </div>
                        <p class="mt-4">“Were super friendly and happy to answer all my questions. I highly recommend them and will use their services for my future C&amp;D waste management requirements.”</p>
                        <h4>Sauqi Arief</h4>
                        <img src="{{ asset('public/assets/frontend-remove/images/rating.png') }}" alt="5 out of 5 stars">
                    </article>
                </div>

                <div class="swiper-slide">
                    <article class="testimonial-box text-center">
                        <img class="client-img" src="{{ asset('public/assets/frontend-remove/images/testi2.png') }}" alt="Emilia Tadashi">
                        <div class="stars mt-4">
                            @for ($star = 0; $star < 5; $star++)
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                            @endfor
                        </div>
                        <p class="mt-4">“Builderstreat has provided our business with tremendous support in the areas of C&amp;D waste management and optimization. They continue to work on adding value to the trading relationship.them in the future.”</p>
                        <h4>Emilia Tadashi</h4>
                        <img src="{{ asset('public/assets/frontend-remove/images/rating.png') }}" alt="5 out of 5 stars">
                    </article>
                </div>

                <div class="swiper-slide">
                    <article class="testimonial-box text-center">
                        <img class="client-img" src="{{ asset('public/assets/frontend-remove/images/testi3.png') }}" alt="Faiza Mubarak">
                        <div class="stars mt-4">
                            @for ($star = 0; $star < 5; $star++)
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                            @endfor
                        </div>
                        <p class="mt-4">“First-class customer service, covering a wide range of waste stream products, they are approachable and competitively priced. This company goes above and beyond the normal service levels to achieve the position of a partner we trust and rely on.”</p>
                        <h4>Faiza Mubarak</h4>
                        <img src="{{ asset('public/assets/frontend-remove/images/rating.png') }}" alt="5 out of 5 stars">
                    </article>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
@endsection
