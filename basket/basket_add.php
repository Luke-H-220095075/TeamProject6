
<?php
echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    include '../connect.php';
    $userId = $_SESSION['userID'];
    $sql = "SELECT basketId FROM baskets WHERE userId = ". $userId ." AND currentUserBasket = 1" ;
    $result = $db->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $basketId = $row['basketId'];
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmtCheck = $db->prepare("
            SELECT COUNT(*) AS count
            FROM basketproducts
            WHERE basketId = $basketId
            AND productId = :product_id
        ");
        $stmtCheck->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmtCheck->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmtCheck->execute();

        $resultCheck = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($resultCheck['count'] > 0) {
            $stmtUpdate = $db->prepare("
                UPDATE basketproducts
                SET quantity = quantity + 1
                WHERE basketId = $basketId
                AND productId = :product_id
            ");
            $stmtUpdate->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmtUpdate->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmtUpdate->execute();
        } else {
            $stmtInsert = $db->prepare("
                INSERT INTO basketproducts (basketId, productId, quantity)
                VALUES ($basketId, :product_id, 1)
            ");
            $stmtInsert->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmtInsert->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmtInsert->execute();
        }

        echo "Success";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $db = null;
}

?>
