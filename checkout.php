<?php
include 'connect.php';
session_start();
//$_SESSION["basketID"] = "1"; 
//$_SESSION["discount_name"] = "1"; 
#subtotal

if (isset ($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
  // last request was more than 30 minutes ago
  session_unset();     // unset $_SESSION variable for the run-time 
  session_destroy();   // destroy session data in storage
  echo '<script>alert("session timed out")</script>';
  header('Location: loginview.php');
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
$basketId = $_SESSION["basketID"];
$sql = "SELECT price, quantity FROM products JOIN basketproducts ON products.productId = basketproducts.productId WHERE basketId = $basketId";
$result = $db->query($sql);
$subtotal = 0;
if ($result->rowCount() > 0) {
  while ($row = $result->fetch()) {
    $subtotal = $subtotal + $row["quantity"] * $row["price"];
  }
}

$basketcost = $subtotal;
# discounts
if (isset ($_SESSION['discount_name'])) {
  $discount_name = $_SESSION["discount_name"]; #$discount_name = $_POST['discount'];
  $sql = "SELECT value FROM discounts WHERE discountTitle = '" . $discount_name . "'";
  $value = $db->query($sql);
  if ($value->rowCount() > 0) {
    $basketcost = round($subtotal * (1 - $value->fetch()["value"] / 100), 2);
  }
}

#stock availability check
include ("availability.php");
function purchase($db, $basketId)
{
  if (isset ($_POST['purchase'])) {
    if (availability($db, $basketId)) {
      $sql = "SELECT countStock, countSold, quantity, basketproducts.productId FROM products join basketproducts ON products.productId = basketproducts.productId  WHERE basketId = $basketId";
      $result = $db->query($sql);
      if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
          $sql = "UPDATE products SET countStock = " . $row["countStock"] - $row["quantity"] . ", countSold = " . $row["countSold"] + $row["quantity"] . " WHERE productId = " . $row["productId"];
          $db->query($sql);
        }
      }
      $sql = "INSERT INTO orders (basketId, userId, deliveryOption) VALUES (" . $basketId . ", " . $_SESSION['userID'] . ", 'standard')";
      $db->query($sql);
      $sql = "UPDATE baskets SET currentUserBasket = 0 WHERE basketId = $basketId";
      $db->query($sql);
      $sql = "INSERT INTO baskets (userId, currentUserBasket) VALUES (" . $_SESSION['userID'] . ", 1)";
      $db->query($sql);
      $_SESSION["basketID"] = null;
      header('Location: history.php');
    }
  }
  $_POST['purchase'] = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/checkout.css" rel="stylesheet">
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
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </div>
    </section>
</header>

<body>
  <section class="header-container">
    <h1>Checkout</h1>
  </section>
  <div class="checkout-container">
    <div class="contact-shipping">
      <section class="contact-info">
        <h2>Your Details</h2>
        <div class="input-container">
          <input type="name" placeholder="First name">
          <input type="name" placeholder="Last name">
        </div>
        <input type="text" placeholder="Address Line">
        <div class="input-container">
          <input type="name" placeholder="Post Code" maxlength="7">
          <input type="name" placeholder="City">
          <select id="country" name="country">
            <option value="uk">United Kingdom</option>
            <option value="uk">United States</option>
            <option value="uk">France</option>
            <option value="uk">Spain</option>
            <option value="uk">Ireland</option>
            <option value="uk">Russia</option>
          </select>

        </div>

        <div class="input-container">
          <input type="name" placeholder="Email address">
          <input type="name" id="mobile" name="mobile" placeholder="Your mobile number">
        </div>
      </section>

      <section class="payment-info">
        <h2>Payment</h2>
        <form method="post">
          <input type="text" id="CardNumber" placeholder="Card Number" maxlength="19">
          <div class="input-container">
            <input type="text" id="CVV" placeholder="CVV" name="CVV">
            <input type="text" id="expDate" name="expDate" placeholder="MM/YY" maxlength="5" />

          </div>
          <?php
          if (availability($db, $basketId)) {
            echo "<button  method='post' name='purchase' type='submit'>Confirm order</button>";
            purchase($db, $basketId);
          } else {
            echo "<button type='button'>unavailable</button>";
          }
          ?>
        </form>

      </section>
    </div>
    <div class="order-summary">
      <h2>Order summary</h2>

      <div class="totals">
        <?php
        if (availability($db, $basketId)) {
          echo "<p>currently available</p>";
        } else {
          echo "<p>currently unavailable available</p>";
        }
        echo "<p>Subtotal: " . $subtotal . "</p>";
        echo "<p>Delivery:</p>";
        echo "<p>Total To Pay: " . $basketcost . "</p>";
        ?>



      </div>

    </div>
  </div>

  <script>


    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
      if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.padding = "30px 10px";
        document.getElementById("logo").style.fontSize = "25px";
      } else {
        document.getElementById("navbar").style.padding = "50px 10px";
        document.getElementById("logo").style.fontSize = "35px";
      }
    }

    //expiration date
    document.getElementById('expDate').addEventListener('input', function (e) {
      var input = e.target.value;
      var cleaned = input.replace(/\D/g, '');

      if (cleaned.length > 2) {
        cleaned = cleaned.substring(0, 2) + '/' + cleaned.substring(2, 4);
      }

      e.target.value = cleaned;
    });

    //CVV
    document.getElementById('CVV').addEventListener('input', function (e) {
      var currentValue = e.target.value;
      var cleanedValue = currentValue.replace(/\D/g, '');

      if (cleanedValue.length > 3) {
        cleanedValue = cleanedValue.substring(0, 3);
      }
      e.target.value = cleanedValue;
    });

    //Card Number
    document.getElementById('CardNumber').addEventListener('input', function (e) {
      var target = e.target;
      var position = target.selectionStart;
      var length = target.value.length;
      var value = target.value.replace(/\D/g, '');
      value = value.substring(0, 16);
      var formattedValue = value.replace(/(\d{4})(?=\d)/g, '$1 ');
      target.value = formattedValue;


      var newPosition = position + (formattedValue.length - length);


      target.setSelectionRange(newPosition, newPosition);
    });


  </script>
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