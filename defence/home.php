<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or any other desired page
    header("Location: login.php");
    exit();
}

// Get the user's name from the session or database
$loggedInUserName = $_SESSION['user_name'];

// You can include additional logic or database queries here to fetch relevant data for the home page

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Management System - Home</title>
</head>
<body>
    <h1>Welcome, <?php echo $loggedInUserName; ?>!</h1>
    <p>This is the home page of the Task Management System.</p>
    <!-- Add more HTML content or functionality as needed -->
</body>
</html>