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

    <main>
       <br><br> <h1>Pending Transactions </h1>
    
       <?php
include '../connect.php';


// Retrieve transactions from the database
$sql = "SELECT * FROM transactions";
$stmt = $db->query($sql);
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Filter transactions by Status
$statusFilter = isset($_GET['status']) ? $_GET['status'] : null;
$sql = "SELECT * FROM transactions";

if ($statusFilter !== null) {
    $sql .= " WHERE status = :status";
}

$stmt = $db->prepare($sql);

if ($statusFilter !== null) {
    $stmt->bindParam(':status', $statusFilter, PDO::PARAM_STR);
}

$stmt->execute();

$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if there are transactions
if ($transactions) {
?>
 
    <div class="info-table">

    <div class="table-header"style="background-color: #e2b489; padding-top: 10px;">
<div class="container custom-background">
<strong><h3>Transactions</h3></strong> &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp;

    <div class="row justify-content-end align-items-right">
   
    <div class="col-md-1">
    <div class="input-group mb-3 custom-dropdown-toggle">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >status</button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="transactions.php?status=pending">Pending</a>
                <a class="dropdown-item" href="transactions.php?status=approved">Approved</a>
             
  
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
                    <th>Order ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Card Details</th>
                    <th>Transaction Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction) { ?>
                    <tr>
                        <td><?php echo $transaction['transactionId']; ?></td>
                        <td><?php echo $transaction['orderId']; ?></td>
                        <td><?php echo $transaction['amount']; ?></td>
                        <td><?php echo $transaction['status']; ?></td>
                        <td><?php echo $transaction['cardDetails']; ?></td>
                        <td><?php echo $transaction['transactionDate']; ?></td>
                        <td>
                        <form action="transactions.php" method="POST">
    <input type="hidden" name="transactionId" value="<?php echo $transaction['transactionId']; ?>">
    <button type="submit" name="approve" class="btn btn-primary">Approve</button>
</form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php
} else  {
    echo'
    <div class="info-table">

    <div class="table-header"style="background-color: #e2b489; padding-top: 10px;">
<div class="container custom-background">
<strong><h3>Transactions</h3></strong> &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp;

    <div class="row justify-content-end align-items-right">
   
    <div class="col-md-1">
    <div class="input-group mb-3 custom-dropdown-toggle">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >status</button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="transactions.php?status=pending">Pending</a>
                <a class="dropdown-item" href="transactions.php?status=approved">Approved</a>
             
  
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
                    <th>Order ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Card Details</th>
                    <th>Transaction Date</th>
                    <th>Action</th>
                </tr>
            </thead>
           
        </table>
        <P1> No Transactions Found. </P1>
    </div>';
}


?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="script.js"></script>
</body>
</html>
