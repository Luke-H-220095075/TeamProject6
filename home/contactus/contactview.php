<!DOCTYPE html>
<html lang="eng">

<head>
  <title>Contact Us</title>
  <meta charset="UTF-8">
  <script src="Contact Us.js"></script>
  <link rel="stylesheet" href="contact.css">
  <link rel="stylesheet" href="Authentication.css">
</head>
  <header>
    <header>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
    </a>
    <section>
      <div class="topnav">
          <nav>
              <h1 class="logo">Furniche</h1>
              <ul>
                  <li><a class="active" href="Main.html">Home</a></li>
                  <li><a href="loginp.html">Login</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                  <li><a href="About Us.html">About Us</a></li>
              </ul>
      </nav>
      </div>
    </section>
  </header>
<body>
  <div class="content">
    <div class="who_are">
        <img src="C:\Users\Osaze\OneDrive\Documents\GitHub\TeamProject6\home\contactus\Forest_Trail_Landscape_Wallpaper.jpg" alt="My Image" class="my_img">
        <span>
            <p>
              Thank you for your interest in Furniche. Please fill out the form below to ask a 
             question or report a technical problem. Please note: while we appreciate your 
             questions, we are unable to respond to all inquiries.
            </p>
            <h1>Media</h1>
            <p>
              Visit our media center to find contact details for our media relations team in your region.
            </p>

        </span>
    </div>
  <div class="contact">
    <form id="contact-form" method="post">
      <label for="name">Subject:</label>
      <input type="text" id="name" name="subject" required><br><br>
  
      <!-- <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>
  
      <label for="confirm-email">Confirm Email:</label>
      <input type="email" id="confirm-email" name="confirm-email" required><br><br>
   -->
      <label for="description">Message:</label><br>
      <textarea id="description" name="description" rows="5" cols="50"></textarea><br><br>
  
      <button type="submit" name="submitted" id="submit-btn">Submit</button>
      <?php
    include("../../../TeamProject6/view/contact.php");
    ?>
    </form>
    
    <img src="C:\Users\Osaze\OneDrive\Documents\GitHub\TeamProject6\home\contactus\thumbnail.jpeg" alt="My Image" class="my_img">
  </div>
  <section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.6980768196954!2d-0.08362608488829902!3d51.51875491769485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876034c44354bb1%3A0xc57f7d6c0b61ff5f!2sLiverpool%20Street!5e0!3m2!1sen!2suk!4v1677666062080!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                    <li><a href="C:\Users\Osaze\OneDrive\Documents\GitHub\TeamProject6\contact.css">Contact Us via our Website</a> </li>
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