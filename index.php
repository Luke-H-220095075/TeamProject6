<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Tailwind CSS Page</title>
    <link href="css/style.css" rel="stylesheet">
    </head>
<body class="bg-gray-100">


<head>
    <title>About DLegends - Furniture Company</title>
    <link rel="stylesheet" href="css/style.css">
</head>
  <header>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
  </a>
<section>
  <div class="topnav">
      <nav>
          <h1 class="logo">Furniche</h1>
          <ul>
              <li><a href="Projects.html">Login</a></li>
              <li><a href="contactus.html">Contact Us</a></li>
              <li><a href="contactus.html">About Us</a></li>
          </ul>
  </nav>
  </div>
</section>
</header>
</div>
<body>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 5</div>
    <img src="Pictures for Website/slide1.jpg" style="width:100%">
    <div class="text">Tropical Style Kitchen</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 5</div>
    <img src="Pictures for Website/slide2.jpg" style="width:100%">
    <div class="text">Minimial Wooden Foyer</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 5</div>
    <img src="Pictures for Website/slide3.jpg" style="width:100%">
    <div class="text">Rustic Dinning set</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 5</div>
    <img src="Pictures for Website/slide4.jpg" style="width:100%">
    <div class="text">Bohemian Living room</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">5 / 5</div>
    <img src="Pictures for Website/slide5.jpg" style="width:100%">
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
    <img src="https://liveastonac-my.sharepoint.com/:i:/r/personal/220228709_aston_ac_uk/Documents/Stage%202/CS%20Modules/TeamProject/Team%20Project%206/bohemian.jpg?csf=1&web=1&e=d5c3vI" alt="Category 1" onclick="fillCategoryFilter('bohemian')" class="image-filter">
    <img src="https://liveastonac-my.sharepoint.com/:i:/r/personal/220228709_aston_ac_uk/Documents/Stage%202/CS%20Modules/TeamProject/Team%20Project%206/rustic.jpg?csf=1&web=1&e=DyqZMM" alt="Category 2" onclick="fillCategoryFilter('rustic')" class="image-filter">
    <img src="https://liveastonac-my.sharepoint.com/:i:/r/personal/220228709_aston_ac_uk/Documents/Stage%202/CS%20Modules/TeamProject/Team%20Project%206/minimalistic.jpg?csf=1&web=1&e=AZdXKd" alt="Category 3" onclick="fillCategoryFilter('minimal')" class="image-filter">
    <img src="https://liveastonac-my.sharepoint.com/:i:/r/personal/220228709_aston_ac_uk/Documents/Stage%202/CS%20Modules/TeamProject/Team%20Project%206/tropical.jpg?csf=1&web=1&e=05IEz3" alt="Category 4" onclick="fillCategoryFilter('tropical')" class="image-filter">
    <img src="https://liveastonac-my.sharepoint.com/:i:/r/personal/220228709_aston_ac_uk/Documents/Stage%202/CS%20Modules/TeamProject/Team%20Project%206/modern.jpg?csf=1&web=1&e=x6Bp7H" alt="Category 5" onclick="fillCategoryFilter('modern')" class="image-filter">
 </div>
</div>


 <div class="Newsletter">
        <img src="Pictures for Website/nl2.png" alt="My Image" class="my_img">
        <img src="Pictures for Website/nl1.png" alt="My Image" class="my_img1">
    </div>
<script>
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
</body>

</html>