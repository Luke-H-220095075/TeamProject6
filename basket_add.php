
<?php
$dsn = "mysql:host=localhost;dbname=furniche";
$username = 'root';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

    $userId = 1;

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmtCheck = $pdo->prepare("
            SELECT COUNT(*) AS count
            FROM basketproducts
            WHERE basketId = (SELECT basketId FROM baskets WHERE userId = :user_id)
            AND productId = :product_id
        ");
        $stmtCheck->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmtCheck->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmtCheck->execute();

        $resultCheck = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($resultCheck['count'] > 0) {
            $stmtUpdate = $pdo->prepare("
                UPDATE basketproducts
                SET quantity = quantity + 1
                WHERE basketId = (SELECT basketId FROM baskets WHERE userId = :user_id)
                AND productId = :product_id
            ");
            $stmtUpdate->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmtUpdate->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmtUpdate->execute();
        } else {
            $stmtInsert = $pdo->prepare("
                INSERT INTO basketproducts (basketId, productId, quantity)
                VALUES ((SELECT basketId FROM baskets WHERE userId = :user_id), :product_id, 1)
            ");
            $stmtInsert->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmtInsert->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmtInsert->execute();
        }

        echo "Success";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
}

?>
