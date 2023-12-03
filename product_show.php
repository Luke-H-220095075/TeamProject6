<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="product.css">
</head>
<body>
<?php
$dsn = "mysql:host=localhost;dbname=furniche";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the product ID is provided in the GET request
    if (isset($_GET['product_id'])) {
        $productId = $_GET['product_id'];

        // Fetch product details from the database based on the product ID
        $stmt = $pdo->prepare("SELECT * FROM products WHERE productId = ?");
        $stmt->execute([$productId]);

        if ($stmt->rowCount() > 0) {
            // Display product details
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '<h3>Product Details</h3>';
            echo '<p><strong>Name:</strong> ' . htmlspecialchars($row['productName']) . '</p>';
            echo '<p><strong>Price:</strong> $' . number_format($row['price'], 2) . '</p>';
            echo '<p><strong>Image:</strong> <img src="' . htmlspecialchars($row['imageName']) . '" alt="' . htmlspecialchars($row['imageName']) . '"></p>';
        } else {
            echo '<p>No product found with the given ID</p>';
        }
    } else {
        echo '<p>Product ID not provided</p>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
</body>
</html>
