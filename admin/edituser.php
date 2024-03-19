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
<span>Furniche <i class="fa-solid fa-bars" id="togglebtn"></i></span>
        </header>
<body>
    <section id="sidebar">
        <ul class="side-menu top">
            <div class="logo">
            </div>
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
            <li class="active">
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
                <a href="#">
                    <i class="fa-solid fa-message"></i>
                    <span class="nav-item">Messages</span>
                </a>
                               <!-- <span class="tooltip">Messages</span> -->

            </li>
        </ul>
    </section>

    <h1>User Admin Dashboard</h1>

<?php
include "../connect.php";

    //User KPIs
if (isset($_GET['userId'])) {  $userId = $_GET['userId'];

    $sql = "SELECT * FROM users WHERE userId = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$userId]);
    $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userDetails) {
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

            $totalOrders = getTotalCount($db, "orders", "WHERE userId = $userId");
            $totalInquires = getTotalCount($db, "inquiries", "WHERE userId = $userId");
            $totalPendingOrders = getTotalCount($db, "orders", "WHERE userId = $userId AND `deliveryStatus` = 'Pending Approval'");
    
?>