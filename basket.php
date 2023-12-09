<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>
    <link rel="stylesheet" href="styles.css">
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
    $stmt = $pdo->prepare("
            SELECT products.productName, products.price, basketproducts.quantity
            FROM basketproducts
            JOIN products ON basketproducts.productId = products.productId
            WHERE basketproducts.basketId = (
                SELECT basketId FROM baskets WHERE userId = :user_id
            )
        ");

    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th>Price</th>';
        echo '<th>Quantity</th>';
        echo '</tr>';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['productName'] . '</td>';
            echo '<td>$' . $row['price'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "<p>Your basket is empty.</p>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

</body>
</html>
