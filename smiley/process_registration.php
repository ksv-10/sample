<?php
include 'db_connect.php';

// Retrieve form data
$fullName = $_POST['fullName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$email = $_POST['email'];
$contactNumber = $_POST['contactNumber'];
$employeeType = $_POST['employeeType'];
$password = $_POST['password'];

// Register user
if (registerUser($fullName, $lastName, $dob, $gender, $nationality, $address, $city, $state, $country, $email, $contactNumber, $employeeType, $password)) {
    // Registration successful, redirect to login.html
    header("Location: login.html");
    exit; // Ensure no further output is sent
} else {
    echo "Error: Registration failed";
}
?>
