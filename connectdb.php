<?php

$db_host = 'localhost';
$db_name = 'u_220226381_db';
$username = 'u-220226381';
$password = 'inRuQ3XSct6NMd1';
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $username, $password);
	#$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex) {
	echo("Failed to connect to the database.<br>");
	echo($ex->getMessage());
	exit;
}
?>