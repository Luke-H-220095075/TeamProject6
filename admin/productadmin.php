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
               <!-- <span class="tooltip">Orders</span> -->
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


 
 //Pagenation
 $limit = 8; 
 $page = isset($_GET['page']) ? $_GET['page'] : 1; 
 $offset = ($page - 1) * $limit; 

 $sql = "SELECT * FROM products LIMIT :limit OFFSET :offset";
 $stmt = $db->prepare($sql);
 $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
 $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
 $stmt->execute();
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

 if ($result && $stmt->rowCount() > 0) {

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
     

     
//Product filters 
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : null;
$typeFilter = isset($_GET['type']) ? $_GET['type'] : null;

$sql = "SELECT * FROM products";

$whereClause = "";
$params = array();

if ($categoryFilter !== null) {
    $whereClause .= " WHERE productCategory = :category";
    $params[':category'] = $categoryFilter;
}

if ($typeFilter !== null) {
    if ($whereClause === "") {
        $whereClause .= " WHERE";
    } else {
        $whereClause .= " AND";
    }
    $whereClause .= " productType = :type";
    $params[':type'] = $typeFilter;
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
    echo "<tr><td colspan='9'>No products found.</td></tr>";
}


//Search Bar functionality
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $sql = "SELECT * FROM products WHERE productName LIKE :searchTerm
           OR price LIKE :searchTerm 
            OR countSold LIKE :searchTerm 
            OR countStock LIKE :searchTerm 
            OR productCategory LIKE :searchTerm 
            OR productType LIKE :searchTerm 
            OR imageName LIKE :searchTerm";


    $stmt = $db->prepare($sql);
    $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        foreach ($result as $row) {
        }
    } else {
        echo "";
    }
} else {
}
echo '</div>';

// product deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $productIdToDelete = $_GET['delete'];
    $deleteSql = "DELETE FROM products WHERE productId = :productId";
    $deleteStatement = $db->prepare($deleteSql);
    $deleteStatement->bindParam(':productId', $productIdToDelete, PDO::PARAM_INT);

    if ($deleteStatement->execute()) {
        echo '<div class="success-message" style= "margin-left: 375px">Product deleted successfully.</div>';
    } else {
        echo '<div class="error-message" style= "margin-left: 375px">Error deleting product.</div>';
    }
}

?>
    
  
  <div class="info-table">
<!--Products Table-->

<!--Header with search and dropdown. BOOTSTRAP WAS USED HERE-->
<div class="table-header"style="background-color: #e2b489; padding-top: 10px;">
<div class="container custom-background">
<strong><h3>Products</h3></strong> &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp; &emsp;&ensp;

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
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Category</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="productadmin.php?category=modern">Modern</a>
                <a class="dropdown-item" href="productadmin.php?category=minimal">Minimalistic</a>
                <a class="dropdown-item" href="productadmin.php?category=rustic">Rustic</a>
                <a class="dropdown-item" href="productadmin.php?category=bohemian">Bohemian</a>
                <a class="dropdown-item" href="productadmin.php?category=tropical">Tropical</a>

            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="input-group mb-3 custom-dropdown-toggle">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="typeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Type</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="productadmin.php?type=sofa">Sofa</a>
                <a class="dropdown-item" href="productadmin.php?type=bed">Bed</a>
                <a class="dropdown-item" href="productadmin.php?type=desk">Desk</a>
                <a class="dropdown-item" href="productadmin.php?type=chair">Chair</a>
                <a class="dropdown-item" href="productadmin.php?type=wardrobe">Wardrobe</a>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<!-- Produccts Table-->
<table id="product-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Units Sold</th>
            <th>Stock</th>
            <th>Stock Status</th> 
            <th>Category</th>
            <th>Type</th>
            <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row) {
            $stockStatus = ($row['countStock'] < 20) ? 'LOW' : 'Available';
        ?>
            <tr>
                <td><?php echo $row['productId']; ?></td>
                <td><?php echo $row['productName']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['countSold']; ?></td>
                <td><?php echo $row['countStock']; ?></td>
                <td class="<?php echo ($row['countStock'] < 10) ? 'low-stock' : 'available-stock'; ?>">
                    <?php echo $stockStatus; ?>
                </td>
                <td><?php echo $row['productCategory']; ?></td>
                <td><?php echo $row['productType']; ?></td>
                <td>
                    <a href='productadmin.php?delete=<?php echo $row['productId']; ?>' class='delete-icon' title='Delete'>
                        <i class='fa-solid fa-trash'></i>
                    </a>
                    <span style='margin-right: 5px;'></span>
                    <a href="editproduct.php?productId=<?php echo $row['productId']; ?>">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <span style='margin-right: 5px;'></span>
                    <a href="editproduct.php?productId=<?php echo $row['productId']; ?>">    
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

// Pagination of products table
$sql = "SELECT COUNT(*) AS total FROM products";
$stmt = $db->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$totalPages = ceil($row['total'] / $limit);
?>
<div class="pagination">
    <?php
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='productadmin.php?page=$i'>$i</a> ";
    }
    ?>
</div>
<?php
} else {
echo "No products found.";
}
?>

</div>


    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="script.js"></script>
</body>
</html>
