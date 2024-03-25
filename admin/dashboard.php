<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script src="https://kit.fontawesome.com/d4aa4c134e.js" crossorigin="anonymous"></script>

        <title>FurnicheDashboard</title>
</head>   



<header>
<a href="../index.php" style="color: inherit; text-decoration: none">Furniche</a> <i class="fa-solid fa-bars" id="togglebtn"></i>

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


?>                  <li>
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




<h2 style="margin-left: 340px; margin-top: 20px">Number of Products Sold 2023</h2>
<div class="chart-container" style="margin-left: 310px; width:1195px; height:1000px"> 
   <br />
   <div id="chart" style="background: #f3f4f6; border-radius: 20px;"></div>
</div>

<?php
require_once('../connect.php');

$chart_data = '';

try {
    $sql = "SELECT DATE_FORMAT(orders.dateAdded, '%b') AS month_name,
            SUM(basketproducts.quantity) AS total_items_sold
            FROM orders
            INNER JOIN basketproducts ON orders.basketId = basketproducts.basketId
            WHERE YEAR(orders.dateAdded) = 2023
            GROUP BY MONTH(orders.dateAdded)
            ORDER BY MONTH(orders.dateAdded)";
    
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $chart_data .= "{ month: '" . $row["month_name"] . "', total_items_sold: " . $row["total_items_sold"] . " }, ";
    }

    $chart_data = rtrim($chart_data, ", ");
} catch (PDOException $ex) {
    echo "Error: " . $ex->getMessage();
}

?>

<script>
Morris.Area({
    element: 'chart',
    data: [<?php echo $chart_data; ?>],
    xkey: 'month', 
    ykeys: ['total_items_sold'], 
    labels: ['Total Items Sold'], 
    parseTime: false,
    hideHover: 'auto',
    resize: true,
    behaveLikeLine: true,
    lineColors: ['#FF5733'] 
});
</script>
</div>


<!-- Charts and our own Javascript file -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.46.0/apexcharts.min.js" integrity="sha512-S0o4cCUyDGDTT7LdYR0skjjZ47xBay7KYorwWlevl+/7mADWHZhklWMLvoJprbKALVNpwFacL7VZAgjI3Ga2Rg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="script.js"></script>
</body>
</html>
