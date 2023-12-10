<!DOCTYPE html>
<html lang="en">
<body>
<?php
include 'connectdb.php';
$basket_id = 1;
$sql = "SELECT price, quantity FROM products JOIN basketproducts ON products.productId = basketproducts.productId WHERE basketId = $basket_id";
$result = $conn->query($sql);
$basketcost = 0;
if ($result->rowCount() > 0) {
  while ($row = $result->fetch()) {
    $basketcost = $basketcost + $row["quantity"] * $row["price"];
  }
  echo "£" . $basketcost . " before discount</br>";
} else {
  echo "0 results";
}



$discount_name = "Discount 1"; #$discount_name = $_POST['discount'];
$sql = "SELECT value FROM discounts WHERE discountTitle = '" . $discount_name . "'";
$value = $conn->query($sql);
$basketcost = $basketcost * (1 - $value->fetch()["value"] / 100);
echo "£" . $basketcost . " total</br>";


#stock availability check
function availability($conn, $basket_id)
{
  $available = true;
  $sql = "SELECT productName, countStock, quantity FROM products join basketproducts ON products.productId = basketproducts.productId  WHERE basketId = $basket_id";
  $result = $conn->query($sql);
  if ($result->rowCount() > 0) {
    while ($row = $result->fetch()) {
      if ($row["quantity"] > $row["countStock"]) {
        echo $row["productName"] . " is unavailable </br>";
        $available = false;
      }
    }
  }
  return $available;
}
if (availability($conn, $basket_id)) {
  echo "available";
}

if (isset($_POST['purchase'])) {
  if (availability($conn, $basket_id)) {
    $sql = "SELECT countStock, countSold, quantity, basketproducts.productId FROM products join basketproducts ON products.productId = basketproducts.productId  WHERE basketId = $basket_id";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
      while ($row = $result->fetch()) {
        $sql = "UPDATE products SET countStock = " . $row["countStock"] - $row["quantity"] . ", countSold = " . $row["countSold"] + $row["quantity"] . " WHERE productId = " . $row["productId"];
        $conn->query($sql);
      }
    }
  }
}
$_POST['purchase'] = null;
?>

  <form method="post" action="backendforbasket.php  "> 
          <button type="submit" class="purchase" onclick="purchase">purchase</button>
          <input type="hidden" name="purchase" value="TRUE"/>

  </form> 
</html>