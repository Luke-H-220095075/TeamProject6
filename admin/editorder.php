<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d4aa4c134e.js" crossorigin="anonymous"></script>
    <title>FurnicheDashboard</title>
</head>

<header>
<span>Furniche <i class="fa-solid fa-bars" id="togglebtn" style="padding-bottom: 4px;"></i></span>

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
<li>
                 <a href="dashboard.php">
                    <i class="fa-solid fa-table-columns"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
               <!-- <span class="tooltip">Dashboard</span> -->
            </li>
            <li>
                <a href="useradmin.php">
                <i class="fa-solid fa-users"></i>
                    <span class="nav-item">Users</span>
                </a>
               <!-- <span class="tooltip">Users</span>-->
            </li>
            <li>
                <a href="productadmin.php">
                    <i class="fa-solid fa-couch"></i>
                    <span class="nav-item">Products</span>
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
            <a href="transactions.php">
            <i class="fa-solid fa-money-bill"></i>
                    <span class="nav-item">Transactions</span>
                </a>

            </li>
            <li>
                <a href="messages.php">
                    <i class="fa-solid fa-message"></i>
                    <span class="nav-item">Messages</span>
                </a>
                               <!-- <span class="tooltip">Messages</span> -->
            </li>
            <li>
          
            <li>
                <a href="pendingrequests.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item">Admin Requests</span>
                </a>
               <!-- <span class="tooltip">Users</span>-->
            </li>
            <li>
                <a href="../index.php">
                    <i class="fa-solid fa-star"></i>
                    <span class="nav-item">View As User</span>
                </a>
                               <!-- <span class="tooltip">mainpage</span> -->

            </li>
        </ul>

   
    </section>

    <h1>Order Admin Dashboard</h1>

    
  
    <?php
    include '../connect.php';
if (isset($_GET['orderId']) && is_numeric($_GET['orderId'])) {
    $orderId = $_GET['orderId'];

    try {
        $stmt = $db->prepare("SELECT * FROM orders WHERE orderId = ?");
        $stmt->execute([$orderId]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($order) {
            function getTotalCount($db, $table, $condition = "") {
                $sql = "SELECT COUNT(*) as count FROM $table $condition";
                $stmt = $db->query($sql);
                
                if ($stmt) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $row['count'];
                } else {
                    return 0;
                }
            }
    
             
            $totalOrders = getTotalCount($db, "orders", "WHERE userId = $order[userId]");
            $totalInquires = getTotalCount($db, "inquiries", "WHERE userId =  $order[userId]");
            $totalPendingOrders = getTotalCount($db, "orders", "WHERE userId =  $order[userId] AND `deliveryStatus` = 'Pending Approval'");
    
?>


<div class="header-details">
                <h2>Order Details</h2>
                <a href="orderadmin.php" class="back-button">Back to Product Admin</a>
               
            </div>

<div class="display-details">
<div class="order-details">
    <p><strong>Order ID:</strong> <?= $order['orderId']; ?></p>
    <p><strong>Basket ID:</strong> <?= $order['basketId']; ?></p>
    <p><strong>User ID:</strong> <?= $order['userId']; ?></p>
    <p><strong>Date Added:</strong> <?= $order['dateAdded']; ?></p>
    <p><strong>Delivery Option:</strong> <?= $order['deliveryOption']; ?></p>
    <p><strong>Delivery Status:</strong> <?= $order['deliveryStatus']; ?></p>
    <p><strong>Delivery Date:</strong> <?= $order['deliveryDate']; ?></p>
    <p><strong>Delivery Notes:</strong> <?= $order['notes']; ?></p>

    <a href='productadmin.php?delete=<?php echo $row['productId']; ?>' class='delete-icon' title='Delete'>
    <button class="delete-button">
    
                    <i class='fa-solid fa-trash'></i> Delete Product
                </button>
        </a>
   </div>

   
   <div class="user-kpis">
                <div class="kpi-box">
                    <i class='fa-solid fa-shopping-cart'></i>
                    <div class="text">
                        <h3>Total Orders</h3>
                        <p><?php echo $totalOrders;  ?></p>
                    </div>
                </div>
                <div class="kpi-box">
                    <i class='fa-solid fa-star'></i>
                    <div class="text">
                        <h3>Total Reviews</h3>
                        <p><?php echo  $totalInquires ; ?></p>
                    </div>
                </div>
                <div class="kpi-box">
                    <i class='fa-solid fa-clock'></i>
                    <div class="text">
                        <h3>Pending Orders</h3>
                        <p><?php echo $totalPendingOrders; ?></p>
                    </div>
                </div>
            </div>
        </div>
</div>


<div class="editproduct-container">
<div class="create-container">
            <div class="create-form">
        <form action="" method="post">
            <div class="input-container">
                <input type="hidden" name="updateOrder" value="true">
                <input type="hidden" name="orderId" value="<?php echo $orderId; ?>"> <!-- Hidden input to store Order ID -->
                <label for="basketId">Basket ID:</label>
                <input type="text" id="basketId" name="basketId" value="<?php echo $order['basketId']; ?>" required>
    
                <label for="userId">User ID:</label>
                <input type="text" id="userId" name="userId" value="<?php echo $order['userId']; ?>" required>
           
                <label for="dateAdded">Date Added:</label>
                <input type="text" id="dateAdded" name="dateAdded" value="<?php echo $order['dateAdded']; ?>" required>
                </div>
            <div class="input-container">
                <label for="deliveryOption">Delivery Option:</label>
                <input type="text" id="deliveryOption" name="deliveryOption" value="<?php echo $order['deliveryOption']; ?>" required>
          
                <label for="deliveryStatus">Delivery Status:</label>
                <input type="text" id="deliveryStatus" name="deliveryStatus" value="<?php echo $order['deliveryStatus']; ?>" required>
            
                <label for="deliveryDate">Delivery Date:</label>
                <input type="text" id="deliveryDate" name="deliveryDate" value="<?php echo $order['deliveryDate']; ?>" required>
            </div>
            <div class="input-container">
            <label for="deliveryDate">Delivery Notes:</label>
                <input type="text" id="notes" name="notes" value="<?php echo $order['notes']; ?>" >
                </div>
            <button type="submit">Update Order</button>
        </form>
    </div>
</div>
        
</div>

<?php
        } else {
            echo '<div class="error-message">Order not found.</div>';
        }
    } catch (PDOException $ex) {
        echo '<div class="error-message">Database error: ' . $ex->getMessage() . '</div>';
    }
} else {
    echo '<div class="error-message">OrderId is missing in the URL.</div>';
}



// Update order details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateOrder'])) {
    if (isset($_POST['orderId']) && is_numeric($_POST['orderId'])) {
        $orderId = $_POST['orderId'];
        $deliveryOption = $_POST['deliveryOption'];
        $deliveryStatus = $_POST['deliveryStatus'];
        $deliveryDate = $_POST['deliveryDate'];
        $notes = $_POST['notes']; // New column for notes

        try {
            $stmt = $db->prepare("UPDATE orders SET `deliveryOption` = ?, `deliveryStatus` = ?, `deliveryDate` = ?, `notes` = ? WHERE `orderId` = ?");
            $stmt->execute([$deliveryOption, $deliveryStatus, $deliveryDate, $notes, $orderId]);
            echo "Order updated successfully.";
        } catch (PDOException $ex) {
            echo "Database error: " . $ex->getMessage();
        }
    } else {
        echo "Error: Order ID is missing or invalid.";
    }
}


