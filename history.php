<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/history.css">
    <title>Furniche - Previous Orders</title>
</head>
<div class="colour">
  <header>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
  </header>
</div>
<section>
  <div class="topnav">
      <nav>
          <h1 class="logo">Furniche</h1>
          <ul>
          <li><a href="index.php">Home</a></li>
                <li><a href="product/products.php">Products</a></li>
                <li><a href="history.php">Previous Orders</a></li>
                <li><a href="contactview.php">Contact Us</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <?php
                session_start();
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="customerprofile.php">' . $_SESSION['user'] . '</a>';
                    echo '<li><a href="basket/basket.php">Basket</a></li>';
                }else {
                    echo '<li><a href="signup/signUpPage.php">Sign up</a></li>';
                    echo '<li><a href="loginview.php">Login</a></li>';
                }
                ?>
          </ul>
       </nav>
  </div>
</section>
<body>

<strong><h2>Order History</h2></strong>

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
    $sql = "SELECT o.orderId, o.dateAdded, o.deliveryDate, COUNT(b.productId) AS itemCount
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

            echo "<div class='order-buttons'>";
            include "availability.php";
            if (availability($db, $row["orderId"])) {
              echo "<button  class='order-again-button  method='post' name='purchase' type='submit'>Order Again</button>";
              if (isset($_post["purchase"])){
                $basketId = $row["orderId"];
                header('Location: checkout.php');
              }
            } else {
              echo "<p>currently unavailable available</p>";
            }
            echo "<button class='  ' onclick='location.href=\"view_order.php?orderId=" . $row["orderId"] . "\"'>View Details</button>";
            echo "</div>";

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