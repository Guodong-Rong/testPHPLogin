<?php
// Include the database connection file
include 'conn.php';

// Start a session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login Page</h2>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <?php
            // Check if the user is logged in
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                // Display the navigation item only when logged in
                echo '<li><a href="contactUs.php">Contact</a></li>';
            }
            ?> 
        </ul>
    </nav>
    <!-- <form action="loginProcess.php" method="post"> -->
    <form action="loginCallNoProcedureProcess.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
