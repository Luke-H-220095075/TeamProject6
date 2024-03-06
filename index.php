<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Furniche - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
    </head>



  <header>
    
<section>
    <nav>
    <div id="navbar">
        <a href="index.php" id="logo">Furniche</a>
        <div id="navbar-right">
            <a href="product/products.php">Products</a>
            <a href="contactview.php">Contact Us</a>
            <a href="aboutus.php">About Us</a>
            <a href="loginview.php">Login</a>
            <a href="basket/basket.php"><i class="fa-solid fa-basket-shopping"></i></a>
        </div>
    </div>
              <?php
                session_start();
              if (isset($_SESSION['user'])) {
                  echo '<li><a href="#">' . $_SESSION['user'] . '</a>';
              }
              ?>
  </nav>
</section>
</header>
    <body class="bg-gray-100">
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 5</div>
    <img src="Pictures%20for%20website/slide1.jpg" style="width:100%">
    <div class="text">Tropical Style Kitchen</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 5</div>
    <img src="Pictures%20for%20website/slide2.jpg" style="width:100%">
    <div class="text">Minimial Wooden Foyer</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 5</div>
    <img src="Pictures%20for%20website/slide3.jpg" style="width:100%">
    <div class="text">Rustic Dinning set</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 5</div>
    <img src="Pictures%20for%20website/slide4.jpg" style="width:100%">
    <div class="text">Bohemian Living room</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">5 / 5</div>
    <img src="Pictures%20for%20website/slide5.jpg" style="width:100%">
    <div class="text">Modern Bathroom</div>
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
 </div>
 <div class="home">
 <p>Design your home to be a bit more like you.</p>
 </div>
<div class="categories">
<h2>Categories</h2>
 <div>
     <a href="products.php?typeFilter=all&categoryFilter=bohemian&sortFilter=all"><img src="Pictures%20for%20website/Bohemian.jpg" alt="Bohemian" class="image-filter"></a>
     <a href="products.php?typeFilter=all&categoryFilter=rustic&sortFilter=all"><img src="Pictures%20for%20website/Rustic.jpg" alt="Rustic" class="image-filter"></a>
     <a href="products.php?typeFilter=all&categoryFilter=minimal&sortFilter=all"><img src="Pictures%20for%20website/Minimalistic.jpg" alt="Minimalistic" class="image-filter"></a>
     <a href="products.php?typeFilter=all&categoryFilter=tropical&sortFilter=all"><img src="Pictures%20for%20website/Tropical.jpg" alt="Tropical" class="image-filter"></a>
     <a href="products.php?typeFilter=all&categoryFilter=modern&sortFilter=all"><img src="Pictures%20for%20website/Modern.jpg" alt="Modern" class="image-filter"></a>
 </div>
</div>


 <div class="Newsletter">
        <img src="Pictures%20for%20website/nl2.png" alt="My Image" class="my_img">
            <h1 class="text1">Melissa Ball</h1>
            <h1 class="text2">How furniche is changing  the furniture space </h1>
        <img src="Pictures%20for%20website/nl1.png" alt="My Image" class="my_img1">
            <h1 class="text3">Billy Jean</h1>
            <h1 class="text4">Things to make your  living  more modern. </h1>
    </div>
<script>

    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "30px 10px";
            document.getElementById("logo").style.fontSize = "25px";
        } else {
            document.getElementById("navbar").style.padding = "80px 10px";
            document.getElementById("logo").style.fontSize = "35px";
        }
    }

    let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
    </script>
 <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4 href="About Us.html">About Us</h4>
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
                    <li><a href="contactus\contact.html">Contact Us via our Website</a> </li>
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
