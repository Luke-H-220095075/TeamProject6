<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="styles.css">
</head> 
</head>
<body>

<strong><h2>Order History</h2></strong>

<?php
$dsn = "mysql:host=localhost;dbname=furniche";
$username = "root";
$password = "";

//Data Base connection 

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Test with user 1 change once login page is connected
    $userID = 1;
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

    $stmt = $pdo->prepare($sql);
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
