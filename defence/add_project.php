<?php
// Assuming you have a database connection established

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve project data from the form
    $projectName = $_POST['projectName'];
    $projectDescription = $_POST['projectDescription'];

    // Insert the project into the database
    // Change the query according to your database schema and table names
    $insertQuery = "INSERT INTO projects (name, description) VALUES ('$projectName', '$projectDescription')";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        echo "Project added successfully.";
    } else {
        echo "Error adding project: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!-- HTML form to add a new project -->
<form method="POST" action="">
    <label for="projectName">Project Name:</label>
    <input type="text" name="projectName" id="projectName" required>

    <label for="projectDescription">Project Description:</label>
    <textarea name="projectDescription" id="projectDescription" required></textarea>

    <input type="submit" value="Add Project">
</form>