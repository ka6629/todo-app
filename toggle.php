<?php
// データベース接続
require_once 'db.php';

// idとstatusが送られてきたか確認
if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    
    $new_status = ($_POST['status'] == 0) ? 1 : 0;

    // データベースを更新する
    $sql = "UPDATE todos SET status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':status', $new_status, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// 処理が終わったら一覧に戻る
header('Location: index.php');
exit;
?>