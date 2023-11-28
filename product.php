<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
<?php
$user = 'root';
$pass = '';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
} catch (PDOException $e) {
    ?>
<p>Database Connection Error</p>
<?php echo $e->getMessage()?>
<?php
}?>

</body>
</html>