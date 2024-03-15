<!DOCTYPE html>
<html>

<head>
    <title>Furniche - Products</title>
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/product.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <header>

<div class="colour">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
  </a>
</div>
<section>
<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Furniche</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="product/products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="loginview.php">Login</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            The team
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">About Us</a></li>
            <li><a class="dropdown-item" href="#">Contact us</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="basket/basket.php"><i class="fa-solid fa-basket-shopping"></i></a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
              <?php
                session_start();
              if (isset($_SESSION['user'])) {
                    echo '<a href="../customerprofile.php">' . $_SESSION['user'] . '</a>';
                  echo '<a href="../basket/basket.php"><i class="fa-solid fa-basket-shopping"></i></a>';
                  
              } else {
                echo '<a href="../loginview.php">Login</a>';
              }
              ?>
              </div>
    </div>
  </nav>
</section>
</header>

    <div class="design">
        <h1>Categories<h1>

    <div>
    <img src="../Pictures%20for%20website/Bohemian.jpg" alt="Category 1" onclick="fillCategoryFilter('bohemian')" class="image-filter">
    <img src="../Pictures%20for%20website/Rustic.jpg" alt="Category 2" onclick="fillCategoryFilter('rustic')" class="image-filter">
    <img src="../Pictures%20for%20website/Minimalistic.jpg" alt="Category 3" onclick="fillCategoryFilter('minimal')" class="image-filter">
    <img src="../Pictures%20for%20website/Tropical.jpg" alt="Category 4" onclick="fillCategoryFilter('tropical')" class="image-filter">
    <img src="../Pictures%20for%20website/Modern.jpg" alt="Category 5" onclick="fillCategoryFilter('modern')" class="image-filter">
    </div>
    </div>

    
 <div class="pd-display">
     <?php
        include '../connect.php';
        try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmtCheapest = $db->prepare("
        SELECT productId, productName, price, imageName
        FROM products
        ORDER BY price ASC
        LIMIT 3
     ");
        $stmtCheapest->execute();

        $cheapestProducts = $stmtCheapest->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
     echo "Error: " . $e->getMessage();
        }

        $db = null;
    ?>
</div>


 <div class="pd-back">
<h2>Products</h2>

    <label for="sortFilter">Sort by:</label>
    <select id="sortFilter" onchange="filterProducts()" class="custom-select">
        <?php
        $sortFilterOptions = [
            'all' => 'Sort by:',
            'name-asc' => 'Name (A-Z)',
            'name-desc' => 'Name (Z-A)',
            'price-asc' => 'Price (Low to High)',
            'price-desc' => 'Price (High to Low)'
        ];

        $selectedSortFilter = isset($_GET['sortFilter']) ? $_GET['sortFilter'] : 'all';

        foreach ($sortFilterOptions as $value => $label) {
            $selected = ($value == $selectedSortFilter) ? 'selected' : '';
            echo '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
        }
        ?>
    </select>

    <label for="categoryFilter">Filter by Category:</label>
    <select id="categoryFilter" onchange="filterProducts()" class="custom-select">
        <option value="all">All</option>
        <?php
        $selectedcategoryFilter = isset($_GET['categoryFilter']) ? $_GET['categoryFilter'] : 'all';

        include '../connect.php';
        try {
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->query("SELECT DISTINCT productCategory FROM products");

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

        $db = null;
        ?>
    </select>

    <label for="typeFilter">Filter by Type:</label>
    <select id="typeFilter" onchange="filterProducts()" class="custom-select">

        <option value="all">All</option>
        <?php
        $selectedtypeFilter = isset($_GET['typeFilter']) ? $_GET['typeFilter'] : 'all';

        include '../connect.php';
        try {
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->query("SELECT DISTINCT productType FROM products");

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

        $db = null;
        ?>
    </select>

    <button onclick="resetFilters()" style="cursor: pointer">Reset Filters</button>

    <?php
    include '../connect.php';
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM products";

        $sortFilter = isset($_GET['sortFilter']) ? $_GET['sortFilter'] : 'all';
        $typeFilter = isset($_GET['typeFilter']) ? $_GET['typeFilter'] : 'all';
        $categoryFilter = isset($_GET['categoryFilter']) ? $_GET['categoryFilter'] : 'all';

        if ($typeFilter != 'all') {
            $query .= " WHERE productType = :type";
        }

        if ($categoryFilter != 'all') {
            $query .= ($typeFilter != 'all') ? " AND" : " WHERE";
            $query .= " productCategory = :category";
        }

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

        // Prepare and execute the final query
        $stmt = $db->prepare($query);

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
                if ($count % 1 == 0) {
                    echo '<tr>';
                }

                echo '<td class="center">';
                echo '<a onclick="showProductModal(' . $row['productId'] . ')"><img src="../Pictures for website/' . htmlspecialchars($row['imageName']) . '" alt="' . htmlspecialchars($row['imageName']) . '" id="prodImage" class="product-image"></a><br>';
                echo '</td>';


                if ($count % 1 == 2 || $count == $stmt->rowCount() - 1) {
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

    $db = null;


    ?>
</select>

    </div>
    <div class="offerscode">
        <h1> Current offers</h>
        <section class="itemscode">
            <?php
            if (!empty($cheapestProducts)) {
                echo '<div class="current-offers">';
                foreach ($cheapestProducts as $offer) {
                    echo '<div class="offer-item">';
                    echo '<a onclick="showProductModal(' . $offer['productId'] . ')"><img src= "../Pictures for website/' . htmlspecialchars($offer['imageName']) . '" alt="' . htmlspecialchars($offer['imageName']) . '"></a><br>';
                    echo '<h3>' . $offer['productName'] . '</h3>';
                    echo '<p>Price: £' . $offer['price'] . '</p>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<p>No current offers available.</p>';
            }
            ?>

    </div>
    </section>

    <div class="desk">
        <h1> Desk inspiration</h>
        <section class="inspo">
            <img src="../Pictures%20for%20website/Desk Inspiration 1.jpg" alt="Product 1" class="my_img_2">
            <img src="../Pictures%20for%20website/Desk Inspiration 2.jpg" alt="Product 2" class="my_img_2">


    </div>
    </section>

    <div class="product">
        <h1> Tips and ideas for a more sustainable home</h1>
        <section class="one">
        <a href="https://medium.com/@beancarmens/wooden-boxes-and-their-storage-benefits-7e94e1665200"><img src="../Pictures%20for%20website/Tips and Ideas 1.jpg" alt="Product 1" class="my_img"></a>



        <a href="https://www.ofwat.gov.uk/households/conservingwater/watersavingtips/"><img src="../Pictures%20for%20website/Tips and Ideas 2.jpg" alt="Product 2" class="my_img"></a>



        <a href="https://tuckerjoinery.co.uk/blog/how-sustainable-wood-is-shaping-the-furniture-sector/"><img src="../Pictures%20for%20website/Tips and Ideas 3.jpg" alt="Product 3" class="my_img"></a>

        <a href="https://www.fruitnet.com/eurofruit/new-study-endorses-wood-as-the-most-sustainable-packaging-for-fandv/256847.article#:~:text=Wooden%20packaging%20was%20the%20best,with%20the%20lowest%20environmental%20impact."><img src="../Pictures%20for%20website/Tips and Ideas 4.jpg" alt="Product 3" class="my_img"></a>

        <a href="https://www.routledge.com/blog/article/what-is-sustainable-energy-and-why-do-we-need-it"><img src="../Pictures%20for%20website/Tips and Ideas 5.jpg" alt="Product 3" class="my_img"></a>

    </div>
    </section>

    <div id="productModal" class="modal">
        <div class="modal-content">
            <div id="productDetailsModal"></div>
            <button id="addToBasketButton" onclick="addToBasket()" style="display: none;">Add to Basket</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>

    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "30px 10px";
            document.getElementById("logo").style.fontSize = "25px";
        } else {
            document.getElementById("navbar").style.padding = "50px 10px";
            document.getElementById("logo").style.fontSize = "35px";
        }
    }


    function showProductModal(productId) {
        var modal = document.getElementById('productModal');
        var productDetailsContainer = document.getElementById('productDetailsModal');

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    productDetailsContainer.innerHTML = xhr.responseText;
                    productDetailsContainer.setAttribute('data-product-id', productId);
                    modal.style.display = 'block';
                }
            };
            xhr.open('GET', 'product_show.php?product_id=' + productId, true);
            xhr.send();

            document.getElementById('addToBasketButton').style.display = 'block';
            document.getElementById('productModal').style.display = 'block';
        }
        function showInRoom(productId) {
            window.open('dragAndDrop.php?product_id=' + productId, '_blank');
            //var productDetailsContainer = document.getElementById('productDetailsModal');
            // var xhr = new XMLHttpRequest();
            // xhr.open('POST', '../dragAndDrop.php', true);
            // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // //xhr.onreadystatechange = function () {

            //    // }
            //     xhr.send('image='+img);
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

            window.location.href = 'products.php?typeFilter=' + typeFilter + '&categoryFilter=' + categoryFilter + '&sortFilter=' + sortFilter;
        }

        function fillCategoryFilter(category) {
            document.getElementById('categoryFilter').value = category;
            filterProducts();
        }

        function resetFilters() {
            window.location.href = 'products.php';
        }

        function addToBasket() {
            var productId = document.getElementById('productDetailsModal').getAttribute('data-product-id');
            var isConfirmed = confirm('Add Product to Basket?');

            if (isConfirmed) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../basket/basket_add.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert('Product added to basket!');
                        closeProductModal();

                        var goToBasket = confirm('Proceed to Basket?');
                        if (goToBasket) {
                            window.location.href = '../basket/basket.php';
                        }
                    }
                };
                xhr.send('product_id=' + productId);
            }
        }

        function showProductDetails(productId) {
            // Open the product details page in a new window or tab
            window.open('product_details.php?product_id=' + productId, '_blank');
        }

    </script>
</body>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>About Us</h4>
                <ul>
                    <li><a href="#">Our Founder</a> </li>
                    <li><a href="#">Our Values</a> </li>
                    <li><a href="#">Our Privacy Policy</a> </li>
                    <li><a href="#">Our Services</a> </li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Address</h4>
                <h5>206 Canada Place, Liverpool Street, E12 1CL</h5>
            </div>
            <div class="footer-col">
                <h4>Contact Us</h4>
                <h5>Email us at: comms@furniche.com</h5>
                <h5>Call us at: 01563385967</h5>
                <ul>
                    <li><a href="contactview.php">Contact Us via our Website</a> </li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow us</h4>
                <div class="social-links">
                    <a href="https://en-gb.facebook.com/"><i class="fab fa-facebook - f"></i></a>
                    <a href="https://twitter.com/?lang=en"><i class="fab fa-twitter"></i></a>
                    <a href="https://uk.linkedin.com/"><i class="fab fa-linkedin - in"></i></a>
                    <a href="https://github.com/"><i class="fab fa-github"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>


</html>