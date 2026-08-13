<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ToDoList</title>
</head>
<body>
    <h1>My ToDo List</h1>
    <form action="create.php" method="post">
        <input type="text" name="task" placeholder="新しいタスクを入力" required>
        <button type="submit">追加</button>
    </form>
</body>
</html>