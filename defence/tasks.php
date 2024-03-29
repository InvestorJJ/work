<?php
// Assuming you have a database connection established

// Retrieve tasks from the database
// Change the query according to your database schema and table names
$query = "SELECT * FROM tasks";
$result = mysqli_query($connection, $query);

// Check if there are any tasks
if (mysqli_num_rows($result) > 0) {
    // Loop through the tasks and display them
    while ($row = mysqli_fetch_assoc($result)) {
        $taskId = $row['id'];
        $taskTitle = $row['title'];
        $taskDescription = $row['description'];
        $taskStatus = $row['status'];

        // Display task information
        echo "<div class='task'>";
        echo "<h3>$taskTitle</h3>";
        echo "<p>$taskDescription</p>";
        echo "<p>Status: $taskStatus</p>";
        echo "</div>";
    }
} else {
    echo "No tasks found.";
}

// Close the database connection
mysqli_close($connection);
?>