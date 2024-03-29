<!DOCTYPE html>
<html lang="en">

<head>
  <title>Furniche - Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<header>
  <section>
    <div class="fixed-top">
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
                $_SESSION["basketID"] = null;
              } else {
                echo '<li class="nav-item">
                <a class="nav-link" href="loginview.php">Login</a>
              </li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    </section>
</header>
<body>
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Pictures%20for%20website/slide2.jpg" class="d-block w-100" alt="image">
      <div class="carousel-caption d-none d-md-block">
        <h5>Tropical Lounge</h5>
        <p> Make it simple.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Pictures%20for%20website/slide1.jpg" class="d-block w-100" alt="image">
      <div class="carousel-caption d-none d-md-block">
        <h5>Modern kitchen</h5>
        <p>Make it modern.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Pictures%20for%20website/slide3.jpg" class="d-block w-100" alt="image">
      <div class="carousel-caption d-none d-md-block">
        <h5>Rustic Dinning set</h5>
        <p>Make it you.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<section class="index">
<h2 class = "categoriestext">Categories</h2>
<div class="categories">
  <div>
    <a href="product/products.php?typeFilter=all&categoryFilter=bohemian&sortFilter=all"><img
        src="Pictures%20for%20website/Bohemian.jpg" alt="Bohemian" class="image-filter"></a>
    <a href="product/products.php?typeFilter=all&categoryFilter=rustic&sortFilter=all"><img
        src="Pictures%20for%20website/Rustic.jpg" alt="Rustic" class="image-filter"></a>
    <a href="product/products.php?typeFilter=all&categoryFilter=minimal&sortFilter=all"><img
        src="Pictures%20for%20website/Minimalistic.jpg" alt="Minimalistic" class="image-filter"></a>
    <a href="product/products.php?typeFilter=all&categoryFilter=tropical&sortFilter=all"><img
        src="Pictures%20for%20website/Tropical.jpg" alt="Tropical" class="image-filter"></a>
    <a href="product/products.php?typeFilter=all&categoryFilter=modern&sortFilter=all"><img
        src="Pictures%20for%20website/Modern.jpg" alt="Modern" class="image-filter"></a>
  </div>
</div>
<section class="who-are">
  <br>
  <br>
<h2>Fall in love with the process of falling in love with yourself</h2>
<p>Furniche is focussed on helping you find what you want your home to look like, through a range of styles. 
<br>
<br>
</section>
<section class="containers">
<div class="card" style="width: 18rem;">
  <img src="Pictures%20for%20website/slide4.jpg" class="card-img-top" alt="Image">
  <div class="card-body">
    <h5 class="card-title">New to Furniche?</h5>
    <p class="card-text">Fall in love in the process, customise your future home.</p>
    <a href="signup/signUpPage.php" class="btn btn-primary">Sign Up</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="Pictures%20for%20website/wood.png" class="card-img-top" alt="Image">
  <div class="card-body">
    <h5 class="card-title">Who are we</h5>
    <p class="card-text">Learn about our mission and values.</p>
    <a href="contactview.php" class="btn btn-primary">Contact us</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="Pictures%20for%20website/slide5.jpg" class="card-img-top" alt="Image">
  <div class="card-body">
    <h5 class="card-title">Ready to shop?</h5>
    <p class="card-text">Look through our best work.</p>
    <a href="product/products.php" class="btn btn-primary">Products</a>
  </div>
</div>
</section>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>

  const background = document.querySelector('.backgroundd');

  document.addEventListener('scroll', () => {
    const scrollY = window.scrollY;

    if (scrollY !== 0) {
      background.style.backgroundPosition = `calc(50% + ${scrollY}px) calc(50% + ${scrollY}px)`;
    } else {
      background.style.backgroundPosition = '';
    }
  });
</script>
</body>
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
    </div>
  </div>
</footer>
</body>

</html>