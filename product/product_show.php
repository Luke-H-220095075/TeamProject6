<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
<?php
include '../connect.php';
try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['product_id'])) {
        $productId = $_GET['product_id'];

        $stmt = $db->prepare("SELECT * FROM products WHERE productId = ?");
        $stmt->execute([$productId]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '<h3>Product Details</h3>';
            echo '<p><strong>Name:</strong> ' . htmlspecialchars($row['productName']) . '</p>';
            echo '<p><strong>Price:</strong> $' . number_format($row['price'], 2) . '</p>';
            echo '<p><img src="../Pictures%20for%20website/' . htmlspecialchars($row['imageName']) . '" alt="' . htmlspecialchars($row['imageName']) . '" class="modal-image"></p>';
        } else {
            echo '<p>No product found with the given ID</p>';
        }
    } else {
        echo '<p>Product ID not provided</p>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$db = null;
?>
</body>
</html>
