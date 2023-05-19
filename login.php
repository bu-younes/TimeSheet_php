<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = 'timesheet';

// Check if the form has been submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the entered name and password
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  // Connect to the database
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

  // Check if the connection was successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Escape user input to prevent SQL injection
  $name = mysqli_real_escape_string($conn, $name);
  $password = mysqli_real_escape_string($conn, $password);

  // Create the SQL query to select the user with the entered name, password, and designation
    $sql = "SELECT * FROM register WHERE name = '$name' AND password = password('$password') ";
   //exit();
  // Execute the query and get the result
  $result = mysqli_query($conn, $sql);

  // Check if the query was successful and if a user was found
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['user'] = $row['name'];
    //print_r($_SESSION);exit();
    // Get the user information
    
    // Redirect the user 
        header("Location: dashboard.php");




  } else {

    // If no user was found, show an error message
    echo "Invalid login credentials";

  }

  // Close the database connection
  mysqli_close($conn);
}
?>





<!DOCTYPE html>
<html>
<head>
    <title>Login - Tech Mahindra System</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        form {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            margin: 50px auto;
            padding: 20px;
            text-align: center;
            width: 400px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 14px;
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #0077cc;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
        }

        input[type="submit"]:hover {
            background-color: #005da8;
        }

        
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        /* Navigation bar */
        nav {
            background-color: #0077cc;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        nav li {
            display: inline-block;
            margin: 0 10px;
        }

        nav a {
            color: #fff;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <h1>Tech Mahindra</h1>

    </ul>
</nav>
<h3 style="text-align: center;">Please enter your username and password. <a href="register.php">Register</a> if you don't have an account.</h3>
<form method="POST" action="login.php">
    <h2>Login</h2>
    <label for="user">User Name/Email ID:	</label>
    <input type="text" id="user" name="name" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Login">
</form>
</body>
</html>
