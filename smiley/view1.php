<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Applications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

.leave-application {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
    max-width: 600px; /* Reduced maximum width */
    margin-left: auto;
    margin-right: auto;
}

        .leave-application h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .leave-application p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Leave Applications</h1>

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

    // SQL query to retrieve data and group by email
    $sql = "SELECT email, leave_type, leave_date_from, leave_date_to, reason FROM LeaveApplications ORDER BY email";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data grouped by email
        $current_email = null;
        while ($row = $result->fetch_assoc()) {
            if ($current_email !== $row["email"]) {
                // New email encountered, display header
                if ($current_email !== null) {
                    echo "</div>"; // Close previous block
                }
                $current_email = $row["email"];
                echo "<div class='leave-application'>";
                echo "<h2>Email: $current_email</h2>";
            }
            // Display leave application details
            echo "<p><strong>Leave Type:</strong> " . $row["leave_type"] . "</p>";
            echo "<p><strong>Leave Date From:</strong> " . $row["leave_date_from"] . "</p>";
            echo "<p><strong>Leave Date To:</strong> " . $row["leave_date_to"] . "</p>";
            echo "<p><strong>Reason:</strong> " . $row["reason"] . "</p>";
            echo "<hr>";
        }
        echo "</div>"; // Close the last block
    } else {
        echo "No data found";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
