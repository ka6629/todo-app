<?php
require_once 'db.php';

if (isset($_POST['task']) && $_POST['task'] !== '') {
    $task = $_POST['task'];

    $sql = "INSERT INTO todos (task) VALUES (:task)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':task', $task, PDO::PARAM_STR);
    $stmt->execute();
}

header('Location: index.php');
exit;
?>