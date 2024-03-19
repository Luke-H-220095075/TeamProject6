<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d4aa4c134e.js" crossorigin="anonymous"></script>
    <title>FurnicheDashboard</title>
</head>

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

    
    <h1>Product Admin Dashboard</h1>

    
  
    <?php
    include '../connect.php';
if (isset($_GET['productId']) && is_numeric($_GET['productId'])) {
    $productId = $_GET['productId'];

    try {
        $stmt = $db->prepare("SELECT * FROM products WHERE productId = ?");
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
?>

<div class="header-details">
                <h2>Product Details</h2>
                <a href="productadmin.php" class="back-button">Back to Product Admin</a>
               
            </div>

<div class="display-details">
    <div class="product-details">
    <p><strong>Product ID:</strong> &nbsp;<?= $product['productId']; ?></p>
    <p><strong>Product Name:</strong> &nbsp;<?= $product['productName']; ?></p>
    <p><strong>Product Description:</strong> &nbsp;<?=$product['productDescription'];?></p>
    <p><strong>Price:</strong> &nbsp;$<?= $product['price']; ?></p>
    <p><strong>Category:</strong> &nbsp;<?= $product['productCategory']; ?></p>
    <p><strong>Type:</strong> &nbsp;<?= $product['productType']; ?></p>
    <p><strong>Date Added:</strong> &nbsp;<?= $product['dateAdded']; ?></p>
    <p><strong>Units Sold:</strong> &nbsp;<?= $product['countSold']; ?></p>
    <p><strong>Units in Stock:</strong> &nbsp;<?= $product['countStock']; ?></p>
    <a href='productadmin.php?delete=<?php echo $row['productId']; ?>' class='delete-icon' title='Delete'>
    <button class="delete-button">
    
                    <i class='fa-solid fa-trash'></i> Delete Product
                </button>
        </a>
   </div>

    <div class="product-image">
        <img src="../Pictures for website/<?= $product['imageName']; ?>" alt="<?= $product['productName']; ?>">
    </div>
</div>