<?php

$host = 'localhost';
$dbname = 'u593341949_db_rayon';
$username = 'u593341949_dev_rayon';
$password = '20221086Rayon';

try {   
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}

