@include('components.header')
        
    <div class="main-content">

        
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
   .testi-rate{
   align-items: center;
   display: flex;
   flex-direction: row;
   gap: 40px;
   }
   h4{
   line-height: .2 !important;
   }
   .profile1{
   margin-top: 16px;
   margin-left: 11px;
   display: contents;
   }
   .profile-pic {
   width: 75px;
   transform: translate(36px,25px);
   }
   .cust-name{
   font-family: 'Ubuntu';
   font-style: normal;
   font-weight: 700;
   font-size: 16px;
   line-height: 18px;
   /* Medium Dark */
   color: #646464;
   }
   .cust-profession{
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
   .testi{
    margin-top: 130px !important;
   }
</style>







<section class="testimonial">
   <div class="container">
      <div class="row testi text-center">
         <h3>Happy Clients</h3>
         <h1>What Our Clients Says!</h1>
         <p>These are the things that clients who have our<br> Feature say</p>
      </div>
      <div class="items">
         <div class="card1">
            <div class="col-sm-12">
               <img class="profile-pic" src="{{ asset('assets/frontend/images/testi1.png') }}">
            </div>
            <div class="card-body1"  style="height: 275px;">
               <h4 class="card-title1"></h4>
               <div class="template-demo">
                  <p>“Were super friendly and happy to answer all my questions. I highly recommend them and will use their services for my future C&D waste management requirements.”</p>
               </div>
               <hr>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="profile1">
                        <h4 class="cust-name">Sauqi Arief</h4>
                        <div class="testi-rate">
                           <!-- <p class="cust-profession">CEO Of Mabar </p> -->
                           <img class="" src="{{ asset('assets/frontend/images/rating.png') }}">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card1">
            <div class="col-sm-12">
               <img class="profile-pic" src="{{ asset('assets/frontend/images/testi2.png') }}">
            </div>
            <div class="card-body1"  style="height: 275px;">
               <h4 class="card-title1"></h4>
               <div class="template-demo">
                  <!-- <p>“Best service highly recommend. Best service highly recommend. I will use this service in future as well.”</p> -->
                  <p>“Builderstreat has provided our business with tremendous support in the areas of C&D waste management and optimization. They continue to work on adding value to the trading relationship.them in the future.”</p>

               </div>
               <hr>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="profile1">
                        <h4 class="cust-name">Emilia Tadashi</h4>
                     </div>
                     <div class="testi-rate">
                        <!-- <p class="cust-profession">Housewife</p> -->
                        <img class="" src="{{ asset('assets/frontend/images/rating.png') }}">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card1" >
            <div class="col-sm-12">
               <img class="profile-pic" src="{{ asset('assets/frontend/images/testi3.png') }}">
            </div>
            <div class="card-body1" style="height: 275px;">
               <h4 class="card-title1"></h4>
               <div class="template-demo">
                  <!-- <p>“The employee was very helpful in fulfilling my requirement .best service till date.”</p> -->
                  <p>“First-class customer service, covering a wide range of waste stream products, they are approachable and competitively priced. This company goes above and beyond the normal service levels to achieve the position of a partner we trust and rely on.”</p>

               </div>
               <hr>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="profile1">
                        <h4 class="cust-name">Faiza Mubarak</h4>
                     </div>
                     <div class="testi-rate">
                        <!-- <p class="cust-profession">Succes Man</p> -->
                        <img class="" src="{{ asset('assets/frontend/images/rating.png') }}">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script>
   $(document).ready(function(){

       $('.items').slick({
     dots: true,
     infinite: true,
     speed: 800,
    autoplay: true,
    autoplaySpeed: 2000,
     slidesToShow: 4,
     slidesToScroll: 4,
     responsive: [
       {
         breakpoint: 1024,
         settings: {
           slidesToShow: 3,
           slidesToScroll: 3,
           infinite: true,
           dots: true
         }
       },
       {
         breakpoint: 600,
         settings: {
           slidesToShow: 2,
           slidesToScroll: 2
         }
       },
       {
         breakpoint: 480,
         settings: {
           slidesToShow: 1,
           slidesToScroll: 1
         }
       }

     ]
   });
             });


</script>
    </div>

@include('components.footer')
    <div>
         <div class='footer-main'>
            <div class="foot-content">
                <div class="foot-text-btn">
                    <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="logo" class="fotter-logo">

                </div>                                                                      <p class= "footer-p">At Builderstreat, our mission is to revolutionize the construction and demolition waste recycling industry by providing a seamless and sustainable solution for material exchange.</p>





                <div class='flinks'>
                    <span class="link-heading">Links</span>

                    <a href="index.html" class='linkf'> Home</a>


                    <a href="index.html.#aboutt" class="linkf"> About Us</a>

                    <a href="index.html.#hjfhj" class="linkf" >What We Do</a>


                    <a  href="index.html.#ourcatt" class="linkf" >Our Categories</a>


                     <a href="index.html#servee" class='linkf'>Our Services</a>

                </div>
                <div class='flinks'>

                    <span class="link-heading">Links</span>

                    <a href="index.html.#knowdet" class='linkf'> Knowledge Center</a>
                    <a href="index.html#pricemainnnn" class='linkf'> Pricing </a>
                    <a href="index.html.#teams" class='linkf'> Our Team</a>
                    <a href="index.html.#testmainnne" class='linkf'> Testimonial</a>
                    <a href="index.html.#faq" class='linkf'> FAQs</a>

                </div>

                <!-- <div class='flinks'>
                    <span class="link-heading">Lets Connect</span>

                    <div class='social '>
                        <a href="#" class='linkf'>
                            <image src="https://builderstreat.ca/asset/frontend/images/Facebook.png"></image>
                        </a>
                        <a href="#" class='linkf'>
                            <image src="https://builderstreat.ca/asset/frontend/images/Instagram.png"></image>
                        </a>
                        <a href="#" class='linkf'>
                            <image src="https://builderstreat.ca/asset/frontend/images/Twitter.png"></image>
                        </a>
                        <a href="#" class='linkf'>
                            <image src="https://builderstreat.ca/asset/frontend/images/Youtube.png"></image>
                        </a>
                    </div>




                </div> -->
            </div>
            <div class="copyrights">
                <div class="copy-content">
                    <span class="copy-text">© {{ date('Y') }} Builderstreat All rights reserved.</span>

                    <!-- <div class="copy-link">
                        <a href="#" class='clink'> privacy</a>
                        <a href="#" class='clink'> security </a>
                        <a href="#" class='clink'> Terms</a>

                    </div> -->

                </div>

            </div>
        </div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/fancybox.min.js"></script>
    <script src="js/odometer.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/buyer.js"></script>
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
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    });
    </script>



</body>

</html>