<?php
function availability($db, $basketId)
        {
            $available = true;
            $sql = "SELECT productName, countStock, quantity FROM products join basketproducts ON products.productId = basketproducts.productId  WHERE basketId = '.$basketId.'";
            $result = $db->query($sql);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch()) {
                    if ($row["quantity"] > $row["countStock"]) {
                        echo "<p>" . $row["productName"] . " is unavailable </p>";
                        $available = false;
                    }
                }
            }
            return $available;
        }