<?php
// Include the database connection file
include 'conn.php';

// Start a session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from login.php
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepare the SQL query to check the username and password
    $stmt = $conn->prepare("SELECT COUNT(*) as user_count FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $input_username, $input_password);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result()->fetch_assoc()['user_count'];

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Check the result
    if ($result == 1) {
        // Set a session variable to indicate the user is logged in
        $_SESSION['logged_in'] = true;

        // Redirect to the home page or any other page
        header('Location: index.php');
        exit;
    } else {
        // Invalid credentials, redirect back to the login page
        header('Location: login.php');
        exit;
    }
} else {
    // If the form is not submitted, redirect to the login page
    header('Location: login.php');
    exit;
}
?>
