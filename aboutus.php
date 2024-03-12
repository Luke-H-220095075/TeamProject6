<!DOCTYPE html>
<html>

<head>
    <title>Furniche - About Us</title>
    <link rel="stylesheet" href="css/about.css">
</head>
<div class="colour">
  <header>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
  </header>
</div>
<section>
    <div class="topnav">
        <nav>
            <h1 class="logo">Furniche</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="product/products.php">Products</a></li>
                <li><a href="history.php">Previous Orders</a></li>
                <li><a href="contactview.php">Contact Us</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <?php
                session_start();
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="customerprofile.php">' . $_SESSION['user'] . '</a>';
                }else {
                    echo '<li><a href="basket/basket.php">Basket</a></li>';
                    echo '<li><a href="signup/signUpPage.php">Sign up</a></li>';
                    echo '<li><a href=".loginview.php">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</section>
</header>
</div>
<body>

    <div class="intro">
        <span>
          <h1>D(evelopment) Legends</h1>
          <p>Developing legendary furniture one generation at a time.</p>
        </span>
        <img src="Pictures for Website/intro.jpg" alt="My Image" class="my_img">
    </div>
    <div class="team">
      <img src="Pictures for Website/team.jpg" alt="My Image" class="my_img">
      <span>
        <h1>Who we are</h1>
        <p>Our Firm is designed to operate as a single partnership
          united by a set of values, committed on both sides of our mission</p>
      </span>
  </div>
    
    <div class="content">

            <div class="row row-cols-1 row-cols-md-3 g-4">
              <div class="cards">
                <span>
                    <h1>Our Purpose</h1>
                    <p>
                        See guiding principles that inform our long term strategy 
                        as well as how we serve our clients.
                    </p>
                </span>
                <span>
                    <h1>Our Aspiration </h1>
                    <p>
                        We help our clients pursue sustainability and allow them to
                        express themselves in their furniture.
                    </p>
                </span>
                <span>
                    <h1>Our Governance</h1>
                    <p>
                        We are a value driven organisation. Focussing on innovation 
                        and compliance, we ensure we are always up to date with new 
                        regulation and laws.
                    </p>
                </span>
            </div>
        </div>
        <div class="mission-story">
          <img src="Pictures for Website/Story.jpg" alt="My Image" class="my_img">
          <img src="Pictures for Website/mission.jpg" alt="My Image" class="my_img">
      </div>
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
<section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.6980768196954!2d-0.08362608488829902!3d51.51875491769485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876034c44354bb1%3A0xc57f7d6c0b61ff5f!2sLiverpool%20Street!5e0!3m2!1sen!2suk!4v1677666062080!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     <span>
      <h3>Our Locations</h3>
      <br>
      <p>Kensington branch: dlegends@furnicheK.com
        Birmingham branch: dlegends@furnicheB.com
        Nottingham branch: dlegends@furnicheN.com
      </p>
    </span>
  </section>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4 href="Pictures for Website/About Us.html">About Us</h4>
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