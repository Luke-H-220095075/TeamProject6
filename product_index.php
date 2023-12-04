<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="product.css">
</head>
<body>
<?php
$dsn = "mysql:host=localhost;dbname=furniche";
$username = 'root';
$password = '';
?>

<h2>Products</h2>

<!-- Add dropdown filters -->
<label for="categoryFilter">Filter by Category:</label>
<select id="categoryFilter" onchange="filterProducts()">
    <option value="all">All</option>
    <?php
    $selectedcategoryFilter = isset($_GET['categoryFilter']) ? $_GET['categoryFilter'] : 'all';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT DISTINCT productCategory FROM products");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $category = htmlspecialchars($row['productCategory']);
            $selected = ($category == $selectedcategoryFilter) ? 'selected' : '';
            if ($category != null) {
                echo '<option value="' . $category . '" ' . $selected . '>' . $category . '</option>';
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
    ?>
</select>

<label for="typeFilter">Filter by Type:</label>
<select id="typeFilter" onchange="filterProducts()">
    <option value="all">All</option>
    <?php
    $selectedtypeFilter = isset($_GET['typeFilter']) ? $_GET['typeFilter'] : 'all';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT DISTINCT productType FROM products");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $type = htmlspecialchars($row['productType']);
            $selected = ($type == $selectedtypeFilter) ? 'selected' : '';
            if ($type != null) {
                echo '<option value="' . $type . '" ' . $selected . '>' . $type . '</option>';
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
    ?>
</select>

<button onclick="resetFilters()">Reset Filters</button>

<?php
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Initial query to fetch all products
    $query = "SELECT * FROM products";

    // Fetch selected values from dropdowns
    $typeFilter = isset($_GET['typeFilter']) ? $_GET['typeFilter'] : 'all';
    $categoryFilter = isset($_GET['categoryFilter']) ? $_GET['categoryFilter'] : 'all';

    // Add conditions to the query based on selected filters
    if ($typeFilter != 'all') {
        $query .= " WHERE productType = :type";
    }

    if ($categoryFilter != 'all') {
        $query .= ($typeFilter != 'all') ? " AND" : " WHERE";
        $query .= " productCategory = :category";
    }

    // Prepare and execute the final query
    $stmt = $pdo->prepare($query);

    if ($typeFilter != 'all') {
        $stmt->bindParam(':type', $typeFilter, PDO::PARAM_STR);
    }

    if ($categoryFilter != 'all') {
        $stmt->bindParam(':category', $categoryFilter, PDO::PARAM_STR);
    }

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<table id="productTable">';
        $count = 0; // Counter for products in the current row

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Start a new row for every two products
            if ($count % 3 == 0) {
                echo '<tr>';
            }

            echo '<td>';
            echo '<strong>Name:</strong> ' . htmlspecialchars($row['productName']) . '<br>';
            echo '<strong>Price:</strong> $' . number_format($row['price'], 2) . '<br>';
            echo '<strong>Image:</strong> <img src="' . htmlspecialchars($row['imageName']) . '" alt="' . htmlspecialchars($row['imageName']) . '" class="product-image">';
            echo '<br><button onclick="showProductModal(' . $row['productId'] . ')">View Details</button>';
            echo '</td>';

            // End the row for every two products
            if ($count % 3 == 2 || $count == $stmt->rowCount() - 1) {
                echo '</tr>';
            }

            $count++;
        }

        echo '</table>';
    } else {
        echo "<p>No products available, add some to the database</p>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeProductModal()">&times;</span>
        <div id="productDetailsModal"></div>
    </div>
</div>

<script>
    function showProductModal(productId) {
        var modal = document.getElementById('productModal');
        var productDetailsContainer = document.getElementById('productDetailsModal');

        // Send an AJAX request to retrieve product details
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display the product details in the modal
                productDetailsContainer.innerHTML = xhr.responseText;
                modal.style.display = 'block';
            }
        };
        xhr.open('GET', 'product_show.php?product_id=' + productId, true);
        xhr.send();
    }

    function closeProductModal() {
        var modal = document.getElementById('productModal');
        modal.style.display = 'none';
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function (event) {
        var modal = document.getElementById('productModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };

    function filterProducts() {
        var typeFilter = document.getElementById("typeFilter").value;
        var categoryFilter = document.getElementById("categoryFilter").value;

        // Redirect to the same page with the selected filters as query parameters
        window.location.href = 'product_index.php?typeFilter=' + typeFilter + '&categoryFilter=' + categoryFilter;
    }

    function resetFilters() {
        // Redirect to the same page without any filters
        window.location.href = 'product_index.php';
    }
</script>
</body>
</html>