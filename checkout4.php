<!DOCTYPE html>
<html>

<head>
    <title>About DLegends - Furniture Company</title>
    <link rel="stylesheet" href="css/checkout4.css">
</head>
<div class="colour">
  <header>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
  </a>
</div>
<section>
  <div class="topnav">
      <nav>
          <h1 class="logo">Furniche</h1>
          <ul>
              <li><a class="active" href="Main.html">Home</a></li>
              <li><a href="Projects.html">Login</a></li>
              <li><a href="contactus.html">Contact Us</a></li>
              <li><a href="contactus.html">About Us</a></li>
          </ul>
  </nav>
  </div>
</section>

</header>
<body>
    <div class="fill">
       
        <h1 class="text-wrapper-2">Checkout</h1>
        <h2 class="text-wrapper-3">Billing Address</h2>
        <div class="divform">
            <div class="column6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            </div>
        
            <div class="column6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="Email">
              </div>
              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Address" required>
              </div>

              <div class="col-md-5">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" id="country" required>
                  <option value="">Choose...</option>
                  <option>United Kingdom</option>
                  <option>United States</option>
                </select>
              </div>
              <div class="col4">
                <label for="state" class="form-label">State</label>
                <select class="form-select" id="state" required>
                  <option value="">Choose...</option>
                  <option>West Midlands</option>
                </select>
              </div>
              <div class="col3">
                <label for="zip" class="form-label">Post Code</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
              </div>
        </div>

        <div class="payment1">
            <h4 class="triggered">Payment</h4>
            <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
            </div>

                <div class="col-md-6">
                    <label for="cc-number" class="form-label">Credit card number</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                </div>
                    <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                    </div>
              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              </div>
        </div>

        <div class="basketsec">
            <h4 class="bb">Basket</h4>
            <?php
include 'connectdb.php';
$basket_id = 1;
$sql = "SELECT price, quantity FROM products JOIN basketproducts ON products.productId = basketproducts.productId WHERE basketId = $basket_id";
$result = $conn->query($sql);
$basketcost = 0;
if ($result->rowCount() > 0) {
  while ($row = $result->fetch()) {
    $basketcost = $basketcost + $row["quantity"] * $row["price"];
  }
  echo "£" . $basketcost . " before discount</br>";
} else {
  echo "0 results";
}



$discount_name = "Discount 1"; #$discount_name = $_POST['discount'];
$sql = "SELECT value FROM discounts WHERE discountTitle = '" . $discount_name . "'";
$value = $conn->query($sql);
$basketcost = $basketcost * (1 - $value->fetch()["value"] / 100);
echo "£" . $basketcost . " total</br>";


#stock availability check
function availability($conn, $basket_id)
{
  $available = true;
  $sql = "SELECT productName, countStock, quantity FROM products join basketproducts ON products.productId = basketproducts.productId  WHERE basketId = $basket_id";
  $result = $conn->query($sql);
  if ($result->rowCount() > 0) {
    while ($row = $result->fetch()) {
      if ($row["quantity"] > $row["countStock"]) {
        echo $row["productName"] . " is unavailable </br>";
        $available = false;
      }
    }
  }
  return $available;
}
if (availability($conn, $basket_id)) {
  echo "available";
}

if (isset($_POST['purchase'])) {
  if (availability($conn, $basket_id)) {
    $sql = "SELECT countStock, countSold, quantity, basketproducts.productId FROM products join basketproducts ON products.productId = basketproducts.productId  WHERE basketId = $basket_id";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
      while ($row = $result->fetch()) {
        $sql = "UPDATE products SET countStock = " . $row["countStock"] - $row["quantity"] . ", countSold = " . $row["countSold"] + $row["quantity"] . " WHERE productId = " . $row["productId"];
        $conn->query($sql);
      }
    }
  }
}
$_POST['purchase'] = null;
?>

        <div class="cbutton" method="post" action="backendforbasket.php">
            <a href="#" class="order-button" onclick="purchase">Order</a>
            <input type="hidden" name="purchase" value="TRUE"/>
        </div>
        </div>
    </div>
  


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
                        <li><a href="C:\Users\Osaze\OneDrive\Documents\GitHub\TeamProject6\contact.css">Contact Us via our
                                Website</a> </li>
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