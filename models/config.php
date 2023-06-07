<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'escalaweb');
define('DB_USER', 'root');
define('DB_PASS', '');

try {

	$conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

	die("Connection failed: " . $e->getMessage());
}
