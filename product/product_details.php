<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/style.css">
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
                <a href="products.php">Products</a>
                <a href="../contactview.php">Contact Us</a>
                <a href="aboutus.php">About Us</a>
            <a href="loginview.php">Login</a>
            <a href="basket.php"><i class="fa-solid fa-basket-shopping"></i></a>
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
<div class="product-details">
<body>
<?php
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    include '../connect.php';

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Calling the product details from the database
    try {
        $stmt = $db->prepare("SELECT * FROM products WHERE productId = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '<div class="card">';
            echo '<div class="image-details">';
            echo '<p><img src="../Pictures%20for%20website/' . htmlspecialchars($row['imageName']) . '" alt="' . htmlspecialchars($row['imageName']) . '"></p>';
            echo '</div>';
            echo '<div class="info">';
            echo '<h2>' . $row['productName'] . '</h2>';
            echo '<p><strong>Price:</strong> $' . $row['price'] . '</p>';
            echo '<p><strong>Category:</strong> ' . $row['productCategory'] . '</p>';
            echo '<p><strong>Type:</strong> ' . $row['productType'] . '</p>';
            echo '<p><strong>Release Date/Time:</strong> ' . $row['dateAdded'] . '</p>';
            echo '<p><strong>Amount in Stock:</strong> ' . $row['countStock'] . '</p>';
            echo '<p><strong>Amount Sold:</strong> ' . $row['countSold'] . '</p>';
            echo '</div>';
            echo '<h3>Recommendations</h3>';
            $stmtRecommendations = $db->prepare("SELECT * FROM products WHERE productId != :product_id ORDER BY RAND() LIMIT 4");
            $stmtRecommendations->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmtRecommendations->execute();
            echo '<div class="recommendations">';
            while ($recommendation = $stmtRecommendations->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="recommendation-card">';
                echo '<div class="card">';
                echo '<p><img src="../Pictures%20for%20website/' . htmlspecialchars($recommendation['imageName']) . '" alt="' . htmlspecialchars($row['imageName']) . '" style="width:500px;height:600px;></p>';
                echo '</div>';
                echo '<h4>' . $recommendation['productName'] . '</h4>';
                echo '<p><strong>Price:</strong> $' . $recommendation['price'] . '</p>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        } else {
            echo "<p>Product not found.</p>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
} else {
    echo "<p>No product ID provided.</p>";
}
?>
</div>
<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "30px 10px";
            document.getElementById("logo").style.fontSize = "25px";
        } else {
            document.getElementById("navbar").style.padding = "80px 10px";
            document.getElementById("logo").style.fontSize = "35px";
        }
    }
</script>
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
</html>