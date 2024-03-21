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
            <li>
                <a href="../index.php">
                    <i class="fa-solid fa-star"></i>
                    <span class="nav-item">view as user</span>
                </a>
                               <!-- <span class="tooltip">mainpage</span> -->

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


<div class="editproduct-container">
<div class="create-container">
            <div class="create-form">
<form action="" method="post" enctype="multipart/form-data">
    <div class="input-container">
                    <input type="hidden" name="updateProduct" value="true">
                    <input type="hidden" name="productId" value="<?php echo $productId; ?>"> <!-- Hidden input to store ProductID -->
                    <input type="text" name="productName" placeholder="Product Name" value="<?php echo $product['productName']; ?>" required>
                    <input type="text" name="price" placeholder="Price" value="<?php echo $product['price']; ?>" required>
                    <input type="number" name="countStock" placeholder="Stock Count" value="<?php echo $product['countStock']; ?>" required>  

                
                </div>
                <div class="input-container">
                <input type="text" name="productDescription" placeholder="Product Details" value="<?php echo $product['productDescription']; ?>" required>
                </div>
                
                <div class="input-container">
                    <label for="productCategory">Product Category:</label>
                    <select id="productCategory" name="productCategory" class="small-dropdown" required>
                        <option value="modern" <?php echo ($product['productCategory'] == 'modern') ? 'selected' : ''; ?>>Modern</option>
                        <option value="minimal" <?php echo ($product['productCategory'] == 'minimal') ? 'selected' : ''; ?>>Minimal</option>
                        <option value="rustic" <?php echo ($product['productCategory'] == 'rustic') ? 'selected' : ''; ?>>Rustic</option>
                        <option value="bohemian" <?php echo ($product['productCategory'] == 'bohemian') ? 'selected' : ''; ?>>Bohemian</option>
                        <option value="tropical" <?php echo ($product['productCategory'] == 'tropical') ? 'selected' : ''; ?>>Tropical</option>
                    </select>

                    <label for="productType">Product Type:</label>
                    <select id="productType" name="productType" class="small-dropdown" required>
                        <option value="sofa" <?php echo ($product['productType'] == 'sofa') ? 'selected' : ''; ?>>Sofa</option>
                        <option value="bed" <?php echo ($product['productType'] == 'bed') ? 'selected' : ''; ?>>Bed</option>
                        <option value="desk" <?php echo ($product['productType'] == 'desk') ? 'selected' : ''; ?>>Desk</option>
                        <option value="chair" <?php echo ($product['productType'] == 'chair') ? 'selected' : ''; ?>>Chair</option>
                        <option value="wardrobe" <?php echo ($product['productType'] == 'wardrobe') ? 'selected' : ''; ?>>Wardrobe</option>
                    </select>
                </div>
                <div class="input-container">
                <input type="text" name="imageName" placeholder="Image Name" value="<?php echo $product['imageName']; ?>" required>                  
                    <label for="imageUpload">Upload Image:</label>
                     <input type="file" id="imageUpload" name="imageUpload" accept="image/*" required>
                </div>

               
                <button type="submit">Update Product</button>
            </form>
        </div>
    </div>
</div>



<?php
        } else {
            echo '<div class="error-message">Product not found.</div>';
        }
    } catch (PDOException $ex) {
        echo '<div class="error-message">Database error: ' . $ex->getMessage() . '</div>';
    }
} else {
    echo '<div class="error-message">Product ID is missing in the URL.</div>';
}

//Update Product details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateProduct'])) {
    if (isset($_POST['productId']) && is_numeric($_POST['productId'])) {
        $productId = $_POST['productId'];
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $price = $_POST['price'];
        $countStock = $_POST['countStock'];

        if (isset($_FILES["imageUpload"]) && $_FILES["imageUpload"]["error"] == UPLOAD_ERR_OK) {
            $fileName = basename($_FILES["imageUpload"]["name"]);
            $fileTmpName = $_FILES["imageUpload"]["tmp_name"];
            $uploadDirectory = "../Pictures for website/";

            if (move_uploaded_file($fileTmpName, $uploadDirectory . $fileName)) {
                try {
                    $stmt = $db->prepare("UPDATE products SET productName = ?, price = ?, countStock = ?, imageName = ? WHERE productId = ?");
                    $stmt->execute([$productName, $productDescription, $price, $countStock, $fileName, $productId]);
                    echo "Product updated successfully.";
                } catch (PDOException $ex) {
                    echo "Database error: " . $ex->getMessage();
                }
            } else {
                echo "";
            }
        } else {
            try {
                $stmt = $db->prepare("UPDATE products SET productName = ?, productDescription = ?, price = ?, countStock = ? WHERE productId = ?");
                $stmt->execute([$productName, $productDescription, $price, $countStock, $productId]);
                echo "Product updated successfully.";
            } catch (PDOException $ex) {
                echo "Database error: " . $ex->getMessage();
            }
        }
    } else {
        echo "Error: Product ID is missing or invalid.";
    }
}


//Delete Products
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $productIdToDelete = $_GET['delete'];
    $deleteSql = "DELETE FROM products WHERE productId = :productId";
    $deleteStatement = $db->prepare($deleteSql);
    $deleteStatement->bindParam(':productId', $productIdToDelete, PDO::PARAM_INT);

    if ($deleteStatement->execute()) {
        echo '<div class="success-message">Product deleted successfully.</div>';
    } else {
        echo '<div class="error-message">Error deleting product.</div>';
    }
}


    //Image Upload
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["imageUpload"]) && $_FILES["imageUpload"]["error"] == UPLOAD_ERR_OK) {
            $fileName = basename($_FILES["imageUpload"]["name"]);
            $fileTmpName = $_FILES["imageUpload"]["tmp_name"];
    
            $uploadDirectory = "../Pictures for website/";
    
            if (move_uploaded_file($fileTmpName, $uploadDirectory . $fileName)) {
                try {
                    $stmt = $db->prepare("INSERT INTO products (productName, price, productCategory, productType, imageName) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bindParam(1, $_POST['productName']);
                    $stmt->bindParam(2, $_POST['price']);
                    $stmt->bindParam(3, $_POST['productCategory']);
                    $stmt->bindParam(4, $_POST['productType']);
                    $stmt->bindParam(5, $fileName);
    
                    if ($stmt->execute()) {
                        echo "Product created successfully.";
                    } else {
                        echo "Error creating product.";
                    }
                } catch (PDOException $ex) {
                    echo "Database error: " . $ex->getMessage();
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Error: No file uploaded.";
        }
    }
    

?>
    <script src="script.js"></script>
</body>
</html>