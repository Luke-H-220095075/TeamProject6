<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $change = isset($_POST['change']) ? intval($_POST['change']) : 0;

    $userId = 1;

    include 'connect.php';
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmtUpdate = $db->prepare("
            UPDATE basketproducts
            SET quantity = quantity + :change
            WHERE basketId = (SELECT basketId FROM baskets WHERE userId = :user_id)
            AND productId = :product_id
        ");
        $stmtUpdate->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':change', $change, PDO::PARAM_INT);
        $stmtUpdate->execute();

        $newQuantity = $db->query("SELECT quantity FROM basketproducts WHERE basketId = (SELECT basketId FROM baskets WHERE userId = $userId) AND productId = $productId")->fetchColumn();
        if ($newQuantity === 0) {
            $stmtRemove = $db->prepare("
                DELETE FROM basketproducts
                WHERE basketId = (SELECT basketId FROM baskets WHERE userId = :user_id)
                AND productId = :product_id
            ");
            $stmtRemove->bindParam(':user_id', $userId, PDO::PARAM_INT);
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