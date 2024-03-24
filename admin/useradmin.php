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
        $sql = "SELECT userId FROM users WHERE username ='$username'";
        $result = $db->query($sql);
        $row = $result->fetch();
        $sql = "INSERT INTO baskets (userId, currentUserBasket) VALUES (" . $row["userId"] . ", 1)";
        $db->query($sql);
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


//Search for Users Table


if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $sql = "SELECT * FROM users WHERE firstname LIKE :searchTerm
           OR surname LIKE :searchTerm
           OR address LIKE :searchTerm
           OR email LIKE :searchTerm
           OR username LIKE :searchTerm
           OR phone LIKE :searchTerm";
            

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        foreach ($result as $row) {
        }
    } else {
        echo "No users found.";
    }
}
        ?>


    
<br><br> <h1> Users Admin Dashboard</h1> 
    <div class="create-container">
            <div class="create-form">
    <form action="" method="post">
        <h2>Create User</h2>
        <div class="input-container">
            <select id="admin" name="admin" class="small-dropdown" required>
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="surname" placeholder="Surname" required>
        </div>
        <div class="input-container">
            <input type="text" name="address" placeholder="Address" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-container">
            <input type="tel" name="phone" placeholder="Phone">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit">Create User</button>
    </form>
</div>
    </div>

    
<!-- Display User Details -->
<div class="info-table">

<!-- Header with filter and search-->
<div class="table-header"style="background-color: #e2b489; padding-top: 10px;">
<div class="container custom-background">
<strong><h3>Current Users</h3></strong> &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp;

    <div class="row justify-content-end align-items-right">
   
    <div class="col-md-6">
    <form method="GET" action="">
        <div class="input-group mb-3 custom-search-bar">
            <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="search-button" name="search">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </form>
</div>
       
<div class="col-md-3">
    <div class="input-group mb-3 custom-dropdown-toggle">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User Type</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="useradmin.php?admin=admin">Admin</a>
                <a class="dropdown-item" href="useradmin.php?admin=customer">Customer</a>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>




<table>
<thead>
<tr>
   <th>ID</th>
   <th>User Type</th>
   <th>Name</th>
   <th>Account Age</th>
   <th>Actions</th>
</tr>
</thead>
<tbody>


        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row['userId']; ?></td>
                <td><?php echo $row['admin']; ?></td>
                <td><?php echo $row['firstname'] . ' ' . $row['surname']; ?></td>
                <td><?php 

                    // Calculate account age
                    $dateCreated = new DateTime($row['dateCreated']);
                    $now = new DateTime();
                    $interval = $now->diff($dateCreated);
                    echo $interval->y . ' years, ' . $interval->m . ' months'; 
                ?></td>
                <td>
                    <a href='useradmin.php?delete=<?php echo $row['userId']; ?>' class='delete-icon' title='Delete'>
                        <i class='fa-solid fa-trash'></i>
                    </a>
                    
                    <span style='margin-right: 5px;'></span>
                    <a href="edituser.php?userId=<?php echo $row['userId']; ?>">
                       <i class="fa-solid fa-eye"></i>
                    </a>

                    <span style='margin-right: 5px;'></span>
                    <a href="edituser.php?userId=<?php echo $row['userId']; ?>">
                             <i class="fa-solid fa-pencil"></i>
                            </a>
                    </a>

               </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
            <?php
            $sql = "SELECT COUNT(*) AS total FROM users";
            $stmt = $db->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalPages = ceil($row['total'] / $limit);
            ?>
            <div class="pagination">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<a href='useradmin.php?page=$i'>$i</a> ";
                }
                ?>
            </div>
        <?php
        } else {
            echo "No users found.";
        }
        ?>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
