<?php
include 'connectdb.php';
$basket_id = 1;
      $sql = "SELECT price, quantity FROM products JOIN basketproducts ON products.productId = basketproducts.productId WHERE basketId = $basket_id";
      $result = $conn->query($sql);
      $basketcost = 0;
      if($result->rowCount() > 0) {
        while($row = $result->fetch()) {
            $basketcost = $basketcost + $row["quantity"] * $row["price"];
        }
      echo "£" . $basketcost . " before discount</br>";
      } else {
        echo "0 results";
      }


      
      $discount_name = "Discount 1";#$discount_name = $_POST['discount'];
      $sql = "SELECT value FROM discounts WHERE discountTitle = '" . $discount_name."'"; 
      $value = $conn->query($sql);
      $basketcost = $basketcost * (1 - $value->fetch()["value"] / 100);
      echo "£". $basketcost . " total</br>";


      #stock availability check
      function availability($conn){
      $available = true;
      $sql = "SELECT productName, countStock, quantity FROM products join basketproducts ON products.productId = basketproducts.productId  WHERE basketId = $basket_id";
      $result = $conn->query($sql);
      if($result->rowCount() > 0) {
        while($row = $result->fetch()) {
          if($row["quantity"] + 100 > $row["countStock"]){
            echo $row["productName"] . " is unavailable </br>";
            $available = false;
          }
        }
      }
      if ($available) { 
        echo "available";
      }
    }
    availability($conn)
?>