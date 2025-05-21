<?php
$host = "localhost";         
$user = "root";              
$pwd = "";                   
$sql_db = "sea_db";  

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//below code from ChatGPT
try {
    // Data Source Name
    $dsn = "mysql:host=$host;dbname=$sql_db;charset=utf8mb4";

    // Create PDO instance
    $pdo = new PDO($dsn, $user, $pwd);

    // Set error mode to exception (best practice)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}
//test username:test@email.com & pwd: Test123456
?>
