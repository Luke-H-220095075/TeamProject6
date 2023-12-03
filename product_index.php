<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="product.css">
</head>
<body>
<?php
$dsn = "mysql:host=localhost;dbname=furniche";
$username = 'root';
$password = '';
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM products");

    if ($stmt->rowCount() > 0) {
        echo '<table>';
        $count = 0; // Counter for products in the current row

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Start a new row for every two products
            if ($count % 3 == 0) {
                echo '<tr>';
            }

            echo '<td>';
            echo '<strong>Name:</strong> ' . htmlspecialchars($row['productName']) . '<br>';
            echo '<strong>Price:</strong> $' . number_format($row['price'], 2) . '<br>';
            echo '<strong>Image:</strong> <img src="' . htmlspecialchars($row['imageName']) . '" alt="' . htmlspecialchars($row['imageName']) . '" class="product-image">';
            echo '<br><button onclick="showProductModal(' . $row['productId'] . ')">View Details</button>';
            echo '</td>';

            // End the row for every two products
            if ($count % 3 == 2 || $count == $stmt->rowCount() - 1) {
                echo '</tr>';
            }

            $count++;
        }

        echo '</table>';
    } else {
        echo "<p>No products available</p>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeProductModal()">&times;</span>
        <div id="productDetailsModal"></div>
    </div>
</div>

<script>
    function showProductModal(productId) {
        var modal = document.getElementById('productModal');
        var productDetailsContainer = document.getElementById('productDetailsModal');

        // Send an AJAX request to retrieve product details
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display the product details in the modal
                productDetailsContainer.innerHTML = xhr.responseText;
                modal.style.display = 'block';
            }
        };
        xhr.open('GET', 'product_show.php?product_id=' + productId, true);
        xhr.send();
    }

    function closeProductModal() {
        var modal = document.getElementById('productModal');
        modal.style.display = 'none';
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function (event) {
        var modal = document.getElementById('productModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
</script>
</body>
</html>