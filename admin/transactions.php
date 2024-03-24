<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/d4aa4c134e.js" crossorigin="anonymous"></script>

        <title>FurnicheDashboard</title>
</head>   



<header>
<a href="../index.php" style="color: inherit; text-decoration: none">Furniche <i class="fa-solid fa-bars" id="togglebtn"></i></a>

<?php
include '../connect.php';
session_start();

if(isset($_POST['approve'])) {
    $transactionId = $_POST['transactionId'];
    
    // Update the status in the transactions table to 'approved'
    $sql = "UPDATE transactions SET status = 'approved' WHERE transactionId = :transactionId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':transactionId', $transactionId);
    $stmt->execute();
    
    header('Location: transactions.php');
    exit;
}

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
                <a href="transactions.php">
                    <i class="fa-solid fa-message"></i>
                    <span class="nav-item">Transaction Approvals</span>
                </a>
                               <!-- <span class="tooltip">Messages</span> -->

            </li>
            <li>
                <a href="pendingrequests.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item">Admin Requests</span>
                </a>
               <!-- <span class="tooltip">Users</span>-->
            </li>
            <li>
                <a href="messages.php">
                    <i class="fa-solid fa-message"></i>
                    <span class="nav-item">Messages</span>
                </a>
                               <!-- <span class="tooltip">Messages</span> -->

            </li>
            <li>
                <a href="../index.php">
                    <i class="fa-solid fa-star"></i>
                    <span class="nav-item">View as User</span>
                </a>
                               <!-- <span class="tooltip">Messages</span> -->

            </li>
        </ul>

   
    </section>

    <main>
       <br><br> <h1>Pending Transactions </h1>
    
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="script.js"></script>
</body>
</html>
