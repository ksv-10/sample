<?php

// Database configuration
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "main"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $leave_type = $_POST["leave_type"];
    $leave_date_from = $_POST["leave_date_from"];
    $leave_date_to = $_POST["leave_date_to"];
    $reason = $_POST["reason"];

    // SQL query to insert data into database
    $sql = "INSERT INTO LeaveApplications (email, leave_type, leave_date_from, leave_date_to, reason) VALUES ('$email', '$leave_type', '$leave_date_from', '$leave_date_to', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "Leave application submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

?>
