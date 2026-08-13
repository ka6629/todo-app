<?php
require_once 'db.php';

$sql = "SELECT * FROM todos ORDER BY created_at DESC";
$stmt = $pdo->query($sql);

$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ToDoList</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>My ToDo List</h1>
    <form action="create.php" method="post">
        <input type="text" name="task" placeholder="新しいタスクを入力" required>
        <button type="submit">追加</button>
    </form>
    <h2>タスク一覧</h2>
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <span><?php echo htmlspecialchars($todo['task'], ENT_QUOTES, 'UTF-8'); ?></span>   
                <div>
                    <a href="edit.php?id=<?php echo $todo['id']; ?>"> [編集] </a>
                    <a href="delete.php?id=<?php echo $todo['id']; ?>" onclick="return confirm('本当に削除しますか？');"> [削除] </a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>