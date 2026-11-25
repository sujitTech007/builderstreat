@extends('layouts.frontend')

@section('title', 'What We Do — Builderstreat')

@section('content')
<section class="section position-relative">
    <img src="{{ asset('public/assets/builderstreat-html/assets/images/what-we-do-bg.png') }}" alt="" class="bg-img position-absolute w-100 h-100" style="object-fit:cover; top:0; left:0; z-index:-1;">
    <div class="container">
        <div class="row">
            <div class="about-grid pe-0 pe-md-5">
                <div>
                    <div class="eyebrow">WHAT WE DO</div>
                    <h2 class="mb-3">We Help You to Build Something For Future</h2>
                    <p>Our Digital Marketplace helps small construction sites or contractors by enabling them to use recycled or surplus resource of large construction site.</p>
                    <p>Big construction companies will be able to reduce their ecological impact and overall product waste.</p>
                    <p>The platform will allow customized search of resources and ability to generate request for the same as per requirements.</p>
                </div>
                <div>
                    <img src="{{ asset('public/assets/frontend-remove/assests/man.png') }}" alt="Construction professionals using the Builderstreat marketplace" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
