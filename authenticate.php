<?php
// Retrieve username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the MySQL database in XAMPP
$servername = "localhost";
$dbusername = "username";
$dbpassword = "password";
$dbname = "db_authorize";

$conn = mysqli_connect('localhost', 'root', '','db_authorize');
if($conn === false){
        die("ERROR: Could not connect. " .mysqli_connect_error());
    }

// Query the database to authenticate the user
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Authentication successful
    echo "Login successful!";
    header("location: dashboard.php");
    exit();
} else {
    // Authentication failed
    echo "Invalid username or password.";
}

// Close the database connection
$conn->close();
?>
