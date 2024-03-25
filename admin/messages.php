<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d4aa4c134e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <title>User messages</title>
</head>
<header>
<span>Furniche <i class="fa-solid fa-bars" id="togglebtn"></i></span>

<?php
include '../connect.php';
session_start();

?>

      
        </div>
        </header>

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
    <body>
    <br>
    <br>
    <div class="info-table">

<!-- Header with filter and search-->
<div class="table-header"style="background-color: #e2b489; padding-top: 10px;">
<div class="container custom-background">
<br><br><h3>Messages</h3> &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp;

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
</div>
</div>
</div>

    <table>
<tbody>
    <?php 
//display users to approve
include("../model/ViewMessages.php");
$messages = new ViewMessages();
$messages->viewMessages();
// $displayUsers = $messages->users;
if(count($messages->messages) == 0){
echo 'No messages';
}
foreach ($messages->messages as $msg) {
    echo '<td><h3>'.$msg->username.'</h3></td>';
    echo '<td><h3>'.$msg->subject.'</h3></td>';
    echo '<td><h3>'.$msg->messagetext.'</h3></td>';
    echo '<td><h3>'.$msg->email.'</h3></td>';
    
    echo '<form method="post">';
    echo '<input type="hidden" name="id" value="'.$msg->id.'"/input>';
    echo '<td><button type="submit" name="reply" style="cursor: pointer; width: 100%; display: inline">Mark as replied</button></td>';
    echo '</form>';
    
 }
    
    if(isset($_POST['reply'])){
        $message = new Message($_POST['id'], null, null, null, null);
        if($message->reply()){
            header('Location: messages.php');
        }
        else{
        echo 'A problem occured, please try again later';
        }
    }
 ?>
</tbody>
</table>
 
</body>