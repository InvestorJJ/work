<?php
// Database connection parameters
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';

// Create a database connection
$connection = mysqli_connect($host, $username, $password);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Create the task management system database
$databaseName = 'task_management_system';
$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $databaseName";
mysqli_query($connection, $createDatabaseQuery);

// Select the task management system database
mysqli_select_db($connection, $databaseName);

// Create the 'tasks' table
$createTasksTableQuery = "
    CREATE TABLE IF NOT EXISTS tasks (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        status VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
";
mysqli_query($connection, $createTasksTableQuery);

// Close the database connection
mysqli_close($connection);

echo "Database setup completed successfully!";
?>