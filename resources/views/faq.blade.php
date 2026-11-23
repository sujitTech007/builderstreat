@include('components.header')

        
    <div class="main-content">

        
<style type="text/css">
  #main {
  margin: 50px 0;
}

#main #faq .card {
  margin-bottom: 30px;
  border: 0;
}
    
    .faq h1{
        font-family: 'Ubuntu';
font-style: normal;
font-weight: 700;
font-size: 36px;
line-height: 39px;
/* or 108% */

font-feature-settings: 'pnum' on, 'lnum' on;

color: #1B3138;
padding-top: 6%;
    }

#main #faq .card .card-header {
  border: 0;
  -webkit-box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
          box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
  border-radius: 2px;
  padding: 0;
}

#main #faq .card .card-header .btn-header-link {
  color: #fff;
  display: block;
  text-align: left;
/*  background: #FFE472;*/
  color: #222;
  padding: 20px;
}

#main #faq .card .card-header .btn-header-link:after {
  content: "\f107";
  font-family: 'Font Awesome 5 Free';
  font-weight: 900;
  float: right;
}

#main #faq .card .card-header .btn-header-link.collapsed {
  background: #A541BB;
  color: #fff;
}

#main #faq .card .card-header .btn-header-link.collapsed:after {
  content: "\f106";
}

#main #faq .card .collapsing {
/*  background: #FFE472;*/
  line-height: 30px;
}

#main #faq .card .collapse {
  border: 0;
}

#main #faq .card .collapse.show {
/*  background: #FFE472;*/
  line-height: 30px;
  color: #222;
}
.accordion .card .card-header a {
    width: 100%;
    float: left;
   height: 104px;
    display: flex;
    align-items: center;
    padding: 23px 20px;
   gap: 91px;
    font-family: 'Montserrat';
font-style: normal;
font-weight: 700;
font-size: 16px;
line-height: 22px;
/* identical to box height, or 138% */

font-feature-settings: 'pnum' on, 'lnum' on;

/* Text/Title Text */

color: #333333;

    border-bottom: 4px solid #eaebee;
   
    background: white;
    
}
.btn{text-align: left;}
</style>
<section class="content-section pt-3">
   <div class="container pt-5">
      <div class="row">
         <div class="col-lg-2">&nbsp;</div>
         <div class="col-lg-8">
            <div class="section-title text-left faq" style="text-align:center !Important;">
               <h1>Frequently Asked Questions</h1>
            </div>
            <div class="accordion" id="faq">
               <div class="card">
                  <div class="card-header" id="faqhead1">
                     <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                        aria-expanded="true" aria-controls="faq1">1. What is Construction and Demolition Waste? <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                  </div>
                  <div id="faq1" class="collapse " aria-labelledby="faqhead1" data-parent="#faq">
                     <div class="card-body">
                        Construction and demolition (C&D) waste is generated from construction, renovation, repair, and demolition of houses, large building structures, roads, bridges, piers, and dams. C&D waste is made up of wood, steel, concrete, gypsum, masonry, plaster, metal, and asphalt. C&D waste is notable because it can contain hazardous materials such as asbestos and lead. Estimates vary, but a commonly accepted estimate is that between 15% and 20% of municipal solid waste comes from construction and demolition projects.
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header" id="faqhead2">
                     <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                        aria-expanded="true" aria-controls="faq2">2. What are type of waste, legal classification and examples ?<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                  </div>
                  <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                     <div class="card-body">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th width="25%">Type of Waste </th>
                                 <th width="35%">Legal Classification<br> In Connecticut</th>
                                 <th width="40%">Examples </th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Landclearing debris</td>
                                 <td>Bulky waste</td>
                                 <td>Tree stumps, tree tops </td>
                              </tr>
                              <tr>
                                 <td>Demolition waste (from buildings) </td>
                                 <td>Bulky waste</td>
                                 <td>Concrete, wood, brick, plaster, roofing materials, wallboard, metals, carpeting, insulation</td>
                              </tr>
                              <tr>
                                 <td>Construction waste (from buildings)</td>
                                 <td>Municipal solid waste</td>
                                 <td>Pallets, wood scraps, wallboard, siding and roofing scraps, packaging, carpeting. Foam padding, insulation</td>
                              </tr>
                              <tr>
                                 <td>Highway construction and demolition waste</td>
                                 <td>Bulky waste, municipal solid waste</td>
                                 <td>Asphalt, concrete, steel, related construction and demolition wastes, utility poles, railroad ties, brick, block, rock</td>
                              </tr>
                              <tr>
                                 <td>Oversized MSW</td>
                                 <td>Municipal Solid Waste</td>
                                 <td>Furniture, furnishings, carpeting, rugs</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header" id="faqhead3">
                     <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                        aria-expanded="true" aria-controls="faq3">3. Why Recycle C&D waste?<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                  </div>
                  <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                     <div class="card-body">
                        Recycling construction and demolition (C&D) waste is beneficial for the environment and the construction industry. It conserves natural resources, reduces waste sent to landfills, and saves energy and carbon emissions. By recycling C&D waste, we can minimize the need for new raw materials, alleviate strain on landfill capacity, and contribute to mitigating climate change. Moreover, recycling can lead to cost savings, job creation, and improved environmental image for businesses. Overall, recycling C&D waste promotes sustainability, reduces environmental impact, and contributes to a more circular and efficient construction industry.
                     </div>
                  </div>
               </div>
               <!--<div class="card">
                  <div class="card-header" id="faqhead4">
                      <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4"
                      aria-expanded="true" aria-controls="faq4">3. Why Recycle ?<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                  </div>
                  
                  <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                      <div class="card-body">
                      Recycling is the process of creating new products from used materials. When a product has reached the end of its useful life, it can be remanufactured into the same type or different type of product. Glass bottles can become bottles or jars; plastic jugs can become carpet or clothing; steel from an empty soup can might once have been part of a car; our roadways might have glass or asphalt roofing shingles in the pavement.
                      <br></br>
                      Recycling is an important part of managing solid waste to help reduce the use of raw materials, reduce air and water pollution, reduce energy consumption and lower greenhouse gas emissions which contribute to climate change.
                  
                      </div>
                  </div>
                  </div>
                  <div class="card">
                  <div class="card-header" id="faqhead5">
                      <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq5"
                      aria-expanded="true" aria-controls="faq5">5. Loreum Ipsum is simply text of the printing and type setting industry?<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                  </div>
                  
                  <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">
                      <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                          moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                          Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                          shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                          proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                          aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                  </div>
                  </div> -->
            </div>
         </div>
         <div class="col-lg-2">&nbsp;</div>
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end footer-bar -->
    </div>

        <footer class="#">
    <div class="container">
        <!-- <div class="row align-items-center justify-content-xl-between">
    <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
            &copy; 2025 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp;
            <a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
        </div>
    </div>
    <div class="col-xl-6">
        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
                <a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
            </li>
            <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
        </ul>
    </div>
</div> -->    </div>
</footer>    
    <div>
         <div class='footer-main'>
            <div class="foot-content">
                <div class="foot-text-btn">
                    <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="logo" class="fotter-logo">
                                                                      <p class= "footer-p">At Builderstreat, our mission is to revolutionize the construction and demolition waste recycling industry by providing a seamless and sustainable solution for material exchange.</p>

                </div>




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
    

        <!-- jQuery (load only once) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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