<?php
// Assuming you have a database connection established

// Retrieve tasks from the database
// Change the query according to your database schema and table names
$query = "SELECT * FROM tasks";
$result = mysqli_query($connection, $query);

// Check if there are any tasks
if (mysqli_num_rows($result) > 0) {
    // Create an array to store task data
    $tasks = array();

    // Loop through the tasks and add them to the array
    while ($row = mysqli_fetch_assoc($result)) {
        $task = array(
            "id" => $row['id'],
            "title" => $row['title'],
            "description" => $row['description'],
            "status" => $row['status'],
            // Add other task properties as needed
        );

        array_push($tasks, $task);
    }

    // Generate HTML report
    echo "<h1>Task Report</h1>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Status</th></tr>";
    
    foreach ($tasks as $task) {
        echo "<tr>";
        echo "<td>".$task['id']."</td>";
        echo "<td>".$task['title']."</td>";
        echo "<td>".$task['description']."</td>";
        echo "<td>".$task['status']."</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No tasks found.";
}

// Close the database connection
mysqli_close($connection);
?>