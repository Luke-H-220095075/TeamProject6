<?php
include 'connectdb.php';
$basket_id = 1;
      $sql = "SELECT price FROM products join basketproducts ON products.productId = basketproducts.productId WHERE basketId = $basket_id";
      $result = $conn->query($sql);
      $basketcost = 0;
      if($result->rowCount() > 0) {
        while($row = $result->fetch()) {
            $basketcost = $basketcost + $row["price"];
          }
      echo "£" . $basketcost . " before discount</br>";
      } else {
        echo "0 results";
      }


      
      $discount_name = "Discount 1";#$discount_name = $_POST['discount'];
      $sql = "SELECT value FROM discounts WHERE discountTitle = '" . $discount_name."'"; 
      $value = $conn->query($sql);
      $basketcost = $basketcost * (1 - $value->fetch()["value"] / 100);
      echo "£". $basketcost . " total";
    ?>