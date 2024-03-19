<!DOCTYPE html>
<html>

<head>
    <title>About DLegends - Furniture Company</title>
    <link rel="stylesheet" href="About Us.css">
    <script src="About Us.js"></script>
</head>

<body onload="currentSlide(1)">
    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 8</div>
            <img src="slide1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 8</div>
            <img src="slide2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 8</div>
            <img src="slide3.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 8</div>
            <img src="slide1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">5 / 8</div>
            <img src="slide5.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">6 / 8</div>
            <img src="slide2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">7 / 8</div>
            <img src="slide3.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">8 / 8</div>
            <img src="slide5.jpg" style="width:100%">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
        <span class="dot" onclick="currentSlide(6)"></span>
        <span class="dot" onclick="currentSlide(7)"></span>
        <span class="dot" onclick="currentSlide(8)"></span>
    </div>

    <br><br>
    <!-- Mission and Story Cards -->
    <div class="content-container">
        <div class="card" id="our-story">
            <img src="https://c0.wallpaperflare.com/preview/11/747/606/aerial-shot-bird-s-eye-view-dark-green-daylight.jpg" alt="Our Story Image">
            <div class="text-content">
                <h2>Our Story</h2>
                <p>Launched in 2000, based off finding ethically sourced wooden furniture for all types of people. We
                    offer a stylish range of furniture for the whole home from the kitchen to the bedroom</p>
            </div>
        </div>
        <div class="card" id="mission-statement">
            <img src="https://images.freeimages.com/images/large-previews/c28/forest-sunrise-1334131.jpg" alt="Mission Statement Image">
            <div class="text-content">
                <h2>Mission Statement</h2>
                <p>To ethically source stylish wood for every niche and replant the wood taken. We replant 10 more trees
                    for every single tree cut down contributing over 1 million trees yearly.</p>
            </div>
        </div>
    </div>

    <br><br>
    <!-- Who we are -->
    <section class="image-section">
        <div class="text-content">
            <br><br><br><br><br><br><br><br><br>
            <h2>Who are we</h2>
            <p> Our Firm is designed to operate
                as a single partnership
                united by a set of values,
                committed on both sides
                of our mission </p>
        </div>
        <img src="https://media.sciencephoto.com/image/c0251317/800wm/C0251317-Rainforest_aerial.jpg" alt="Image">
    </section>

    <br><br>
    <!-- Values-->
    <section>
        <div class="containerreveal">
            <h2>Our Values</h2>
            <div class="cards">
                <div class="text-card">
                    <h3>Empowering small businesses</h3>
                </div>
                <div class="text-card">
                    <h3>Exceptional Customer Service</h3>
                </div>
                <div class="text-card">
                    <h3>Upholding diversity on all levels</h3>
                </div>
                <div class="text-card">
                    <h3>Adhere to the highest standards</h3>
                </div>
            </div>
        </div>
    </section>

    <br><br>
    <!-- Map -->
    <section class="locaction">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.6980768196954!2d-0.08362608488829902!3d51.51875491769485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876034c44354bb1%3A0xc57f7d6c0b61ff5f!2sLiverpool%20Street!5e0!3m2!1sen!2suk!4v1677666062080!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <span>
            <h3>Our Locations</h3>
            <br>
            <pre>
          Kensington branch: dlegends@furnicheK.com
          Birmingham branch: dlegends@furnicheB.com
          Nottingham branch: dlegends@furnicheN.com
        </pre>
        </span>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>About Us</h4>
                    <ul>
                        <li><a href="#">Our Founder</a> </li>
                        <li><a href="#">Our Values</a> </li>
                        <li><a href="#">Our Privacy Policy</a> </li>
                        <li><a href="#">Our Services</a> </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Address</h4>
                    <h5>206 Canada Place, Liverpool Street, E12 1CL</h5>
                </div>
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <h5>Email us at: comms@furniche.com</h5>
                    <h5>Call us at: 01563385967</h5>
                    <ul>
                        <li><a href="contactview.php">Contact Us via our Website</a> </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="https://en-gb.facebook.com/"><i class="fab fa-facebook - f"></i></a>
                        <a href="https://twitter.com/?lang=en"><i class="fab fa-twitter"></i></a>
                        <a href="https://uk.linkedin.com/"><i class="fab fa-linkedin - in"></i></a>
                        <a href="https://github.com/"><i class="fab fa-github"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>