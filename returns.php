<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/returns.css">
  <title>Furniche - Previous Orders</title>

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

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
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
  <div class="container">
    <br>
    <br>
    <h1>Returning Orders</h1>
    <div class="section">
      <h2>Why are you returning this item?</h2>
      <?php
      include ("connect.php");
      echo '<form class="contact-formm" method="post">';
      if (isset ($_SESSION['userID'])) {
        
        $stmtBasket = $db->prepare("
      SELECT deliveryDate, basketId
      FROM orders
      WHERE userId = :userID
      ");
        $stmtBasket->bindParam(':userID', $_SESSION['userID']);
        $stmtBasket->execute();
        $ordnum = 0;
        if ($stmtBasket->rowCount() > 0) {
          while ($row = $stmtBasket->fetch(PDO::FETCH_ASSOC)) {
            if (isset($ordbasket)){
            array_push($ordname,"delivered: ".$row["deliveryDate"]);
            array_push($ordbasket, $row["basketId"]);
            }else{
            $ordname = array("delivered: ".$row["deliveryDate"]);
            $ordbasket = array($row["basketId"]);
            }
            $ordnum++;
          }
        }
      }
      echo "<label for='orderid'>date delivered:</label>";
      echo "<select name='orderid' id='orderid' onChange='doReload(this.value);'>";
      for ($i = 0; $i < $ordnum; $i++) {
        echo "<option value=$ordbasket[$i]>$ordname[$i]</option>";
      }
      echo "</select>";
          $stmtproduct = $db->prepare("
        SELECT products.productId, products.productName, products.price
        FROM basketproducts JOIN products ON products.productId = basketproducts.productId
        WHERE basketId = :basketId
    ");
          $stmtproduct->bindParam(':basketId', $_GET['orderid']);
          $stmtproduct->execute();
          $prodnum = 0;
          
          if ($stmtproduct->rowCount() > 0) {
            while ($row = $stmtproduct->fetch(PDO::FETCH_ASSOC)) {
              if (isset($prodname)){
                array_push($prodname, $row["productName"]);
                array_push($prodprice, $row["price"]);
                }else{
                $prodname = array($row["productName"]);
                $prodprice = array($row["price"]);
                }
              $prodnum++;
              
            }
            
          }
      echo "<label for='productid'>productid:</label>";
      echo "<select name='productid' id='productid'>";
      for ($i = 0; $i < $prodnum; $i++) {
        echo "<option value='$prodprice[$i]'>$prodname[$i]</option>";
        }
      echo "</select>";
      echo '<label for="reason">reason:</label><br>';
      echo '<textarea id="reason" name="reason" rows="5" cols="50"></textarea><br><br>';
      if (isset ($_SESSION['userID'])) {
        echo '<button type="submit" name="submitted" id="submit-btn">Submit</button>';
      } else {
        echo '<a href="loginview.php" id="submit-btn" style="text-decoration: none">Please log in to return orders.</a>';
      }
      echo '</form>';

      
      if (isset ($_POST["submitted"])) {
        try {
          $sth = $db->prepare("INSERT INTO itemReturns(productId, orderId, explanation, price) VALUES (:productid, :orderid, :explanation, :price)");
          $sth->bindparam(':productid', $_POST['productid'], PDO::PARAM_STR, 64);
          $sth->bindparam(':orderid', $_POST['orderid'], PDO::PARAM_STR, 64);
          $sth->bindparam(':explanation', $_POST['reason'], PDO::PARAM_STR, 64);
          $sth->bindparam(':price', $_POST['productid'], PDO::PARAM_STR, 64);
          $sth->execute();
        } catch (PDOException $ex) {
          ?>
          <p>Sorry, a database error occurred.
          <p>
          <p>Error details: <em>
              <?= $ex->getMessage() ?>
            </em></p>
          <?php
        }
      }
      ?>
    </div>
    <script>
      var i;
      for (i = 0; i < 2; i++) {
        document.write("<br>");
      }
      function doReload(orderid){
	    document.location = 'returns.php?orderid=' + orderid;
};
    </script>
  </div>
  </div>
  <div class="section">
    <h2>Process of Returning</h2>
    <ol>
      <li>Contact Customer Service</li>
      <li>Request Return Merchandise Authorization (RMA) Number</li>
      <li>Package the Item</li>
      <li>Ship the Item</li>
      <li>Receive Refund</li>
    </ol>
  </div>
  <div class="section">
    <h2>Return Processing Time</h2>
    <p>Please allow 7-10 business days for the return process to be completed from the time we receive the returned
      item.</p>
  </div>
  </div>
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
</body>
</html>