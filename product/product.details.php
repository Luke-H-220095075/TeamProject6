
<!DOCTYPE html>
<html>

<head>
    <title>Furniche - Products</title>
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
 
<body>
    <header>

<div class="colour">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
  </a>
</div>
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
<body>
<br>
<br>
<br>
<main class="container">
 
  <!-- Left Column / Headphones Image -->
  <div class="left-column">
    <img data-image="black" src="../Pictures for website/Bohemian.jpg" alt="">
    <img data-image="blue" src="../Pictures for website/Bohemian.jpg" alt="">
    <img data-image="red" class="active" src="../Pictures for website/Bohemian.jpg" alt="">
  </div>
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
      <span>Product</span>
      <h1>Beats EP</h1>
      <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
    </div>
 
    <!-- Product Configuration -->
    <div class="product-configuration">
 
      <!-- Product Color -->
      <div class="product-color">
        <span>Color</span>
 
        <div class="color-choose">
          <div>
            <input data-image="red" type="radio" id="red" name="color" value="red" checked>
            <label for="red"><span></span></label>
          </div>
          <div>
            <input data-image="blue" type="radio" id="blue" name="color" value="blue">
            <label for="blue"><span></span></label>
          </div>
          <div>
            <input data-image="black" type="radio" id="black" name="color" value="black">
            <label for="black"><span></span></label>
          </div>
        </div>
 
      </div>
 
      <!-- Style Configuration -->
      <div class="style-config">
        <span>Cable configuration</span>
 
        <div class="stye-choice">
          <button>Straight</button>
          <button>Coiled</button>
          <button>Long-coiled</button>
        </div>
 
        <a href="#">How to configurate your headphones</a>
      </div>
    </div>
 
    <!-- Product Pricing -->
    <div class="product-price">
      <span>£300</span>
      <a href="#" class="cart-btn">Add to cart</a>
    </div>
  </div>
</main>
<script>

  // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
      if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
          document.getElementById("navbar").style.padding = "30px 10px";
          document.getElementById("logo").style.fontSize = "25px";
      } else {
          document.getElementById("navbar").style.padding = "50px 10px";
          document.getElementById("logo").style.fontSize = "35px";
      }
  }

  $(document).ready(function() {
 
 $('.color-choose input').on('click', function() {
     var headphonesColor = $(this).attr('data-image');

     $('.active').removeClass('active');
     $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
     $(this).addClass('active');
 });

});
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