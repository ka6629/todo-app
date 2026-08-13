<?php
// データベース接続ファイルを読み込む
require_once 'db.php';

// URLにくっついてきた「id」を受け取る
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // idのタスクだけを1つ取り出す
    $sql = "SELECT * FROM todos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $todo = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスクの編集</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>タスクの編集</h1>
    
    <!-- データを update.php に送る -->
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
        
        <input type="text" name="task" value="<?php echo htmlspecialchars($todo['task'], ENT_QUOTES, 'UTF-8'); ?>" required>
        
        <button type="submit">更新する</button>
    </form>
    
    <br>
    <a href="index.php">戻る</a>
</body>
</html>