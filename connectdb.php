<?php

$db_host = 'localhost';
$db_name = 'u_220226381_db';
$dsn = "mysql:host=localhost;dbname=furniche";
$username = "root";
$password = "";
try {
    $conn = new PDO($dsn, $username, $password);
	#$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex) {
	echo("Failed to connect to the database.<br>");
	echo($ex->getMessage());
	exit;
}
?>