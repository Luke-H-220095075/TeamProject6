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
<a href="../index.php" style="color: inherit; text-decoration: none">Furniche <i class="fa-solid fa-bars" id="togglebtn"></i></a>

<?php
include '../connect.php';
session_start();

 //KPIs for the AdminDashboard
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
// KPI - Total Users
$totalUsers = getTotalCount($db, "users");
// KPI - Total orders
$totalOrders = getTotalCount($db, "orders");
// KPI - Pending Approvals
$totalPending = getTotalCount($db, "orders", "WHERE `deliveryStatus` = 'Pending Approval'");


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

?><li>
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
                <a href="pendingrequests.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item">Approve pending admin requests</span>
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

            <a href="transactions.php">
                    <i class="fa-solid fa-message"></i>
                    <span class="nav-item">Transactions</span>
                </a>

            </li>
            <li>
                <a href="../index.php">
                    <i class="fa-solid fa-star"></i>
                    <span class="nav-item">view as user</span>
                </a>
                               <!-- <span class="tooltip">Messages</span> -->

            </li>
        </ul>

   
    </section>

    <main>
       <br><br> <h1>Welcome Admin! </h1>
        <div class="kpi-section">
    <div class="kpi-container">
        <div class="kpi-box">
        <i class="fa-solid fa-users"></i>
            <div class="text">
                <h3>Total Users</h3>
                <p><?php echo $totalUsers; ?></p>
            </div>
        </div>

        <div class="kpi-box">
        <i class="fa-solid fa-box"></i>
            <div class="text">
                <h3>Total Orders</h3>
                <p><?php echo $totalOrders; ?></p>
            </div>
        </div>

        <div class="kpi-box">
        <i class="fa-solid fa-spinner"></i>
            <div class="text">
                <h3>Total Pending</h3>
                <p><?php echo $totalPending; ?></p>
            </div>
        </div>

        
    </div>
</div>

<div class="charts-section">
 <!--   <div class="charts-box">
    <h2 class="chart-title"> Product Breakdown</h2>
    <div id="bar-chart"></div>
-->
</div>

<div class="charts-box">
    <h2 class="chart-title"> Orders Breakdown</h2>
    <div id="area-chart"></div>
  </div>
</div>
</div>


      


</main>

</div>

<!-- ApexCharts and our own Javascript file -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.46.0/apexcharts.min.js" integrity="sha512-S0o4cCUyDGDTT7LdYR0skjjZ47xBay7KYorwWlevl+/7mADWHZhklWMLvoJprbKALVNpwFacL7VZAgjI3Ga2Rg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="script.js"></script>
</body>
</html>
