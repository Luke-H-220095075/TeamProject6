<!DOCTYPE html>
<html lang="en">
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

<label for="sortFilter">Sort by:</label>
<select id="sortFilter" onchange="filterProducts()" style="cursor: pointer">
    <?php
        $sortFilterOptions = [
            'all' => 'Default',
            'name-asc' => 'Name (A-Z)',
            'name-desc' => 'Name (Z-A)',
            'price-asc' => 'Price (Low to High)',
            'price-desc' => 'Price (High to Low)'
            // Add more sorting options as needed
        ];

        $selectedSortFilter = isset($_GET['sortFilter']) ? $_GET['sortFilter'] : 'all';

        foreach ($sortFilterOptions as $value => $label) {
            $selected = ($value == $selectedSortFilter) ? 'selected' : '';
            echo '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
        }
    ?>
    </select>

<label for="categoryFilter">Filter by Category:</label>
<select id="categoryFilter" onchange="filterProducts()" style="cursor: pointer">
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
<select id="typeFilter" onchange="filterProducts()" style="cursor: pointer">
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

<button onclick="resetFilters()" style="cursor: pointer">Reset Filters</button>

<?php
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM products";

    $sortFilter = isset($_GET['sortFilter']) ? $_GET['sortFilter'] : 'all';
    $typeFilter = isset($_GET['typeFilter']) ? $_GET['typeFilter'] : 'all';
    $categoryFilter = isset($_GET['categoryFilter']) ? $_GET['categoryFilter'] : 'all';

    switch ($sortFilter) {
        case 'name-asc':
            $query .= " ORDER BY productName ASC";
            break;
        case 'name-desc':
            $query .= " ORDER BY productName DESC";
            break;
        case 'price-asc':
            $query .= " ORDER BY price ASC";
            break;
        case 'price-desc':
            $query .= " ORDER BY price DESC";
            break;
        default:
            break;
    }

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
        $count = 0;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($count % 3 == 0) {
                echo '<tr>';
            }

            echo '<td>';
            echo '<a onclick="showProductModal(' . $row['productId'] . ')"><img src="' . htmlspecialchars($row['imageName']) . '" alt="' . htmlspecialchars($row['imageName']) . '" class="product-image"></a><br>';
//            echo '<strong>Name:</strong> ' . htmlspecialchars($row['productName']) . '<br>';
//            echo '<strong>Price:</strong> $' . number_format($row['price'], 2) . '<br>';
//            echo '<br><button onclick="showProductModal(' . $row['productId'] . ')">View Details</button>';
            echo '</td>';

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
        <div id="productDetailsModal"></div>
        <button id="addToBasketButton" onclick="addToBasket()" style="display: none;">Add to Basket</button>
    </div>
</div>

<script>
    function showProductModal(productId) {
        var modal = document.getElementById('productModal');
        var productDetailsContainer = document.getElementById('productDetailsModal');

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                productDetailsContainer.innerHTML = xhr.responseText;
                modal.style.display = 'block';
            }
        };
        xhr.open('GET', 'product_show.php?product_id=' + productId, true);
        xhr.send();

        document.getElementById('addToBasketButton').style.display = 'block';
        document.getElementById('productModal').style.display = 'block';
    }

    function closeProductModal() {
        var modal = document.getElementById('productModal');
        modal.style.display = 'none';

        document.getElementById('addToBasketButton').style.display = 'none';
        document.getElementById('productModal').style.display = 'none';
    }

    window.onclick = function (event) {
        var modal = document.getElementById('productModal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };

    function filterProducts() {
        var sortFilter = document.getElementById("sortFilter").value;
        var typeFilter = document.getElementById("typeFilter").value;
        var categoryFilter = document.getElementById("categoryFilter").value;

        window.location.href = 'product_index.php?typeFilter=' + typeFilter + '&categoryFilter=' + categoryFilter + '&sortFilter=' + sortFilter;
    }

    function resetFilters() {
        window.location.href = 'product_index.php';
    }

    function addToBasket() {
        alert('Product added to basket!');
    }
</script>
</body>
</html>