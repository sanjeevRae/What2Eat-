<?php
$host = 'sql303.infinityfree.com'; 
$db = 'if0_38598539_what2eat';     
$user = 'if0_38598539';   
$pass = 'in9W4XVBoqQ';   
try {

    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    
    die("Connection failed: " . $e->getMessage());
}
?>