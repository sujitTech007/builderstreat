@extends('layouts.frontend')

@section('title', 'Our Team — Builderstreat')

@section('content')
<section class="section wrap our-team">
    <div class="section-head">
        <div class="eyebrow">OUR TEAM</div>
        <h2>Best and quality team members</h2>
    </div>

    <div class="stories-grid">
        <article class="story-card">
            <div class="story-photo">
                <img src="{{ asset('public/assets/builderstreat-html/assets/images/javaid.jpg') }}" alt="Mr. Javaid Latif" class="img-fluid w-100 h-100">
            </div>
            <div class="story-body">
                <h3>Mr. Javaid Latif</h3>
                <div class="story-meta">Co-Founder &amp; CEO</div>
                <button type="button" class="btn btn-amber btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#teamMemberJavaid">Know More</button>
            </div>
        </article>

        <article class="story-card">
            <div class="story-photo">
                <img src="{{ asset('public/assets/builderstreat-html/assets/images/usman.jpg') }}" alt="Mr. Usman Rasheed Lone" class="img-fluid w-100 h-100">
            </div>
            <div class="story-body">
                <h3>Mr. Usman Rasheed Lone</h3>
                <div class="story-meta">Co-Founder &amp; COO</div>
                <button type="button" class="btn btn-amber btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#teamMemberUsman">Know More</button>
            </div>
        </article>

        <article class="story-card">
            <div class="story-photo">
                <img src="{{ asset('public/assets/builderstreat-html/assets/images/kasif.jpg') }}" alt="Mr. Kashif Faisal" class="img-fluid w-100 h-100">
            </div>
            <div class="story-body">
                <h3>Mr. Kashif Faisal</h3>
                <div class="story-meta">Co-Founder &amp; CFO</div>
                <button type="button" class="btn btn-amber btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#teamMemberKashif">Know More</button>
            </div>
        </article>
    </div>
</section>

<div class="modal fade" id="teamMemberJavaid" tabindex="-1" aria-labelledby="teamMemberJavaidTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="teamMemberJavaidTitle">About Me</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>30 years of entrepreneurial experience in construction and real estate development</li>
                    <li>Professionally trained as a civil engineer</li>
                    <li>Focused on overall company operations, executive networking for Business Development, and pursuing more sustainable practices for materials and processes at M/S DeeCon and BuildersTreat</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="teamMemberUsman" tabindex="-1" aria-labelledby="teamMemberUsmanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="teamMemberUsmanTitle">About Me</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>3 decades of experience in operations, sales, and retail banking across multiple companies and continents</li>
                    <li>Over 20 years in senior management roles, leading the national launch for multiple companies, managing operations and initial growth strategies</li>
                    <li>Bachelor of Business Admin from City University, NY</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="teamMemberKashif" tabindex="-1" aria-labelledby="teamMemberKashifTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="teamMemberKashifTitle">About Me</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Over 25 years experience in Financial Operations in the Construction and Banking industries.</li>
                    <li>Specializing in financial oversight and review, IT platform implementations, government/regulatory compliance, and staff management/training.</li>
                    <li>Certified Chartered Management Accountant, with a Bachelor and Master’s in Commerce.</li>
                    <li>Leading all financial management and IT dev team communications at BuildersTreat.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
