<?php
include('conn.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM `user` WHERE userid='$id'");
    $row = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
    max-width: 800px;
    margin: 20px auto; /* Add margin-top and margin-bottom to move the content lower */
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}


        h2 {
            text-align: center;
            color: #333;
        }

        .user-details {
            text-align: left;
            margin: 20px;
        }

        .user-details label {
            font-weight: bold;
            color: #555;
        }

        .user-details span {
            color: #333;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
        }

        .back-link a:hover {
            background-color: #0056b3;
        }
        .logo-container {
            width: 200px; /* Adjust the width as needed */
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
        }

        .logo-container img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<div class="logo-container">
        <img src="bfplogo.png" alt="Logo">
    </div>
    <div class="container">
        <h2>View User</h2>
        <div class="user-details">
            <label>Name:</label>
            <span><?php echo $row['firstname']; ?></span>
        </div>
        <div class="user-details">
            <label>Business:</label>
            <span><?php echo $row['lastname']; ?></span>
        </div>
        <div class="back-link">
            <a href="index.php">Back to User Dashboard</a>
        </div>
    </div>
</body>
</html>
