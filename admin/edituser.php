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
            
session_start();

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
    header('Location: ../loginview.php');
    exit;
     
        }

?>
              <li>
                 <a href="dashboard.php">
                    <i class="fa-solid fa-table-columns"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
               
            </li>
            <li>
                <a href="useradmin.php">
                <i class="fa-solid fa-users"></i>
                    <span class="nav-item">Users</span>
                </a>
               
            </li>
            <li>
                <a href="productadmin.php">
                    <i class="fa-solid fa-couch"></i>
                    <span class="nav-item">Products</span>
                </a>
               
            </li>
            <li>
                <a href="orderadmin.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="nav-item">Orders</span>
                </a>
               
            </li>
            <li>
                <a href="returnsadmin.php">
                    <i class="fa-solid fa-box"></i>
                    <span class="nav-item">Returns</span>
                </a>
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
            </li>
            <li>
          
            <li>
                <a href="pendingrequests.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item">Admin Requests</span>
                </a>
            </li>
            <li>
                <a href="../index.php">
                    <i class="fa-solid fa-star"></i>
                    <span class="nav-item">View As User</span>
                </a>

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

<div class="header-details">
                <h2>User Details</h2>
                <a href="useradmin.php" class="back-button">Back to User Admin</a>
               
            </div>
       <div class="display-details" style="margin-left: 415px;">
            
            <div class="user-details">
            <p><strong>User ID:</strong> &nbsp;<?php echo $userDetails['userId']; ?></p>
            <p><strong>User Type:</strong>&nbsp; <?php echo $userDetails['admin']; ?></p>
            <p><strong>First Name:</strong> &nbsp;<?php echo $userDetails['firstname']; ?></p>
            <p><strong>Surname:</strong> &nbsp;<?php echo $userDetails['surname']; ?></p>
            <p><strong>Address:</strong> &nbsp;<?php echo $userDetails['address']; ?></p>
            <p><strong>Email:</strong>&nbsp; <?php echo $userDetails['email']; ?></p>
            <p><strong>Username:</strong> &nbsp;<?php echo $userDetails['username']; ?></p>
            <p><strong>Phone:</strong> &nbsp;<?php echo $userDetails['phone']; ?></p>
            <p><strong>Date Created:</strong>&nbsp; <?php echo $userDetails['dateCreated']; ?></p>
            <a href='useradmin.php?delete=<?php echo $userId; ?>' class='delete-icon' title='Delete'>               
             <button class="delete-button">
                    <i class='fa-solid fa-trash'></i> Delete User
                </button>
                </a>
               
            </div>

            
            <div class="user-kpis">
                <div class="kpi-box">
                    <i class='fa-solid fa-shopping-cart'></i>
                    <div class="text">
                        <h3>Total Orders</h3>
                        <p><?php echo $totalOrders; ?></p>
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

        
        <div class="header-details">
        &nbsp;&nbsp;   <h2>Edit User Details</h2>
               
            </div>
            <div class="edituser-container">
        <div class="create-container">
            <div class="create-form">
<form action="" method="post">
    <div class="input-container">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>"> <!-- Hidden input to store UserID -->
        <select id="admin" name="admin" class="small-dropdown" required>
            <option value="customer" <?php echo ($userDetails['admin'] == 'customer') ? 'selected' : ''; ?>>Customer</option>
            <option value="admin" <?php echo ($userDetails['admin'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
        </select>
        <input type="text" name="firstname" placeholder="First Name" value="<?php echo $userDetails['firstname']; ?>" required>
        <input type="text" name="surname" placeholder="Surname" value="<?php echo $userDetails['surname']; ?>" required>
    </div>
    <div class="input-container">
        <input type="text" name="address" placeholder="Address" value="<?php echo $userDetails['address']; ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo $userDetails['email']; ?>" required>
        <input type="text" name="username" placeholder="Username" value="<?php echo $userDetails['username']; ?>" required>
    </div>
    <div class="input-container">
        <input type="tel" name="phone" placeholder="Phone" value="<?php echo $userDetails['phone']; ?>">
        <input type="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit">Update User</button>
</form>
    </div>
    </div>
    </div>
<?php
    } else {
        echo "User not found";
    }
} else {
    echo "User ID not provided";
}


//Delete user button
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
//Update User Details
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_POST['userId'];
        $admin = $_POST['admin'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
    
        $stmt = $db->prepare("UPDATE users SET admin=?, firstname=?, surname=?, address=?, email=?, username=?, phone=?, password=? WHERE userId=?");
        $stmt->execute([$admin, $firstname, $surname, $address, $email, $username, $phone, $password, $userId]);
    }
    
    $userId = $_GET['userId'];
    $stmt = $db->prepare("SELECT * FROM users WHERE userId = ?");
    $stmt->execute([$userId]);
    $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    
    


?>

    <script src="script.js"></script>
</body>
</html>