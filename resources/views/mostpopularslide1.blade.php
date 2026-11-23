@include('components.header')
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from builderstreat.ca/mostpopularslide1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Oct 2024 10:10:36 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slideshow</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet">
    <style>
    .slideshow-container {
        position: relative;
        width: 70%;
        margin: auto;
        overflow: hidden;
        margin-top: 50px;
    }

    /* .slideshow-container img {
        width: calc(80% / 3);

        display: none;
        float: left;
        padding-left: 5%;
    } */

    .prev,
    .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 48px;
        height: 48px;
        /* background: #FFFFFF;
    box-shadow: 0px 0px 14px 4px rgba(0, 0, 0, 0.04); */
        transform: matrix(-1, 0, 0, 1, 0, 0);
        border-radius: 50%;
        z-index: 2;
        /* Adjusted z-index */
        display: none;
    }

    /* .prev {
    left: -12px;
}

.next {
    right: -10px;
} */



    .dot-container {
        text-align: center;
        margin-top: 20px;
        display: none;
    }

    .dot {
        height: 3px;
        width: 40px;
        background-color: #bbb;
        display: inline-block;
        margin: 0 5px;
        transition: background-color 0.3s ease;
    }

    .active {
        background-color: #000;
    }
    </style>
</head>

<body>

    <div class="slideshow-container">
        <div>
            <img class="mySlides" src="{{ asset('assets/frontend/images/Maskgroup1.jpg') }}">
            <p class="textonslide">Bricks</p>
        </div>

        <div>
            <img class="mySlides" src="{{ asset('assets/frontend/images/Maskgroup2.png') }}">
            <p class="textonslide2">Metals</p>
        </div>
        <div>
            <img class="mySlides" src="{{ asset('assets/frontend/images/Maskgroup3.png') }}">
            <p class="textonslide3">Cement</p>
        </div>

        <img class="mySlides" src="{{ asset('assets/frontend/images/Maskgroup1.jpg') }}">
        <img class="mySlides" src="{{ asset('assets/frontend/images/Maskgroup2.png') }}">
        <img class="mySlides" src="{{ asset('assets/frontend/images/Maskgroup3.png') }}">
        <img class="mySlides" src="{{ asset('assets/frontend/images/Maskgroup1.jpg') }}">
        <img class="mySlides" src="{{ asset('assets/frontend/images/Maskgroup2.png') }}">
        <img class="mySlides" src="{{ asset('assets/frontend/images/Maskgroup3.png') }}">
        <a class="next" onclick="plusSlides(1)">&#10094;</a>
        <a class="prev" onclick="plusSlides(-1)">&#10095;</a>


    </div>

    <div class="dot-container">
        <!-- Adjusted for dynamic generation -->
    </div>

    <script>
    var slideIndex = 1;
    var slides = document.getElementsByClassName("mySlides");
    var totalSlides = slides.length;
    var dotsContainer = document.querySelector(".dot-container");

    // Generate dots dynamically
    for (var i = 0; i < Math.ceil(totalSlides / 3); i++) {
        var dot = document.createElement("span");
        dot.className = "dot";
        dot.onclick = function() {
            currentSlide(this.dataset.slideIndex);
        };
        dot.dataset.slideIndex = i + 1;
        dotsContainer.appendChild(dot);
    }

    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        if (n > Math.ceil(totalSlides / 3)) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = Math.ceil(totalSlides / 3)
        }
        for (i = 0; i < totalSlides; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dotsContainer.children.length; i++) {
            dotsContainer.children[i].className = dotsContainer.children[i].className.replace(" active", "");
        }
        var startIndex = (slideIndex - 1) * 3; // Calculate starting index of images to be shown
        var endIndex = Math.min(startIndex + 3, totalSlides);
        for (i = startIndex; i < endIndex; i++) {
            slides[i].style.display = "block";
        }
        dotsContainer.children[slideIndex - 1].className += " active";
    }
    </script>

</body>

<!-- Mirrored from builderstreat.ca/mostpopularslide1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Oct 2024 10:10:38 GMT -->

</html>
@include('components.footer')