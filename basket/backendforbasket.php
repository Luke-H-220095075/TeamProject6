<?php
include 'connectdb.php';
      $sql = "SELECT productId FROM basketproducts WHERE basketId = $basket_id";
      $result = $conn->query($sql);
      $basketcost = 0
      if ($result->rowCount() > 0) {
        while($row = $result->fetch()) {
            $sql = "SELECT price FROM products WHERE $result = $row["productId"]";
            $productprice = $conn->query($sql);
            $basketcost = $basketcost + $productprice
          
        }
      echo "£" . $basketcost . " before discount</br>";
      } else {
        echo "0 results";
      }
      $discount_name = $_POST['discount']
      $sql = "SELECT 'value' FROM discounts WHERE $discount_name = $row["discountTitle"]";
      $value = $conn->query($sql);
      $basketcost = $basketcost * 100 - $value
    ?>