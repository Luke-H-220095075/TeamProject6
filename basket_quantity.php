<?php
$dsn = "mysql:host=localhost;dbname=furniche";
$username = "root";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $change = isset($_POST['change']) ? intval($_POST['change']) : 0;

    $userId = 1;

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmtUpdate = $pdo->prepare("
            UPDATE basketproducts
            SET quantity = quantity + :change
            WHERE basketId = (SELECT basketId FROM baskets WHERE userId = :user_id)
            AND productId = :product_id
        ");
        $stmtUpdate->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':change', $change, PDO::PARAM_INT);
        $stmtUpdate->execute();

        $newQuantity = $pdo->query("SELECT quantity FROM basketproducts WHERE basketId = (SELECT basketId FROM baskets WHERE userId = $userId) AND productId = $productId")->fetchColumn();
        if ($newQuantity === 0) {
            $stmtRemove = $pdo->prepare("
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

    $pdo = null;
}

?>