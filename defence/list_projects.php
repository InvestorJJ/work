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
        
        // Generate a link to view project details
        echo "<a href='project_details.php?id=$projectId'>View Details</a>";
        
        echo "</div>";
    }
} else {
    echo "No projects found.";
}

// Close the database connection
mysqli_close($connection);
?>