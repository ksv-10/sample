<?php
// Database configuration
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "smiley"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($data)));
}

// Function to hash passwords
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to store user registration data
function registerUser($fullName, $lastName, $dob, $gender, $nationality, $address, $city, $state, $country, $email, $contactNumber, $employeeType, $password) {
    global $conn;

    $fullName = sanitizeInput($fullName);
    $lastName = sanitizeInput($lastName);
    $dob = sanitizeInput($dob);
    $gender = sanitizeInput($gender);
    $nationality = sanitizeInput($nationality);
    $address = sanitizeInput($address);
    $city = sanitizeInput($city);
    $state = sanitizeInput($state);
    $country = sanitizeInput($country);
    $email = sanitizeInput($email);
    $contactNumber = sanitizeInput($contactNumber);
    $employeeType = sanitizeInput($employeeType);
    $password = hashPassword($password);

    $sql = "INSERT INTO users (fullname, lastname, dob, gender, nationality, address, city, state, country, email, contact, employee_type, password) 
            VALUES ('$fullName', '$lastName', '$dob', '$gender', '$nationality', '$address', '$city', '$state', '$country', '$email', '$contactNumber', '$employeeType', '$password')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to authenticate user login
function authenticateUser($email, $password) {
    global $conn;

    $email = sanitizeInput($email);
    $password = sanitizeInput($password);

    $sql = "SELECT id, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            return true;
        }
    }
    return false;
}
?>
