<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // User is logged in, display the page content
} else {
    // User is not logged in, still display this page content
    // header('Location: login.php');
    // exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>
<body>
<h2>About Page</h2>
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
    <p>You can always view this page even if you have not logged in.</p>
</body>
</html>