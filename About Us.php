<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <title>About DLegends - Furniture Company</title>
    <link rel="stylesheet" href="About Us.css">
    <script src="About Us.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <link rel="stylesheet" href="../css/product.css?v=<?php echo time(); ?>">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>



    <header>
  <section>
    <div class="fixed-top">
      <nav class="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Furniche</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="product/products.php">Products</a>
              </li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  The team
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="About%20Us.php">About Us</a></li>
                  <li><a class="dropdown-item" href="contactview.php">Contact us</a></li>
                </ul>
              </li>

              <?php
              session_start();
              if (isset ($_SESSION['user'])) {
                echo '<li class="nav-item"><a class="nav-link" href="customerprofile.php">' . $_SESSION['user'] . '</a></li>';
                  echo '<li class="nav-item"><a class="nav-link" href="logout.php" >Logout</a></li>';
                  echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa-solid fa-basket-shopping"></i>
                </a>';
                echo '<ul class="dropdown-menu"><li class="nav-item"><a class="nav-link" href="history.php">order history</a></li>';
                echo '<li class="nav-item">
                      <a class="nav-link" href="basket/basket.php">basket</a>
                      </li></ul>';
                if ($_SESSION["access"] = "admin") {
                  echo '<li class="nav-item"><a class="nav-link" href="admin\dashboard.php">admin page</a></li></li>';
                }

              } else {
                echo '<li class="nav-item">
                <a class="nav-link" href="loginview.php">Login</a>
              </li>';
              }
              ?>
            </ul>
          </div>
        </div>
    </div>
    </section>
</header>
</section>
<section class="slide">
<br>
<br>
<br>
<h1>Meet the team </h1>
<body onload="currentSlide(1)">
    <!-- Slideshow container -->
    <div class="slideshow-containerr">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fades">
            <div class="numbertext">1 / 8</div>
            <img src="Pictures for website/LuckyV2.png" style="width:100%">
        </div>

        <div class="mySlides fades">
            <div class="numbertext">2 / 8</div>
            <img src="Pictures for website/LukeV2.png" style="width:100%">
        </div>

        <div class="mySlides fades">
            <div class="numbertext">3 / 8</div>
            <img src="Pictures for website/IzzyV2.png" style="width:100%">
        </div>

        <div class="mySlides fades">
            <div class="numbertext">4 / 8</div>
            <img src="Pictures for website/OsazeV2.png" style="width:100%">
        </div>

        <div class="mySlides fades">
            <div class="numbertext">5 / 8</div>
            <img src="Pictures for website/KhaabiilV2.png" style="width:100%">
        </div>

        <div class="mySlides fades">
            <div class="numbertext">6 / 8</div>
            <img src="Pictures for website/KinV2.png" style="width:100%">
        </div>

        <div class="mySlides fades">
            <div class="numbertext">7 / 8</div>
            <img src="Pictures for website/Thomas V2.png" style="width:100%">
        </div>

        <div class="mySlides fades">
            <div class="numbertext">8 / 8</div>
            <img src="Pictures for website/ShayaanV2.png" style="width:100%">
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
</section>

    <!-- Mission and Story Cards -->
    <div class="content-container">
    <br><br>
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
    <!-- Values-->
    <section>
        <div class="containerreveal">

        <br><br>
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
        </body>
        <footer class="footer">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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


</html>