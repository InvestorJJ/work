<?php
// Assuming you have a database connection established

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Perform validation on the form data
    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Check if there are any validation errors
    if (count($errors) === 0) {
        // Update the user's profile in the database
        // Assuming you have a user table in the database
        // and the user's profile is associated with a specific user ID

        // Retrieve the user ID from session or any other means
        $userId = 123; // Replace with the actual user ID

        // Perform the database query to update the user's profile
        // Here's an example using PDO
        $sql = "UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'id' => $userId
        ]);

        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            // Profile updated successfully
            // Redirect to the profile page or display a success message
            header("Location: profile.php");
            exit();
        } else {
            // Failed to update the profile
            $errors[] = "Failed to update the profile. Please try again.";
        }
    }
}

// If the form is not submitted or there are validation errors, display the form and errors
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Management System - Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>

    <?php
    // Display validation errors, if any
    if (isset($errors) && count($errors) > 0) {
        echo '<div class="error-container">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    }
    ?>

    <form method="POST" action="update_profile.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required><br>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" value="<?php echo isset($role) ? $role : ''; ?>" required><br>

        <!-- Add more input fields for additional profile details, if needed -->

        <input type="submit" value="Update Profile">
    </form>

    <!-- Add more HTML content or functionality as needed -->
</body>
</html>