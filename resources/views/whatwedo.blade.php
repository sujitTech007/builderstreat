@include('components.header')
<div class="main-content">
    <style>
    .missionsecondcontainer {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 85%;
        margin-bottom: 100px;
        margin-top: 30px;
    }
    </style>
    <section class="content-section pt-4">
        <div class="missionsecondcontainer" id="hjfhj">
            <div class="missionsecondleftbox">
                <div>
                    <img class="missinimagess" src="{{ asset('assets/frontend/assests/man.png') }}" alt="">
                </div>
            </div>
            <div class="missionsecondrightbox">
                <p class="firstline"> what we do</p>
                <p class="headingofmission">We Help You to Build Something For Future</p>
                <p class="detailsofmission"> Our Digital Marketplace helps small construction sites or contractors by
                    enabling them to use recycled or surplus resource of large construction site. <br />
                    <br /> Big construction companies will be able to reduce their ecological impact and overall product
                    waste. <br />
                    <br /> The platform will allow customized search of resources and ability to generate request for
                    the same as per requirements.
                </p>
            </div>
        </div>
    </section>
</div>
@include('components.footer')

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
    //      $('.center-slider').slick({
    //        slidesToShow: 3,
    //        slidesToScroll: 1,
    //        centerMode: true,
    //        arrows: true,
    //        dots: false,
    //        speed: 300,
    ////        centerPadding: '20px',
    //        infinite: true,
    //        autoplaySpeed: 5000,
    //        autoplay: true
    //      });
    $('.my-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
    });
    //
    //            $('.center-slider').slick({
    //    dots: true,
    //    infinite: true,
    //    speed: 300,
    //    slidesToShow: 3,
    //    centerMode: true,
    //
    // });
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