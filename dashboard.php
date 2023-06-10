<?php
// Your authentication logic comes here
// ...

// If the user is authenticated, proceed to the homepage
// ...

// Connect to the MySQL database in XAMPP
$servername = "localhost";
$dbusername = "username";
$dbpassword = "password";
$dbname = "db_authorize";


$conn = mysqli_connect('localhost', 'root', '','db_authorize');
if($conn === false){
        die("ERROR: Could not connect. " .mysqli_connect_error());
    }

  // Replace with the user's ID or retrieve it based on the authenticated user

// Retrieve and display database details
$sql = "SELECT * FROM users"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <style>
        body {
            display: flex;
            flex-direction: row;
            background-color:teal;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #f1f1f1;
            width: 200px;
            display: flexbox; 
            padding: 10px;
        }

        .navbar a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
        }

        .navbar a:hover {
            background-color: #ccc;
        }

        .content {
            padding: 20px;
            width: calc(100% - 200px);
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .dashboard-item {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .dashboard-item h3.heat1 {
            margin-top: 0;
            font-size: 20px;
            color: brown;
        }

        .dashboard-item p {
            margin-bottom: 0;
            color: #888;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding:12px 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="homepage.php">Home</a>
        <a href="otherpage1.php">Booking</a>
        <a href="otherpage2.php">Narration</a>
        <a href="otherpage1.php">Areas</a>
        <a href="otherpage1.php">Contact us</a>

    </div>
    <div class="content">
        <h1>Welcome to the Homepage</h1>
        <h2>Database Details</h2>

        <div class="dashboard">
            <div class="dashboard-item">
                <h3 class="heat1"> Users</h3>
                <p>100</p>
            </div>
            <div class="dashboard-item">
                <h3>New Entries</h3>
                <p>10</p>
            </div>
            <div class="dashboard-item">
                <h3>Revenue</h3>
                <p>$1000</p>
            </div>
        </div>

        <h2>Database Details</h2>
       
        <?php
    

        // if ($result->num_rows > 0) {
        //     echo "<table>
        //         <tr>
        //             <th>Column 1</th>
        //             <th>Column 2</th>
               
        //             <!-- Add more column headers as needed -->
        //         </tr>";

        //     // Output data of each row
        //     while ($row = $result->fetch_assoc()) {
        //         echo "<tr>
        //             <td>" . $row["username"] . "</td>
        //             <td>" . $row["password"] . "</td>

        //             <!-- Add more columns as needed -->
        //         </tr>";
        //     }
        //     echo "</table>";
        // } else {
        //     echo "No data available";
        // }
        

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h2>User: " . $row["user_id"] . "</h2>";

                // Retrieve and display data for the current user
                $userid = $row["user_id"]; // Assuming you have a unique user ID in your users table

                $dataSql = "SELECT * FROM users WHERE $userid = user_id "; // Replace with your table name and appropriate column names
                $dataResult = $conn->query($dataSql);

                if ($dataResult->num_rows > 0) {
                    echo "<table>
                        <tr>
                            <th>User Details</th>
                           
                            <!-- Add more column headers as needed -->
                        </tr>";

                    while ($dataRow = $dataResult->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $dataRow["user_id"] . "</td>
                            <td>" . $dataRow["username"] . "</td>
                            <td>" . $dataRow["password"] . "</td>
                        
                            <!-- Add more columns as needed -->
                        </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No data available for this user.";
                }

                echo "<br>";
            }
        } else {
            echo "No users found.";
        }
        ?>
    </div>
</body>
</html>

<?php

$conn->close();
?>
