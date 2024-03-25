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
<a href="../index.php" style="color: inherit; text-decoration: none">Furniche </a><i class="fa-solid fa-bars" id="togglebtn"></i>
      
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
    <strong><p1>User Name :  </p1><br></strong> &emsp;
        <i class="fa-solid fa-user" id="user-icon"></i>
        <span>' . $_SESSION['user'] . '</span>
        
    </div>
 ';

} else {
          
   
     
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
            <a href="transactions.php">
            <i class="fa-solid fa-money-bill"></i>
                    <span class="nav-item">Transactions</span>
                </a>

            </li>
            <li>
                <a href="returnsadmin.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item">Return Requests</span>
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
    <br><br>
    <h1>Pending Returns</h1>

    <?php
    include '../connect.php';

    // Retrieve returns from the database
    $sql = "SELECT * FROM itemreturns";
    $stmt = $db->query($sql);
    $returns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Filter returns by Status
    $statusFilter = isset($_GET['status']) ? $_GET['status'] : null;
    $sql = "SELECT * FROM itemreturns";

    if ($statusFilter !== null) {
        $sql .= " WHERE status = :status";
    }

    $stmt = $db->prepare($sql);

    if ($statusFilter !== null) {
        $stmt->bindParam(':status', $statusFilter, PDO::PARAM_STR);
    }

    $stmt->execute();

    $returns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Updates Return Status
    if(isset($_POST['approve'])) {
        $returnId = $_POST['returnId'];
        
        $sql = "UPDATE itemreturns SET status = 'returning' WHERE returnId = :returnId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':returnId', $returnId);
        $stmt->execute();
        
        header('Location: returnsadmin.php');
        exit;
    }
    
    if(isset($_POST['deny'])) {
        $returnId = $_POST['returnId'];
        
        $sql = "UPDATE itemreturns SET status = 'denied' WHERE returnId = :returnId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':returnId', $returnId);
        $stmt->execute();
        
        header('Location: returnsadmin.php');
        exit;
    }

    // Checks if there are returns
    if ($returns) {
    ?>

    <div class="info-table">

        <div class="table-header" style="background-color: #e2b489; padding-top: 10px;">
            <div class="container custom-background">
                <strong><h3>Returns</h3></strong> &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp;

                <div class="row justify-content-end align-items-right">

                    <div class="col-md-1">
                        <div class="input-group mb-3 custom-dropdown-toggle">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">status</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="returnsadmin.php?status=pending">Pending</a>
                                    <a class="dropdown-item" href="returnsadmin.php?status=returning">Returning</a>
                                    <a class="dropdown-item" href="returnsadmin.php?status=returned">Returned</a>
                                    <a class="dropdown-item" href="returnsadmin.php?status=denied">Denied</a>
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
                <th>Product ID</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Explanation</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($returns as $return) { ?>
                <tr>
                    <td><?php echo $return['returnId']; ?></td>
                    <td><?php echo $return['productId']; ?></td>
                    <td><?php echo $return['orderID']; ?></td>
                    <td><?php echo $return['status']; ?></td>
                    <td><?php echo $return['explanation']; ?></td>
                    <td><?php echo $return['price']; ?></td>
                    <td>
                        <form action="returnsadmin.php" method="POST">
                            <input type="hidden" name="returnId" value="<?php echo $return['returnId']; ?>">
                            <button type="submit" name="approve" class="btn btn-primary">Approve</button>
                        </form>
                        <span style='margin-top: 5px;'></span>
                        <form action="returnsadmin.php" method="POST">
                            <input type="hidden" name="returnId" value="<?php echo $return['returnId']; ?>">
                            <button type="submit" name="deny" style= "background-color:#8b0000" class="btn btn-primary">Denied</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
<?php
} else {
    echo '
    <div class="info-table">

        <div class="table-header" style="background-color: #e2b489; padding-top: 10px;">
            <div class="container custom-background">
                <strong><h3>Returns</h3></strong> &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp;

                <div class="row justify-content-end align-items-right">

                    <div class="col-md-1">
                        <div class="input-group mb-3 custom-dropdown-toggle">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">status</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="returnsadmin.php?status=pending">Pending</a>
                                    <a class="dropdown-item" href="returnsadmin.php?status=returning">Returning</a>
                                    <a class="dropdown-item" href="returnsadmin.php?status=returned">Returned</a>
                                    <a class="dropdown-item" href="returnsadmin.php?status=denied">Denied</a>
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
                <th>Product ID</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Explanation</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        </table>
       
        <p1>No returns found</p1>
        
        </div>'
        ;
        
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>

</html>
