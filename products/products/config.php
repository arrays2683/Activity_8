<?php
/*
$host = 'localhost';
$dbname = 'parane1';
$username = 'root';
$password = '';

*/
define('DB_SERVER', 'localhost');
define('DB_NAME', 'u593341949_db_parane');
define('DB_USERNAME', 'u593341949_dev_parane');
define('DB_PASSWORD', '20212088Parane');
try {
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}