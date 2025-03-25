<?php
$host = 'sql303.infinityfree.com'; 
$db = 'if0_38598539_what2eat';     
$user = 'if0_38598539';   
$pass = 'in9W4XVBoqQ';   
try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}
?>