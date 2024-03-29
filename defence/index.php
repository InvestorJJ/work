<?php
// Assuming you have a database connection established

// Fetch tasks from the database (change the query according to your database schema and table names)
$query = "SELECT * FROM tasks";
$result = mysqli_query($connection, $query);

// Check if there are any tasks
if (mysqli_num_rows($result) > 0) {
    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $tasks = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Management System - Index</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .create-task-link {
            display: block;
            text-align: center;
            margin-bottom: 10px;
        }

        .create-task-link a {
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
        }

        .empty-message {
            text-align: center;
            color: gray;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task Management System</h1>
        <div class="create-task-link">
            <a href="create_task.php">Create Task</a>
        </div>
        <?php if (!empty($tasks)) { ?>
            <table>
                <tr>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($tasks as $task) { ?>
                    <tr>
                        <td><?php echo $task['name']; ?></td>
                        <td><?php echo $task['description']; ?></td>
                        <td><?php echo $task['status']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="empty-message">No tasks found.</p>
        <?php } ?>
    </div>
</body>
</html>