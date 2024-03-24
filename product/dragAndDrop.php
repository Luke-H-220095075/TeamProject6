<!doctype html>
<?php if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  include '../connect.php';
  try{
    $sth=$db->prepare("SELECT imageName FROM products WHERE productId = :id");
    $sth->bindparam(':id', $_GET['product_id'], PDO::PARAM_STR, 10);
    $sth->execute();
    $img=str_replace("jpg", "png",$sth->fetch(PDO::FETCH_ASSOC));
    if(is_array($img))
          {
            $img = implode($img);
          }
  }
  catch(PDOException $ex)
  {
    ?>
    <p>Sorry, a database error occurred.<p>
    <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
    <?php

  }
?>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Drag and drop furniture into room.</title>
      <link rel="stylesheet" href="dragAndDrop.css">
      <link rel="stylesheet" type="text/css" href="../css/product.css">
      <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
    <div class="colour">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
        </a>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>



  <header>
<section>
  <div class="fixed-top">
<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Furniche</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../loginview.php">Login</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            The team
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../About%20Us.php">About Us</a></li>
            <li><a class="dropdown-item" href="../contactview.php">Contact us</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../basket/basket.php"><i class="fa-solid fa-basket-shopping"></i></a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</div>
</nav>
                    <?php
                    session_start();
                    if (isset($_SESSION['user'])) {
                        echo '<li><a href="#">' . $_SESSION['user'] . '</a>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </section>
  <div class="heading">
        <h2>Upload an image of your room to see how the furniture would look</h2>
                  </div>
                  <div class="image">
                  <img src="" id="displayImg">
        <input type="file" id="inpimage">
        <?php
        echo '<div id="drag1"> <img id="img1" src="../PicturesForDragAndDrop/'.$img.'"></div>'; ?> </div>
        <script>
        
          
// Make the DIV element draggable:
imageDiv = document.getElementById("drag1");
dragElement(imageDiv);

function dragElement(imageDiv) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
      imageDiv.onmousedown = dragMouseDown;
}

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    imageDiv.style.top = (imageDiv.offsetTop - pos2) + "px";
    imageDiv.style.left = (imageDiv.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;
  }
  var inpImg = document.getElementById("inpimage"),
    displayImg = document.getElementById("displayImg");
    
inpImg.addEventListener("change", function() {
  changeImage(this);
});

function changeImage(input) {
  var reader;

  if (input.files && input.files[0]) {
    reader = new FileReader();

    reader.onload = function(e) {
      displayImg.setAttribute('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
        </script>
     
         
        </body>
        <?php } ?>

<footer class="footer">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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