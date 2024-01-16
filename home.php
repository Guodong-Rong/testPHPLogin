<?php
// Start the session
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

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

    <?php
    // Display functions if the user is logged in
    if ($loggedIn) {
        echo '<button type="button">My Function</button>';
    } else {
        echo '<p>Please log in to use this functionality.</p>';
        echo '<a href="login.php"><button type="button">Login</button></a>';
    }
    ?>

    <p><a href="logout.php">Logout</a></p>
