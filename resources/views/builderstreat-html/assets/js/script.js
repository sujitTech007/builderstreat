    // Testimonial Slider
    new Swiper(".testimonialSlider", {
        slidesPerView: 1,
        loop: true,

        autoplay: {
            delay: 4000,
            disableOnInteraction: false
        },

        navigation: {
            nextEl: ".testimonialSlider .swiper-button-next",
            prevEl: ".testimonialSlider .swiper-button-prev"
        },

        pagination: {
            el: ".testimonialSlider .swiper-pagination",
            clickable: true
        }
    });

   
 // Building Material Slider
    new Swiper(".btSwiper", {

        slidesPerView: 4,
        spaceBetween: 24,

        loop: true,

        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },

        // navigation: {
        //     nextEl: ".btSwiper .bt-swiper-next",
        //     prevEl: ".btSwiper .bt-swiper-prev"
        // },

        pagination: {
            el: ".btSwiper .bt-swiper-pagination",
            clickable: true
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 15
            },

            576: {
                slidesPerView: 2,
                spaceBetween: 15
            },

            992: {
                slidesPerView: 3,
                spaceBetween: 20
            },

            1200: {
                slidesPerView: 4,
                spaceBetween: 24
            }
        }
    });



//     new Swiper(".storiesSwiper", {

//     slidesPerView: 3,
//     spaceBetween: 20,

//     loop: true,

//     autoplay: {
//         delay: 3000,
//         disableOnInteraction: false
//     },

   

//     pagination: {
//         el: ".stories-swiper-pagination",
//         clickable: true
//     },

//     breakpoints: {
//         0: {
//             slidesPerView: 1,
//             spaceBetween: 15
//         },

//         576: {
//             slidesPerView: 3,
//             spaceBetween: 15
//         },

//         992: {
//             slidesPerView: 5,
//             spaceBetween: 10
//         }
//     }

// });