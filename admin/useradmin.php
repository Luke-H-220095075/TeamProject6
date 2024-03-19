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
                <a href="messages.php">
                    <i class="fa-solid fa-message"></i>
                    <span class="nav-item">Messages</span>
                </a>
                               <!-- <span class="tooltip">Messages</span> -->

            </li>
        </ul>
    </section>

    <?php
include '../connect.php';

  //Insert User
if (!$db) {
    die("Connection failed: " . $db->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = $_POST['admin'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $insertSql = "INSERT INTO users (admin, firstname, surname, address, email, username, phone, password)
                  VALUES (:admin, :firstname, :surname, :address, :email, :username, :phone, :password)";

    $insertStatement = $db->prepare($insertSql);
    $insertStatement->bindParam(':admin', $admin, PDO::PARAM_STR); 
    $insertStatement->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $insertStatement->bindParam(':surname', $surname, PDO::PARAM_STR);
    $insertStatement->bindParam(':address', $address, PDO::PARAM_STR);
    $insertStatement->bindParam(':email', $email, PDO::PARAM_STR);
    $insertStatement->bindParam(':username', $username, PDO::PARAM_STR);
    $insertStatement->bindParam(':phone', $phone, PDO::PARAM_STR);
    $insertStatement->bindParam(':password', $password, PDO::PARAM_STR);

    if ($insertStatement->execute()) {
        echo "User created successfully!";
    } else {
        echo "Error creating user: " . $insertStatement->errorInfo()[2];
    }
}



//Delete a User
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $userIdToDelete = $_GET['delete'];

    try {
        $db->beginTransaction();

        // Delete from orders table 
        $deleteOrdersSql = "DELETE FROM orders WHERE userId = :userId";
        $deleteOrdersStatement = $db->prepare($deleteOrdersSql);
        $deleteOrdersStatement->bindParam(':userId', $userIdToDelete, PDO::PARAM_INT);
        $deleteOrdersStatement->execute();

        // Delete from basketproduct table
        $deleteBasketProductSql = "DELETE FROM basketproducts WHERE basketId IN (SELECT basketId FROM baskets WHERE userId = :userId)";
        $deleteBasketProductStatement = $db->prepare($deleteBasketProductSql);
        $deleteBasketProductStatement->bindParam(':userId', $userIdToDelete, PDO::PARAM_INT);
        $deleteBasketProductStatement->execute();

        // Delete from baskets table
        $deleteBasketsSql = "DELETE FROM baskets WHERE userId = :userId";
        $deleteBasketsStatement = $db->prepare($deleteBasketsSql);
        $deleteBasketsStatement->bindParam(':userId', $userIdToDelete, PDO::PARAM_INT);
        $deleteBasketsStatement->execute();

        // Delete from users table
        $deleteUserSql = "DELETE FROM users WHERE userId = :userId";
        $deleteUserStatement = $db->prepare($deleteUserSql);
        $deleteUserStatement->bindParam(':userId', $userIdToDelete, PDO::PARAM_INT);
        $deleteUserStatement->execute();

    
        $db->commit();
        echo '<div class="success-message">User deleted successfully.</div>';
    } catch (PDOException $e) {
       
        $db->rollBack();
        echo '<div class="error-message">Error deleting user: ' . $e->getMessage() . '</div>';
    }
}


//Pagenation with a limit of 8 rows per page
$limit = 8; 
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
$offset = ($page - 1) * $limit; 

$sql = "SELECT * FROM users LIMIT :limit OFFSET :offset";
$stmt = $db->prepare($sql);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result && $stmt->rowCount() > 0) {


//User Filter Dropdown
$adminFilter = isset($_GET['admin']) ? $_GET['admin'] : null;
$sql = "SELECT * FROM users";

$whereClause = "";
$params = array();

if ($adminFilter !== null) {
    if ($whereClause === "") {
        $whereClause .= " WHERE";
    } else {
        $whereClause .= " AND";
    }
    $whereClause .= " admin = :admin";
    $params[':admin'] = $adminFilter; 
}

$sql .= $whereClause;

$limit = 8;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$sql .= " LIMIT :limit OFFSET :offset";

$stmt = $db->prepare($sql);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
foreach ($params as $param => $value) {
    $stmt->bindParam($param, $value);
}
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result && $stmt->rowCount() > 0) {
    foreach ($result as $row) {
    }
} else {
    echo "<tr><td colspan='9'>No users found.</td></tr>";
}

