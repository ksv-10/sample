<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['email']) && isset($_POST['salary_month']) && isset($_POST['total_salary']) && isset($_POST['deductions'])) {
        // Retrieve form data
        $email = $_POST['email'];
        $salary_month = $_POST['salary_month'];
        $total_salary = $_POST['total_salary'];
        $deductions = $_POST['deductions'];

        // Calculate net salary
        $net_salary = $total_salary - $deductions;

        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "main";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert data into the table
        $sql = "INSERT INTO salary_slips (email, salary_month, total_salary, deductions, net_salary) 
                VALUES ('$email', '$salary_month', '$total_salary', '$deductions', '$net_salary')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Salary slip generated successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "Error: All fields are required.";
    }
} else {
    echo "Error: Form not submitted.";
}
?>
