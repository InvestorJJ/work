<?php
// Assuming you have a database connection established

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
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
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
                <input type="submit" name="signup" value="Sign Up">
            </div>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>