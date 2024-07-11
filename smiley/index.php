<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('k.jpg'); /* Path to your background image */
            background-size: cover;
            background-position: center;
            text-align: center;
            color: #fff; /* Text color */
        }
        h1 {
            margin-top: 50px;
            margin-bottom: 30px;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        .button-container button {
            padding: 15px 30px;
            margin: 0 10px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button-container button:hover {
            background-color: rgba(0, 0, 0, 0.7); /* Darker background on hover */
        }
    </style>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <div class="button-container">
        <button onclick="window.location.href='salary_slip.html'">Salary Slips</button>
        <button onclick="window.location.href='leaves.html'">Leaves</button>
        <button onclick="window.location.href='smiley.html'">VIEW</button>
    </div>
</body>
</html>
