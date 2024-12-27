<?php
const DB_HOST = "localhost";
const DB_NAME = "newbd";
const DB_USER = "root";

try {
    $mysqlDB = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER);
    $mysqlDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("MySQL Connection failed: " . $e->getMessage());
}
?>