<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/history.css">
  <title>Furniche - Previous Orders</title>
  <link rel="stylesheet" href="css/contact.css">

  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    </section

  <body>
    <br>
    <br>
    <br>
    <br>
    <strong>
      <h2>Order History</h2>
    </strong>
    <br>
    <br>
    <?php
    include 'connect.php';
    try {
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // I tested with user 1, change once login page is connected 
      $userID = $_SESSION["userID"];
      $ordersPerPage = 6; // limit to six order viewed per page

      // Sort the previous orders by newest and oldest dates ordered and those that have no been delivered yet
      $sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'newest_order';
      $sorting = '';
      switch ($sortOption) {
        case 'newest_order':
          $sorting = 'ORDER BY o.dateAdded DESC';
          break;
        case 'oldest_order':
          $sorting = 'ORDER BY o.dateAdded ASC';
          break;
        case 'not_delivered':
          $sorting = 'ORDER BY COALESCE(o.deliveryDate > CURDATE(), 0) DESC, o.deliveryDate ASC';
          break;
        default:
          $sorting = 'ORDER BY o.dateAdded DESC';
          break;
      }

      $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
      $offset = ($page - 1) * $ordersPerPage;

      //SQL code needed to do the get the product count
      $sql = "SELECT o.orderId, o.dateAdded, o.deliveryDate, b.basketId, COUNT(b.productId) AS itemCount
            FROM orders o
            JOIN basketproducts b ON o.basketId = b.basketId
            WHERE o.userId = ?
            GROUP BY o.orderId
            $sorting
            LIMIT $offset, $ordersPerPage";

      $stmt = $db->prepare($sql);
      $stmt->execute([$userID]);

      // code needed for drop down and the submit button
      echo "<form method='get'>";
      echo "<div style='text-align: center;'>";
      echo "<label for='sort'>Sort by:</label>";
      echo "<select name='sort' id='sort'>";
      $options = [
        'newest_order' => 'Newest Order',
        'oldest_order' => 'Oldest Order',
        'not_delivered' => 'Not Delivered',
      ];
      foreach ($options as $key => $label) {
        $selected = ($key === $sortOption) ? 'selected' : '';
        echo "<option value='$key' $selected>$label</option>";
      }
      echo "</select>";
      echo "<input type='submit' value='Sort'>";
      echo "</form>";

      //Container for the orders and image of order
      if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='order-container'>";
          echo "<img class='order-image' src='Pictures%20for%20website/orderimage.jpg' alt='Order Image'>";
          echo "<div>";
          echo "<p><strong>Order ID:</strong> " . $row["orderId"] . "</p>";
          echo "<p><strong>Items Ordered:</strong> " . $row["itemCount"] . "</p>";
          echo "<p><strong>Date Ordered:</strong> " . $row["dateAdded"] . "</p>";
          echo "<p><strong>Date Delivered:</strong> " . ($row["deliveryDate"] ? $row["deliveryDate"] : "Not delivered yet") . "</p>";
          echo "</div>";
          echo "</div>";

          echo "<div class='order-buttons'><form method='post'>";
          include_once "availability.php";
          if (availability($db, $row["basketId"])) {
            echo "<button class='order-again-button  method='post' name='purchase' type='submit'>Order Again</button>";
            if (isset($_POST['purchase'])) {
              $_SESSION["basketID"] = $row["basketId"];
              header('Location: checkout.php');
            }
          } else {
            echo "<p>currently unavailable available</p>";
          }
          echo "<button class='view-details-button' onclick='location.href=\"view_order.php?orderId=" . $row["orderId"] . "\"'>View Details</button>";
          echo "</form></div>";
        }
      } else {
        echo "<p>No results</p>";
      }

      // Determines how many pages are required with the 6 order per page limit

      $totalOrdersSql = "SELECT COUNT(DISTINCT o.orderId) AS totalOrders
   FROM orders o
   JOIN basketproducts b ON o.basketId = b.basketId
   WHERE o.userId = ?";
      $totalOrdersStmt = $db->prepare($totalOrdersSql);
      $totalOrdersStmt->execute([$userID]);
      $totalOrders = $totalOrdersStmt->fetchColumn();

      $totalPages = ceil($totalOrders / $ordersPerPage);

      // Creation of pages and page numbers
      echo "<div class='pagination'>";
      for ($pageNum = 1; $pageNum <= $totalPages; $pageNum++) {
        $activeClass = ($pageNum == $page) ? 'active' : '';
        $specialClass = ($pageNum <= 2) ? 'special-page' : '';
        echo "<a class='button $activeClass $specialClass' href='?page=$pageNum&sort=$sortOption'>$pageNum</a>";
      }
      echo "</div>";

      // Recommendations of products based of previous purchases
      $recommendationSql = "SELECT p.productName, p.imageName
FROM products p
JOIN basketproducts b ON p.productId = b.productId
JOIN orders o ON b.basketId = o.basketId
WHERE o.userId = ?
LIMIT 6"; //amount of recommendations

      $recommendationStmt = $db->prepare($recommendationSql);
      $recommendationStmt->execute([$userID]);

      echo "<div class='recommendations-title'>Recommendations</div>";

      if ($recommendationStmt->rowCount() > 0) {
        echo "<div class='recommendations'>";
        while ($recommendationRow = $recommendationStmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='recommendation-item'>";
          echo "<img src='Pictures%20for%20website/" . htmlspecialchars($recommendationRow['imageName']) . "' alt='" . htmlspecialchars($recommendationRow['imageName']) . "'>";
          echo "<p>" . htmlspecialchars($recommendationRow['productName']) . "</p>";
          echo "</div>";
        }
        echo "</div>";
      }


      //Create new review form 

      echo "<div class='review-form-container'>";
      echo "<h2 style='color: #3e2723;'>Leave Review</h2>";
      echo "<form method='post'>";
      echo "<label for='order_id'>Order ID:</label>";
      echo "<input type='number' name='order_id' id='order_id' required>";
      echo "<label for='rating'>Rating:</label>";
      echo "<select name='rating' id='rating' required>";
      for ($i = 1; $i <= 5; $i++) {
        echo "<option value='$i'>$i</option>";
      }
      echo "</select>";
      echo "<label for='description'>Review:</label>";
      echo "<textarea name='description' id='description' rows='3' required></textarea>";
      echo "<input type='submit' name='review' value='Submit Review'>";
      echo "</form>";
      echo "</div>";

      // Previous Reviews from user
      $reviewSql = "SELECT r.orderId, r.reviewDate, r.rating, r.description
  FROM orderreviews r
  JOIN orders o ON r.orderId = o.orderId
  WHERE o.userId = ?
  ORDER BY r.reviewDate DESC
  LIMIT $offset, $ordersPerPage";

      $reviewStmt = $db->prepare($reviewSql);
      $reviewStmt->execute([$userID]);

      echo "<div class='user-reviews-container'>";
      echo "<h2 style='color: #3e2723;'>Your Reviews</h2>";

      if ($reviewStmt->rowCount() > 0) {
        while ($reviewRow = $reviewStmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='user-review-item'>";
          echo "<div class='review-details'>";
          echo "<p><strong>Order ID:</strong> " . $reviewRow["orderId"] . "</p>";
          echo "<p><strong>Review Date:</strong> " . $reviewRow["reviewDate"] . "</p>";
          echo "<p><strong>Rating:</strong> " . $reviewRow["rating"] . "</p>";
          echo "<p><strong>Description:</strong> " . $reviewRow["description"] . "</p>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<p>No reviews available.</p>";
      }

      //limites the amount of reviews per page similar to previous orders
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['review'])) {
          $orderId = $_POST['order_id'];
          $rating = $_POST['rating'];
          $description = $_POST['description'];
          $insertReviewSql = "INSERT INTO orderreviews (orderId, rating, description) VALUES (?, ?, ?)";
          $insertReviewStmt = $db->prepare($insertReviewSql);
          $insertReviewStmt->execute([$orderId, $rating, $description]);
        }
      }

      $totalReviewsSql = "SELECT COUNT(r.reviewId) AS totalReviews
                    FROM orderreviews r
                    JOIN orders o ON r.orderId = o.orderId
                    WHERE o.userId = ?";
      $totalReviewsStmt = $db->prepare($totalReviewsSql);
      $totalReviewsStmt->execute([$userID]);
      $totalReviews = $totalReviewsStmt->fetchColumn();

      $totalReviewsPages = ceil($totalReviews / $ordersPerPage);



      echo "</div>";
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    } finally {
      $db = null;
    }

    ?>
    <script>
      //js needed to order the items from an order again
      function orderAgain(orderId) {
        // Redirects users to the order page with the selected order ID
        window.location.href = 'order_page.php?orderId=' + orderId;
      }
    </script>

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
  </body>

</html>