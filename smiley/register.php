<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('r.jpg'); /* Set your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .registration-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background for better visibility */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .registration-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333; /* Set title color */
        }
        .registration-container input[type="text"],
        .registration-container input[type="password"],
        .registration-container input[type="email"],
        .registration-container input[type="date"],
        .registration-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .registration-container input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 10px 0;
        }
        .registration-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .login-link {
            text-align: center;
            margin-top: 10px;
        }
        .login-link a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Registration Form</h2>
        <form action="process_registration.php" method="post">
            <input type="text" name="fullName" placeholder="Full Name" required>
            <input type="text" name="lastName" placeholder="Last Name" required>
            <input type="date" name="dob" placeholder="Date of Birth" required>
            <select name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <input type="text" name="nationality" placeholder="Nationality" required>
            <textarea name="address" placeholder="Address" required></textarea>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="state" placeholder="State" required>
            <input type="text" name="country" placeholder="Country" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="contactNumber" placeholder="Contact Number" required>
            <select name="employeeType" required>
                <option value="" disabled selected>Select Employee Type</option>
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="contract">Contract</option>
            </select>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
        <div class="login-link">
            <a href="login.html">Already a user? Login</a>
        </div>
    </div>
</body>
</html>