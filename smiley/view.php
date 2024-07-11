<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Salary Slips</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
        }
        .salary-block {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .salary-details {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>View Salary Slips</h2>
        <?php
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

        // SQL query to retrieve all salary slips grouped by email
        $sql = "SELECT email, salary_month, total_salary, deductions, net_salary FROM salary_slips ORDER BY email";
        $result = $conn->query($sql);

        // Initialize variables for grouping
        $current_email = null;

        // Check if there are rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $email = $row["email"];
                $salary_month = $row["salary_month"];
                $total_salary = $row["total_salary"];
                $deductions = $row["deductions"];
                $net_salary = $row["net_salary"];

                // If email changes, start a new salary block
                if ($email !== $current_email) {
                    // Close previous salary block if exists
                    if ($current_email !== null) {
                        echo "</div>"; // Close previous salary block
                    }
                    // Start a new salary block
                    echo "<div class='salary-block'>";
                    echo "<h3>$email</h3>";
                    $current_email = $email;
                }

                // Display salary details
                echo "<div class='salary-details'>";
                echo "<p>Salary Month: $salary_month</p>";
                echo "<p>Total Salary: $total_salary</p>";
                echo "<p>Deductions: $deductions</p>";
                echo "<p>Net Salary: $net_salary</p>";
                echo "</div>";
            }
            // Close the last salary block
            echo "</div>";
        } else {
            echo "No salary slips found.";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
