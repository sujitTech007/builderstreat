@include('components.header') <div class="main-content">
    <style>
    .card1 .card-body1 {
        padding: 1rem 1rem;
        border: 1px solid #BEBEBE;
        margin-left: 30px;
    }

    .card-body1 {
        flex: 1 1 auto;
        padding: 1.25rem
    }

    p {
        font-size: 0.875rem;
        margin-bottom: .5rem;
        line-height: 1.5rem
    }

    h5.team-main-heading {
        color: green;
        font-size: 18px;
        font-weight: 600;
        /* display: flex
; */
        text-align: center;
    }

    h6.team-main-sub-heading {
        font-size: 25px;
        font-weight: 600;
        text-align: center;
    }

    .testi-rate {
        align-items: center;
        display: flex;
        flex-direction: row;
        gap: 40px;
    }

    h4 {
        line-height: .2 !important;
    }

    .profile1 {
        margin-top: 16px;
        margin-left: 11px;
        display: contents;
    }

    .profile-pic {
        width: 75px;
        transform: translate(36px, 25px);
    }

    .cust-name {
        font-family: 'Ubuntu';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 18px;
        /* Medium Dark */
        color: #646464;
    }

    .cust-profession {
        font-family: 'Ubuntu';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 18px;
        padding-top: 10px;
        /* Medium */
        color: #969696;
    }

    .items {
        width: 90%;
        margin: 0px auto;
        margin-top: 100px
    }

    .team {
        width: 30%;
        float: left;
        padding: 30px !important;
        border-radius: 20px !important;
        text-align: -webkit-center;
        background-color: #ffffff !important;
        margin: 40px 1.5% 50px !important;
    }

    .team h5 {
        padding-top: 20px;
    }

    .container {
        margin-top: 120px;
    }
    </style>


    <section class="our-team">
        <div class="container team-section">

            <div class="section-title text-left category ">
                <h5 class="team-main-heading">Our Team</h5>
                <h6 class="team-main-sub-heading"> Best and quality team members</h6>
            </div>


            <div class="team-member">
                <div class="team">
                    <img src="{{ asset('assets/frontend/images/javaid.jpg') }}" alt="Image" height="297"
                        class="rounded-4">
                    <h5 class=" team-name">Mr. Javaid Latif</h5>
                    <h6 class="team-rank">Co-Founder & CEO</h6>
                    <!-- <a class="button" href="#popup1">Know More</a> -->
                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">Know More</button>

                </div>
                <div class="team">
                    <img src="{{ asset('assets/frontend/images/usman.jpg') }}" alt="Image" height="297"
                        class="rounded-4">
                    <h5 class="team-name">Mr. Usman Rasheed Lone</h5>
                    <h6 class="team-rank">Co-Founder & COO</h6>
                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter1">Know More</button>

                </div>
                <div class="team">
                    <img src="{{ asset('assets/frontend/images/kasif.jpg') }}" alt="Image" height="297"
                        class="rounded-4">
                    <h5 class="team-name">Mr. Kashif Faisal</h5>
                    <h6 class="team-rank">Co-Founder & CFO</h6>

                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter2">Know More</button>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">About Me</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>30 years of entrepreneurial experience in construction and real estate development</li>
                        <li>Professionally trained as a civil engineer</li>
                        <li>Focused on overall company operations, executive networking for Business Development, and
                            pursuing more sustainable practices for materials and processes at M/S DeeCon and
                            BuildersTreat </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">About Me</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>3 decades of experience in operations, sales, and retail banking across multiple companies
                            and continents</li>
                        <li>Over 20 years in senior management roles, leading the national launch for multiple
                            companies, managing operations and initial growth strategies</li>
                        <li>Bachelor of Business Admin from City University, NY</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">About Me</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <ul>
                        <li>Over 25 years experience in Financial Operations in the Construction and Banking industries.
                        </li>
                        <li>Specializing in financial oversight and review, IT platform implementations,
                            government/regulatory compliance, and staff management/training.</li>
                        <li>Certified Chartered Management Accountant, with a Bachelor and Master’s in Commerce.</li>
                        <li>Leading all financial management and IT dev team communications at BuildersTreat. </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

</div> @include('components.footer')
<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/swiper.min.js') }}"></script>
<script src="{{ url('js/fancybox.min.js') }}"></script>
<script src="{{ url('js/odometer.min.js') }}"></script>
<script src="{{ url('js/isotope.min.js') }}"></script>
<script src="{{ url('js/scripts.js') }}"></script>
<script src="{{ url('js/buyer.js') }}"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Argon JS -->
<!-- <script src="https://builderstreat.ca/js/argon.js?v=1.0.0"></script> -->
<script>
$(document).ready(function() {

    $('.my-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
    });

});
</script>
<script>
$(document).ready(function() {
    $('.items').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 3,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
});
</script>
</body>

</html>