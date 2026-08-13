<?php
// データベース接続ファイルを読み込む
require_once 'db.php';

// URLにくっついてきた「id」を受け取る
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //  データベースから該当するidのタスクを削除する命令
    $sql = "DELETE FROM todos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
   
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// 処理が終わったら、トップページに戻る
header('Location: index.php');
exit;
?>