<?php
include 'connectdb.php';
      $sql = "SELECT * FROM basketproducts WHERE basketId = $basket_id";
      $result = $conn->query($sql);
      
      if ($result->rowCount() > 0) {
        while($row = $result->fetch()) {
            $sql = "SELECT * FROM products WHERE $row["basketId"] = $row["productId"]";
            $productresult = $conn->query($sql);
          echo $row["productName"] . " price: " . $row["Price"] . "</br>";
          echo $row["imageName"] . "</br>";
        }
      } else {
        echo "0 results";
      }
    
    ?>