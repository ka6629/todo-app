<?php
require_once 'db.php';

// フォームから「id」と「task」が送られてきたか確認
if (isset($_POST['id']) && isset($_POST['task'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];

    $sql = "UPDATE todos SET task = :task WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    // データをセットして実行
    $stmt->bindValue(':task', $task, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// 処理が終わったら、トップページ（index.php）に戻る
header('Location: index.php');
exit;
?>