<div class='footer-main'>

    <div class="foot-content">
        <div class="footer-grid">
            <div class="footer-col brand">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="logo" class="fotter-logo">
                <p class="footer-p">At Builderstreat, our mission is to revolutionize the construction and demolition
                    waste recycling industry by providing a seamless and sustainable solution for material exchange. We
                    aim to connect stakeholders, minimize waste, and promote eco-friendly practices that build a
                    greener future for all.</p>
                <!-- <button id="join-us-btn" class="foot-btn" type="button">Join Us</button> -->
            </div>

            <div class="footer-col">
                <span class="link-heading">Useful Links</span>
                <div class="link-col">
                    <!--<a class="linkf" href="{{ route('home') }}">Home</a>-->
                    <a class="linkf" href="{{ route('about') }}">About Us</a>
                    <a class="linkf" href="{{ route('ourcategories') }}">Our Categories</a>
                    <a class="linkf" href="{{ url('listing') }}">Listing</a>
                    <a class="linkf" href="{{ route('team') }}">Our Team</a>
                    <a class="linkf" href="{{ route('contact') }}">Contact Us</a>
                </div>
            </div>

            <div class="footer-col">
                <span class="link-heading">Resources</span>
                <div class="link-col">
                    <a class="linkf" href="{{ url('/') }}#knowdet">Knowledge Center</a>
                    <a class="linkf" href="{{ route('whatwedo') }}">What We Do</a>

                    <a class="linkf" href="{{ route('pricing') }}">Pricing</a>
                    <!-- <a class="linkf" href="{{ url('/') }}#testmainnne">Testimonials</a> -->
                    <a class="linkf" href="{{ url('/') }}#faq">FAQs</a>
                </div>
            </div>

            <div class="footer-col">
                <span class="link-heading">Contact</span>
                <div class="link-col">
                    <a class="linkf" href="mailto:info@builderstreat.ca">info@builderstreat.ca</a>
                    <a class="linkf" href="tel:+1">+1 (234) 567-8900</a>
                    <div class="social-icons">
                        <a class="social-link" href="https://www.facebook.com/builderstreatsolutions/" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a class="social-link" href="https://www.instagram.com/builderstreatsolutions/" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a class="social-link" href="https://www.linkedin.com/company/builderstreat-solutions-inc/" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <!--<a class="social-link" href="javascript:avoid();" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
 <div class="copyrights" style="display: flex; justify-content: center; align-items: center; position: relative;">
    <!-- Centered copyright -->
    <div class="copy-content">
        <span class="copy-text">© {{ date('Y') }} Builderstreat All rights reserved.</span>
    </div>

    <!-- Right side links -->
    <div class="footer-links" style="position: absolute; right: 130px; text-decoration:none; font-size:14px;">
        <a href="{{ route('privacy.policy') }}" style="margin-right: 50px; text-decoration:none; color:white;">Privacy Policy</a>
        <a href="{{ route('terms.condition') }}" style="text-decoration:none; color:white;">Terms & Conditions</a>
    </div>
</div>
</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const dropbtn = document.querySelector(".dropbtn");
    const dropdownContent = document.querySelector(".dropdown-content");
    dropbtn.addEventListener("click", function(event) {
        event.preventDefault();
        dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" :
            "block";
    });
    window.addEventListener("click", function(event) {
        if (!dropbtn.contains(event.target) && !dropdownContent.contains(event.target)) {
            dropdownContent.style.display = "none";
        }
    });
});
document.querySelectorAll('a[href^="."]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetClass = this.getAttribute('href').substring(1);
        const targetElement = document.querySelector(`.${targetClass}`);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

function toggleMenu() {
    var navLinks = document.getElementById('nav-links');
    if (navLinks) {
        navLinks.classList.toggle('show');
    }
}
</script>
<script>
document.getElementById('join-us-btn').addEventListener('click', function() {
    window.location.href = "https://builderstreat.ca/buyer-registration";
});
</script>
</body>

</html>