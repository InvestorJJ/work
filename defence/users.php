<?php
// Assuming you have a database connection established

// Retrieve users from the database
// Change the query according to your database schema and table names
$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);

// Check if there are any users
if (mysqli_num_rows($result) > 0) {
    // Loop through the users and display them
    while ($row = mysqli_fetch_assoc($result)) {
        $userId = $row['id'];
        $userName = $row['name'];
        $userEmail = $row['email'];

        // Display user information
        echo "<div class='user'>";
        echo "<h3>$userName</h3>";
        echo "<p>Email: $userEmail</p>";
        echo "</div>";
    }
} else {
    echo "No users found.";
}

// Close the database connection
mysqli_close($connection);
?>