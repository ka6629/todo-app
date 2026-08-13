<?php
$host = 'localhost';
$dbname = 'todo_db';
$user = 'root'; 
$pass = '';   

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "接続成功";
    
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit;
}
?>