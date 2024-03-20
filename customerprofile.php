
<?php ob_start(); ?><!DOCTYPE html>
<html lang="en">

<head>
  <title>About DLegends - Furniture Company</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/customerprofile.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/customerprofile.css?v=<?php echo time(); ?>">
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

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
              <?php
              session_start();
              if (isset ($_SESSION['user'])) {
                echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="product/products.php">Products</a>
              </li>';
                echo '<li class="nav-item"><a class="nav-link" href="customerprofile.php">' . $_SESSION['user'] . '</a></li>';
                if ($_SESSION["access"] = "admin"){
                  echo '<li class="nav-item"><a class="nav-link" href="admin\dashboard.php">' . $_SESSION['user'] . '</a></li>'; 
                }
              } else {
                echo '<li class="nav-item">
                <a class="nav-link" href="loginview.php">Login</a>
              </li>';
              }
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  The team
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="aboutus.php">About Us</a></li>
                  <li><a class="dropdown-item" href="contactview.php">Contact us</a></li>
                </ul>
              </li>
              <?php
              if (isset ($_SESSION['user'])) {
                echo '<li class="nav-item">
                      <a class="nav-link" href="basket/basket.php"><i class="fa-solid fa-basket-shopping"></i></a>
                      </li>';
              }
              ?>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
    </div>

    </nav>
    </div>
    </div>
    </nav>
  </section>
</header>

<body>
  <?php

  require ("User.php"); ?>

  <section>
    <div class="profile">
      <img src="Pictures for website/Thomas.jpg" alt="My Image" class="my_img">
      <div class="contact-col">
        <form method="post">
          <?php
          $user = new User(null, null, null, null, null, null, null, null);
          $user->getDetails();
          echo '
                    <form method="post">
                    <input type="firstname"name="firstname"placeholder="Firstname" value="' . $user->firstname . '" required/>
                    <br>
                    <input type="lastname"name="lastname"placeholder="Lastname" value="' . $user->surname . '" required/>
                    <br>
                    <input type="email" name="email" placeholder="Enter email address" value="' . $user->email . '" required/>
                    <br>
                    <input type="number" name="phone" placeholder="Enter your phonenumber" value="' . $user->phone . '" required/>
                    <br>
                    <input type="address" name="address" placeholder="Enter your address" value="' . $user->address . '" required/>
                    <br>
                    <p>How would you like to be contacted?</p>
                    <label><input type="checkbox" name="cbEmail"';
          if ($user->cbEmail == true) {
            echo 'checked';
          }
          echo '/>Email</label>
                    <label><input type="checkbox" name="cbText"';
          if ($user->cbText == true) {
            echo 'checked';
          }
          echo '/>Text</label>
                    <button type="submit" name="submitted" id="submit-btn">Submit</button>
                </form>';
          if (isset ($_POST["submitted"])) {
            $user = new User($_SESSION["user"], null, $_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['address'], $_POST['phone'], null);
            include_once ("controller/UpdateDetailsController.php");
            $controller = new UpdateDetailsController($user);
            $controller->invoke(isset ($_POST['cbEmail']), isset ($_POST['cbText']));
            //header('Location: update.php');
          } ?>
          <?php
          echo '<form method="post"><button type="submit" name="adminrequest" style="cursor: pointer">Request to be an admin</button></form>';

          if (isset ($_POST["adminrequest"]))
          {
            $user = new User($_SESSION["user"], null, null, null, null, null, null, null);
            $user->requestAdmin();
          }
          ?>
      </div>
    </div>
  </section>
</body>
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