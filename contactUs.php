<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // User is logged in, display the page content
} else {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit;
}

// Define variables and set to empty values
$nameErr = $emailErr = $subjectErr = $messageErr = "";
$name = $email = $subject = $message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name contains only letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate message
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = test_input($_POST["message"]);
    }

    // If all validations pass, you can proceed to handle the form data or send an email
    if (empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr)) {
        // Handle the form data or send an email here
        // For demonstration purposes, we'll just display a success message
        echo "Form submitted successfully!";
    }
}

// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactUs</title>
</head>
<body>
<h2>Contact Us Page</h2>
<p>You can only view this page when you logged in</p>
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>

        Email: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>

        Message: <textarea name="message" rows="5" cols="40"><?php echo $message;?></textarea>
        <span class="error">* <?php echo $messageErr;?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>