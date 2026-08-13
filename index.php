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
    <p id="clock" style="text-align: center; color: #666; font-size: 14px; margin-top: -15px; margin-bottom: 25px;"></p>
    <form action="create.php" method="post">
        <input type="text" name="task" placeholder="新しいタスクを入力" required>
        <button type="submit">追加</button>
        <p id="clock" style="text-align: center; color: #666; font-size: 14px; margin-top: -15px; margin-bottom: 25px;"></p>
    </form>
    <h2>タスク一覧</h2>
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <form action="toggle.php" method="POST" style="margin: 0; display: flex; align-items: center; gap: 10px;">
                    <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                    <input type="hidden" name="status" value="<?php echo $todo['status']; ?>">
                    
                    <input type="checkbox" onchange="this.form.submit()" <?php if ($todo['status'] == 1) echo 'checked'; ?>>
                    
                    <span class="<?php if ($todo['status'] == 1) echo 'completed'; ?>">
                        <?php echo htmlspecialchars($todo['task'], ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                </form>
                <div>
                    <a href="edit.php?id=<?php echo $todo['id']; ?>"> [編集] </a>
                    <a href="delete.php?id=<?php echo $todo['id']; ?>" onclick="return confirm('本当に削除しますか？');"> [削除] </a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
     <script>
        function updateClock() {
            // パソコンの現在の時間を取得する
            const now = new Date();
            // 年・月・日を取得
            const year = now.getFullYear();
            const month = now.getMonth() + 1; 
            const date = now.getDate();
            
            const dayList = ['日', '月', '火', '水', '木', '金', '土'];
            const day = dayList[now.getDay()];
            
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            const timeString = `${year}年${month}月${date}日(${day}) ${hours}:${minutes}:${seconds}`;
            
            document.getElementById('clock').textContent = timeString;
        }

        setInterval(updateClock, 1000);

        updateClock();
    </script>
</body>
</html>