<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d4aa4c134e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
    <title>ProductDashboard</title>
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
                <a href="enquires.php">
                    <i class="fa-solid fa-message"></i>
                    <span class="nav-item">Messages</span>
                </a>
                               <!-- <span class="tooltip">Messages</span> -->

            </li>
        </ul>

   
    </section>

    
    <br><br><h1> Products Admin Dashboard</h1> 
    <div class="create-container">
            <div class="create-form">
                <form action="" method="post" enctype="multipart/form-data">
                    <h2>Create Product</h2>
                    <div class="input-container">
                        <input type="text" name="productName" placeholder="Product Name" required>
                        <input type="number" name="price" placeholder="Price" step="0.01" required>
                        <input type="number" name="countStock" placeholder="Stock Count" required>  </div>

                
                  
                    <div class="input-container">
                    <input type="text" name="imageName" placeholder="Image Name" required>
                      <label for="imageUpload">Upload Image:</label>
                     <input type="file" id="imageUpload" name="imageUpload" accept="image/*" required>
                </div>

                <div class="input-container">
                    <label for="productCategory">Category:</label> 
                    <select id="productCategory" name="productCategory" class="small-dropdown" required>
                            <option value="modern">Modern</option>
                            <option value="minimal">Minimal</option>
                            <option value="rustic">Rustic</option>
                            <option value="bohemian">Bohemian</option>
                            <option value="tropical">Tropical</option>

                        </select> <label for="productType">Type:</label> 
                        <select id="productType" name="productType" class="small-dropdown" required>
                            <option value="sofa">Sofa</option>
                            <option value="bed">Bed</option>
                            <option value="desk">Desk</option>
                            <option value="chair">Chair</option>
                            <option value="wardrobe">Wardrobe</option>
                        </select>
                    </div>
                    <button type="submit">Create Product</button>
                </form>
            </div>
   
    
            <?php
include '../connect.php';

//Create new product
if (!$db) {
    die("Connection failed: " . $db->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $countStock = $_POST['countStock'];
    $productCategory = $_POST['productCategory'];
    $productType = $_POST['productType'];
    $imageName = $_POST['imageName'];

    $insertSql = "INSERT INTO products (productName, price, countStock, productCategory, productType, imageName)
                  VALUES (:productName, :price, :countStock, :productCategory, :productType, :imageName)";

    $insertStatement = $db->prepare($insertSql);
    $insertStatement->bindParam(':productName', $productName, PDO::PARAM_STR);
    $insertStatement->bindParam(':price', $price, PDO::PARAM_STR);
    $insertStatement->bindParam(':countStock', $countStock, PDO::PARAM_INT);
     $insertStatement->bindParam(':imageName', $imageName, PDO::PARAM_STR);
     $insertStatement->bindParam(':productCategory', $productCategory, PDO::PARAM_STR);
     $insertStatement->bindParam(':productType', $productType, PDO::PARAM_STR);
   

    if ($insertStatement->execute()) {
        echo "Product created successfully!";
    } else {
        echo "Error creating product: " . $insertStatement->errorInfo()[2];
    }
}

