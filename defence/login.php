<?php
// Assuming you have a database connection established

// Function to validate user credentials
function validateUser($username, $password, $connection) {
    // Change the query according to your database schema and table names
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $hashedPassword = $user['password'];

        // Verify the password using password_verify() function
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, user is authenticated
            return true;
        }
    }

    // Invalid credentials
    return false;
}

// Check if the login form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user credentials
    if (validateUser($username, $password, $connection)) {
        // User is authenticated, perform further actions (e.g., redirect to dashboard)
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials, display error message
        $errorMessage = "Invalid username or password.";
    }
}

// Check if the signup form is submitted
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password using password_hash() function
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save the user to the database (change the query according to your database schema and table names)
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    mysqli_query($connection, $query);

    // Perform further actions after successful signup (e.g., redirect to login page)
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($errorMessage)) { ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php } ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Login">
            </div>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</body>
</html>