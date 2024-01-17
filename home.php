<?php
// Turn off all error reporting
error_reporting(0);
// Start the session
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$result_username = $_SESSION['result_username'];

// Function to check if the user is logged in and enable the button accordingly
function isUserLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Welcome to the Home Page</h2>

    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
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

    <?php
    // Display functions if the user is logged in
    if ($loggedIn && $result_username != null) {
        echo '<p>'.htmlspecialchars($result_username). ' logged in.</p>';
    } else {
        echo '<p>Please log in to use this functionality.</p>';
        echo '<a href="login.php"><button type="button">Login</button></a>';
    }


    ?>

    <p><a href="logout.php">Logout</a></p>
