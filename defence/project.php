<?php
// Assuming you have a database connection established

// Retrieve projects from the database
// Change the query according to your database schema and table names
$query = "SELECT * FROM projects";
$result = mysqli_query($connection, $query);

// Check if there are any projects
if (mysqli_num_rows($result) > 0) {
    // Loop through the projects and display them
    while ($row = mysqli_fetch_assoc($result)) {
        $projectId = $row['id'];
        $projectName = $row['name'];
        $projectDescription = $row['description'];

        // Display project information
        echo "<div class='project'>";
        echo "<h3>$projectName</h3>";
        echo "<p>$projectDescription</p>";

        // Retrieve tasks associated with the project
        $taskQuery = "SELECT * FROM tasks WHERE project_id = $projectId";
        $taskResult = mysqli_query($connection, $taskQuery);

        // Check if there are any tasks for the project
        if (mysqli_num_rows($taskResult) > 0) {
           Here's the continuation of the previous code:

```php
            echo "<h4>Tasks:</h4>";
            echo "<ul>";
            
            // Loop through the tasks and display them
            while ($taskRow = mysqli_fetch_assoc($taskResult)) {
                $taskId = $taskRow['id'];
                $taskTitle = $taskRow['title'];
                $taskDescription = $taskRow['description'];
                $taskStatus = $taskRow['status'];
                
                // Display task information
                echo "<li>";
                echo "<h5>$taskTitle</h5>";
                echo "<p>$taskDescription</p>";
                echo "<p>Status: $taskStatus</p>";
                echo "</li>";
            }
            
            echo "</ul>";
        } else {
            echo "<p>No tasks found for this project.</p>";
        }
        
        echo "</div>";
    }
} else {
    echo "No projects found.";
}

// Close the database connection
mysqli_close($connection);
?>