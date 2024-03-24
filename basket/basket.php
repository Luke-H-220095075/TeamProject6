<!DOCTYPE html>
<html>
<?php
session_start();
include '../connect.php';
if (!isset ($_SESSION['userID'])) {
    echo '<a href="../loginview.php" style="position: fixed; left: 50%; top: 50%; transform: translate(-50%, -50%); font-family: Calibri,serif; font-size: xx-large">Please log in to view basket.</a>';
    die();
}
$sql = "SELECT basketId FROM baskets WHERE userId = " . $_SESSION['userID'] . " AND currentUserBasket = 1";
$result = $db->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
$mainbasketId = $row['basketId'];
$basketId = $mainbasketId;
if (isset ($_SESSION["basketID"])) {
    $basketId = $_SESSION["basketID"];
}
$_SESSION["basketID"] = $mainbasketId;
if ($basketId != $mainbasketId) {
    $prevOrder = " in that order add to your basket?";
} else {
    $prevOrder = "";
}
?>

<head>
    <title>Furniche - Basket</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/basket.css" />
    <link href="../css/style.css" rel="stylesheet">
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
          <a class="navbar-brand" href="../index.php">Furniche</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="../product/products.php">Products</a>
              </li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  The team
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../About%20Us.php">About Us</a></li>
                  <li><a class="dropdown-item" href="../contactview.php">Contact us</a></li>
                </ul>
              </li>

              <?php
              if (isset ($_SESSION['user'])) {
                echo '<li class="nav-item"><a class="nav-link" href="../customerprofile.php">' . $_SESSION['user'] . '</a></li>';
                  echo '<li class="nav-item"><a class="nav-link" href="../logout.php" >Logout</a></li>';
                  echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa-solid fa-basket-shopping"></i>
                </a>';
                echo '<ul class="dropdown-menu"><li class="nav-item"><a class="nav-link" href="../history.php">order history</a></li>';
                echo '<li class="nav-item">
                      <a class="nav-link" href="../basket/basket.php">basket</a>
                      </li></ul>';
                if ($_SESSION["access"] = "admin") {
                  echo '<li class="nav-item"><a class="nav-link" href="../admin\dashboard.php">admin page</a></li></li>';
                }

              } else {
                echo '<li class="nav-item">
                <a class="nav-link" href="../loginview.php">Login</a>
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

    <div class="basketss">


        <h2>Your Basket</h2>

        <?php
        $_SESSION["basketID"] = $basketId;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $stmtBasket = $db->prepare("
            SELECT products.productId, products.productName, products.price, products.imageName, basketproducts.quantity
            FROM basketproducts
            JOIN products ON basketproducts.productId = products.productId
            WHERE basketproducts.basketId = :basket_Id
            
        ");
            $stmtBasket->bindParam(':basket_Id', $basketId);
            $stmtBasket->execute();

            if ($stmtBasket->rowCount() > 0) {
                echo '<div class="basket-items">';
                while ($row = $stmtBasket->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="basket-item" data-productId="' . $row['productId'] . '">';
                    echo '<div class="item-image"><img src= "../Pictures%20for%20website/' . $row['imageName'] . '" " width="250" height="300" alt="' . $row['imageName'] . '"></img></div>';
                    echo '<div class="item-details">';
                    echo '<p><strong>' . $row['productName'] . '</strong></p>';
                    echo '<p>Price: £' . $row['price'] . '</p>';
                    echo '<div class="quantity-controls">';
                    if ($prevOrder == "") {
                        echo '<button onclick="adjustQuantity(' . $row['productId'] . ', -1)">-</button>';
                        echo '<span> </span><span class="quantity">' . $row['quantity'] . '</span><span> </span>';
                        echo '<button onclick="adjustQuantity(' . $row['productId'] . ', 1)">+</button>';
                    } else {
                        echo '<span> </span><span class="quantity">' . $row['quantity'] . '</span>' . $prevOrder . '<span> </span>';
                        echo '<button onclick="addQuantity(' . $row['productId'] . ')">+</button>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '<div class="mmm"><a href="../product/products.php"><button class="nnn">Add More Products?</button></a></div>';

            } else {
                echo "<p>Your basket is empty.</p>";
                echo '<a href="../product/products.php"><button class="nnn">Add Products?</button></a>';
                echo '<a href="../checkout.php"><button class="nnn">Checkout now</button></a>';

            }

            echo "<br>";

            $sql = "SELECT price, quantity FROM products JOIN basketproducts ON products.productId = basketproducts.productId WHERE basketId = '".$basketId."'";
            $result = $db->query($sql);
            $basketcost = 0;
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch()) {
                    $basketcost = $basketcost + $row["quantity"] * $row["price"];
                   }
                   echo "<p>£" . $basketcost . " before discount</p>";
                    $discount_name = "test"; #$discount_name = $_POST['discount'];
                    $sql = "SELECT value FROM discounts WHERE discountTitle = '" . $discount_name . "'";
                    $value = $db->query($sql);
                    $basketcost = $basketcost * (1 - $value->fetch()["value"] / 100);
                    $basketcost = number_format($basketcost, 2);
                    echo "<p>£" . $basketcost . " total</p>";
                #stock availability check
                include ("../availability.php");
                if (availability($db, $basketId)) {
                    echo "<p>available</p>";
                    echo '<a href="../checkout.php"><button class="checkout-button">checkout?</button></a>';

                } else {
                    echo "<p>Your basket is empty.</p>";
                    echo '<div class="mmm"><a href="../product/products.php"><button>Add Products?</button></a></div>';

                }
                
            } else {
                echo "0 results" . $basketId;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>

    <script>
        function adjustQuantity(productId, change) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'basket_quantity.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var quantityElement = document.querySelector('.basket-item[data-productId="' + productId + '"] .quantity');
                    var newQuantity = parseInt(quantityElement.textContent) + change;
                    quantityElement.textContent = newQuantity;

                    if (newQuantity === 0) {
                        var basketItem = document.querySelector('.basket-item[data-productId="' + productId + '"]');
                        if (basketItem) {
                            basketItem.remove();
                        }
                    }
                }
            }
            xhr.send('product_id=' + productId + '&change=' + change);
            setTimeout(function () {
                window.location.reload();
            }, 20);

        }
        function addQuantity(productId) {
            var productId = productId;
            var isConfirmed = confirm('Add Product to Basket?');
            if (isConfirmed) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../basket/basket_add.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert('Product added to basket!');
                        closeProductModal();

                        var goToBasket = confirm('Proceed to Basket?');
                        if (goToBasket) {
                            $_SESSION["basketID"] = $mainbasketId;
                            window.location.href = '../basket/basket.php';
                        }
                    }
                };
                xhr.send('product_id=' + productId);
            }
            setTimeout(function () {
                window.location.reload();
            }, 20);
        }
    </script>
</body>
<footer class="footer">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
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