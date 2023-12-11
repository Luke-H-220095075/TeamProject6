<!DOCTYPE html>
<html>
<?php
try{
  $db=new PDO("mysql:dbname=furniche;host=localhost", "root", "");
}catch(PDOException $ex){
  ?>
  <p>Sorry, a database error occurred.<p>
  <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
  <?php
}
?>
<body>
</body>
</html>