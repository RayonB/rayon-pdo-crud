<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

/*
('DB_SERVER', 'localhost');
define('DB_NAME', 'u593341949_db_rayon');
define('DB_USERNAME', 'u593341949_dev_rayon');
define('DB_PASSWORD', '20221086Rayon');
*/
define('DB_SERVER', 'localhost');
define('DB_NAME', '');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');

try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>