@extends('layouts.frontend')

@section('title', 'About Builderstreat')

@section('content')
<section class="section wrap">
    <div class="about-grid">
        <img src="{{ asset('public/assets/images/thumb-1.jpeg') }}" alt="Construction materials ready for reuse">
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
        <img src="{{ asset('public/assets/images/thumb-2.jpeg') }}" alt="Reclaimed construction materials">
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
    <img src="{{ asset('public/assets/images/what-we-do-bg.png') }}" alt="" class="bg-img position-absolute w-100 h-100" style="object-fit:cover; top:0; left:0; z-index:-1;">
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





<section class="leadership-section py-5">

    <div class="container">

        <div class="row align-items-center justify-content-between mb-5">

            <div class="col-lg-9">

                <div class="section-head mb-0">

                    <div class="eyebrow">OUR TEAM</div>

                    <h2>Experienced leadership. <span>Built with purpose.</span></h2>

                    <p class="mb-0">Our leadership team brings industry experience and a shared vision to create a more

                        accessible, efficient and sustainable marketplace for surplus construction materials.</p>

                </div>

            </div>

            <div class="col-lg-3 d-none d-lg-block">

                <div class="leadership-side-note">

                    <span>PEOPLE</span>

                    <span>EXPERIENCE</span>

                    <span>A STRONGER</span>

                    <span>BUILDERSTREAT</span>

                </div>

            </div>

        </div>



        <div class="row leadership-grid">

            <div class="col-lg-4">

                <article class="leadership-member">

                    <div class="leadership-member-top">

                        <div class="leadership-number">01</div>

                        <div class="leadership-icon"><i class="fa-solid fa-compass"></i></div>

                    </div>

                    <div class="leadership-person">

                        <h3>Mr. Javaid Latif</h3>

                        <p class="leadership-role">Co-Founder &amp; CEO</p>

                    </div>

                    <div class="leadership-line"></div>

                    <h4>Strategic Leadership</h4>

                    <p class="leadership-description">Driving the company's overall vision and direction towards a more

                        sustainable construction industry.</p>

                </article>

            </div>



            <div class="col-lg-4">

                <article class="leadership-member">

                    <div class="leadership-member-top">

                        <div class="leadership-number">02</div>

                        <div class="leadership-icon"><i class="fa-solid fa-gears"></i></div>

                    </div>

                    <div class="leadership-person">

                        <h3>Mr. Usman Rasheed Lone</h3>

                        <p class="leadership-role">Co-Founder &amp; COO</p>

                    </div>

                    <div class="leadership-line"></div>

                    <h4>Operations &amp; Execution</h4>

                    <p class="leadership-description">Overseeing day-to-day operations and ensuring a seamless experience for

                        buyers and sellers on our platform.</p>

                </article>

            </div>



            <div class="col-lg-4">

                <article class="leadership-member">

                    <div class="leadership-member-top">

                        <div class="leadership-number">03</div>

                        <div class="leadership-icon"><i class="fa-solid fa-chart-line"></i></div>

                    </div>

                    <div class="leadership-person">

                        <h3>Mr. Kashif Faisal</h3>

                        <p class="leadership-role">Co-Founder &amp; CFO</p>

                    </div>

                    <div class="leadership-line"></div>

                    <h4>Financial &amp; Business Leadership</h4>

                    <p class="leadership-description">Managing financial strategy and business growth to create long-term value

                        for our users and partners.</p>

                </article>

            </div>

        </div>



        <div class="leadership-statement mt-5">

            <div class="row align-items-center">

                <div class="col-auto">

                    <div class="leadership-statement-icon"><i class="fa-solid fa-seedling"></i></div>

                </div>

                <div class="col-auto d-none d-md-block">

                    <div class="leadership-statement-divider"></div>

                </div>

                <div class="col">

                    <p class="leadership-statement-text mb-0">A leadership team committed to building a more accessible and

                        efficient way to buy and sell <span>surplus construction materials.</span></p>

                </div>

            </div>

        </div>

    </div>

</section>

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