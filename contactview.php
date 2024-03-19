<!DOCTYPE html>
<html lang="eng">

<head>
  <title>Contact Us</title>
  <meta charset="UTF-8">
  <script src="Contact Us.js"></script>
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/Authentication.css"> -->
</head>
<header>
  <header>
    <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
    </a>
      <section>
          <nav class="navbar">
              <div class="container-fluid">
                  <a class="navbar-brand" href="index.php">Furniche</a>

                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                              <a class="nav-link" href="product/products.php">Products</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="loginview.php">Login</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  The team
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">About Us</a></li>
                                  <li><a class="dropdown-item" href="#">Contact us</a></li>
                              </ul>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="basket/basket.php"><i class="fa-solid fa-basket-shopping"></i></a>
                          </li>
                      </ul>
                      <form class="d-flex" role="search">
                          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                  </div>
              </div>
          </nav>
</section>
  </header>

  <body>
    <br>
    <div class="content">
      <div class="who_are">
        <img src="Pictures for website\Contact Us Help.png" alt="My Image" class="my_img">
        <!-- <span>
            <p>
              Thank you for your interest in Furniche. Please fill out the form below to ask a 
             question or report a technical problem. Please note: while we appreciate your 
             questions, we are unable to respond to all inquiries.
            </p>
            <h1>Media</h1>
            <p>
              Visit our media center to find contact details for our media relations team in your region.
            </p>

        </span> -->
      </div>
      <br>
      <div class="contact">
        <!-- <img src="Pictures for website\Contact Us Form Background.png" alt="My Image" class="my_img"> -->
        <form class="contact-form" method="post">
          <label for="name">Subject:</label>
          <input type="text" id="name" name="subject" required><br><br>
          <label for="description">Message:</label><br>
          <textarea id="description" name="message" rows="5" cols="50"></textarea><br><br>

          <button type="submit" name="submitted" id="submit-btn">Submit</button>
          <?php
          require("view/contact.php");
          ?>
        </form>
        <!-- <img src="Pictures for website\thumbnail.jpeg" alt="My Image" class="my_img"> -->
      </div>
      <script>
        var i;
        for (i = 0; i < 5; i++) {
          document.write("<br>");
        }
      </script>
      <div class="information">
        <div class = "grid1">
          <img src="Pictures for website\Brown Lorry.png" class = "lorry">
          <br>
          <img src="Pictures for website\Brown Text Bar.png">
          <h2 class="description_one">We know you can’t wait for your new furniture. Track it’s progress as we build it for you.</h2>
          <h4 class="header_one">Track your package</h4>
          <script>
            var i;
            for (i = 0; i < 10; i++) {
              document.write("<br>");
            }
          </script>
        </div>
        <img src="Pictures for website\Brown Information.png" class = "FAQs">
        <br>
        <img src="Pictures for website\Brown Text Bar.png" class = "FAQs">
        <h2 class="description_two">Over 90% of our customers find their questions answered in our FAQ’s.</h2>
        <h2 class="header_two">FAQs</h2>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script>
          var i;
          for (i = 0; i < 10; i++) {
            document.write("<br>");
          }
        </script>
        </div>
        <img src="Pictures for website\Brown Text.png">
        <br>
        <img src="Pictures for website\Brown Text Bar.png">
        <h2 class="yourmum">Live chat</h2>
        <p>The quickest way to speak to us is via our live chat option.</p>
        <script>
          var i;
          for (i = 0; i < 10; i++) {
            document.write("<br>");
          }
        </script>
        <img src="Pictures for website\Brown Phone.png">
        <br>
        <img src="Pictures for website\Brown Text Bar.png">
        <h2 class="yourmum">Call us</h2>
        <p>If we have not been able to answer your question through track your order or our FAQ’s, call us.</p>
        <script>
          var i;
          for (i = 0; i < 10; i++) {
            document.write("<br>");
          }
        </script>
        <h1>If you have any query please contact us using on the options below. We’d love to hear from you.</h1>
      </div>
      <section class="location">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.6980768196954!2d-0.08362608488829902!3d51.51875491769485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876034c44354bb1%3A0xc57f7d6c0b61ff5f!2sLiverpool%20Street!5e0!3m2!1sen!2suk!4v1677666062080!5m2!1sen!2suk"
          width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
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
      <script>
        /* Set the width of the sidebar to 250px (show it) */
        function openNav() {
          document.getElementById("mySidepanel").style.width = "250px";
        }

        /* Set the width of the sidebar to 0 (hide it) */
        function closeNav() {
          document.getElementById("mySidepanel").style.width = "0";
        }
      </script>
  </body>

</html>