<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
    <script src="https://kit.fontawesome.com/d4aa4c134e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>

<header>
<span>Furniche <i class="fa-solid fa-bars" id="togglebtn"></i></span>
<?php
include '../connect.php';
session_start();

        ?>
        </div>
        </header>
<body>
<section id="sidebar">
        <ul class="side-menu top">
            <div class="logo">
            </div>
           
            <li class="active">
            <?php

if (isset($_SESSION['user'])) {
    echo '
    <div class="user-info">
    <strong><p1>User Name :  </p1><br></strong> 
        <i class="fa-solid fa-user" id="user-icon"></i>
        <span>' . $_SESSION['user'] . '</span>
        <div class="dropdown-content" id="user-dropdown">
            <a href="#">Profile</a>
            <a href="#">Logout</a>
        </div>
    </div>
 ';

} else {
          
            //Lucky add the code to instrust users to login and redirect users back to login page
     
        }

?>

<a href="dashboard.php">
                    <i class="fa-solid fa-table-columns"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
               <!-- <span class="tooltip">Dashboard</span> -->
            </li>
            <li>
                <a href="useradmin.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item">Users</span>
                </a>
               <!-- <span class="tooltip">Users</span>-->
            </li>
            <li>
                <a href="productadmin.php">
                    <i class="fa-solid fa-couch"></i>
                    <span class="nav-item">Inventory</span>
                </a>
               <!-- <span class="tooltip">Products</span>-->
            </li>
            <li>
                <a href="orderadmin.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="nav-item">Orders</span>
                </a>
               <!-- <span class="tooltip">Orders</span> -->
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-message"></i>
                    <span class="nav-item">Messages</span>
                </a>
                               <!-- <span class="tooltip">Messages</span> -->

            </li>
        </ul>

   
    </section>
    <br><br><h1> Orders Admin Dashboard</h1> 

    

    <?php
include '../connect.php';

function fetchRecentOrders($db) {
    try {
        $sql = "SELECT * FROM orders ORDER BY dateAdded DESC LIMIT 10";
        $stmt = $db->query($sql);
        
        if ($stmt) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    } catch (PDOException $ex) {
        echo "Error fetching recent orders: " . $ex->getMessage();
        return false;
    }
}


//Change colour of Delivery Status

function getStatusClass($deliveryStatus) {
    switch ($deliveryStatus) {
        case 'Delivered':
            return 'status-delivered';
        case 'Currently Delivering':
            return 'status-delivering';
        case 'Dispatching':
            return 'status-dispatching';
        case 'Pending Approval':
            return 'status-pending';
        default:
            return '';
    }
}


$statusFilter = isset($_GET['deliveryStatus']) ? $_GET['deliveryStatus'] : null;

$sql = "SELECT * FROM orders";

if ($statusFilter !== null) {
$sql .= " WHERE deliveryStatus = :deliveryStatus";
}

$limit = 8;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$sql .= " LIMIT :limit OFFSET :offset";

$stmt = $db->prepare($sql);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
if ($statusFilter !== null) {
$stmt->bindParam(':deliveryStatus', $statusFilter, PDO::PARAM_STR);
}
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($orders && $stmt->rowCount() > 0) {
foreach ($orders as $order) {
}

} else {
echo "<tr><td colspan='8'>No orders found.</td></tr>";
}
