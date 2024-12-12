<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];

    $sql = "INSERT INTO todos (task) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$task]);

    header('Location: index.php');
    exit;
}

$sql = "SELECT * FROM todos";
$stmt = $pdo->query($sql);
$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
</head>
<body>
    <h1>Todo App</h1>

    <form method="POST">
        <input type="text" name="task" placeholder="Add a task">
        <button type="submit">Add</button>
    </form>

    <ul>
        <?php foreach ($todos as $todo): ?>
            <li><?php echo $todo['task']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>