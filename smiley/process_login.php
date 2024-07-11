<?php
// Include database connection and authentication functions
include 'db_connect.php';

// Start session
session_start();

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Authenticate user
if (authenticateUser($email, $password)) {
    // Store email in session
    $_SESSION['email'] = $email;
    
    // Redirect to index.php upon successful login
    header("Location: index.php");
    exit(); // Ensure that no further code is executed after redirection
} else {
    // If authentication fails, provide a warning
    echo "Error: Invalid email or password. Please try again.";
}
?>
