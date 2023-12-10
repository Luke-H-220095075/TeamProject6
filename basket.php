<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>
    <link rel="stylesheet" href="css/basket.css">
</head>
<body>

<h2>Your Basket</h2>

<?php
$dsn = "mysql:host=localhost;dbname=furniche";
$username = "root";
$password = "";

$user_id = 1;

$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $stmtBasket = $pdo->prepare("
            SELECT products.productId, products.productName, products.price, products.imageName, basketproducts.quantity
            FROM basketproducts
            JOIN products ON basketproducts.productId = products.productId
            WHERE basketproducts.basketId = (
                SELECT basketId FROM baskets WHERE userId = :user_id
            )
        ");
    $stmtBasket->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmtBasket->execute();

    if ($stmtBasket->rowCount() > 0) {
        echo '<div class="basket-items">';
        while ($row = $stmtBasket->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="basket-item" data-productId="' . $row['productId'] . '">';
            echo '<div class="item-image"><img src=Pictures for Website/"' . $row['imageName'] . '" alt="' . $row['imageName'] . '"></div>';
            echo '<div class="item-details">';
            echo '<p><strong>' . $row['productName'] . '</strong></p>';
            echo '<p>Price: $' . $row['price'] . '</p>';
            echo '<div class="quantity-controls">';
            echo '<button onclick="adjustQuantity(' . $row['productId'] . ', -1)">-</button>';
            echo '<span> </span><span class="quantity">' . $row['quantity'] . '</span><span> </span>';
            echo '<button onclick="adjustQuantity(' . $row['productId'] . ', 1)">+</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '<a href="product_index.php"><button>Add More Products?</button></a>';

    } else {
        echo "<p>Your basket is empty.</p>";
        echo '<a href="product_index.php"><button>Add Products?</button></a>';

    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

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
        };
        xhr.send('product_id=' + productId + '&change=' + change);
    }
</script>

</body>
</html>
