<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $change = isset($_POST['change']) ? intval($_POST['change']) : 0;

    include '../connect.php';
    $basketId = $_SESSION['basketID'];
//    $sql = "SELECT basketId FROM baskets WHERE userId = ". $userId ." AND currentUserBasket = 1" ;
//    $result = $db->query($sql);
//    $row = $result->fetch(PDO::FETCH_ASSOC);
//    $basketId = $row['basketId'];

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmtUpdate = $db->prepare("
            UPDATE basketproducts
            SET quantity = quantity + :change
            WHERE basketId = $basketId
            AND productId = :product_id
        ");
        $stmtUpdate->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':change', $change, PDO::PARAM_INT);
        $stmtUpdate->execute();

        $newQuantity = $db->query("SELECT quantity FROM basketproducts WHERE basketId = $basketId AND productId = $productId")->fetchColumn();
        if ($newQuantity === 0) {
            $stmtRemove = $db->prepare("
                DELETE FROM basketproducts
                WHERE basketId = $basketId
                AND productId = :product_id
            ");
            $stmtRemove->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmtRemove->execute();
        }

        echo "Success";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $db = null;
}

?>