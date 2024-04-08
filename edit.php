<!DOCTYPE html>
<html>
<head>
    <title>Advanced MySQLi Editing</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('translogo.png');
            background-size:300px ;
            background-repeat: no-repeat;
            background-color: white;
        }

        .container {
            max-width: 2000px; /* Increase the max-width for a wider form */
            background-color: white;
            padding: 50px; /* Increase padding for more space inside the form */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 20px;
            color: #555;
        }

        input[type="text"] {
            padding: 15px; /* Increase padding for larger text input */
            margin-bottom: 50px; /* Increase margin for more separation between input fields */
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 15px; /* Increase padding for larger button */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            text-align: center;
            text-decoration: none;
            color: #007BFF;
            display: inline-block;
            margin-top: 20px; /* Increase margin for more separation from the submit button */
        }

        a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>User Profile Editing</h2>
        <?php
        include('conn.php');
        $id = $_GET['id'];
        
        // Check if the ID is set and valid
        if (isset($id) && is_numeric($id)) {
            $query = mysqli_query($conn, "SELECT * FROM `user` WHERE userid = '$id'");
            $row = mysqli_fetch_array($query);
            
            // Check if data was retrieved
            if ($row) {
        ?>
        <form method="POST" action="update.php?id=<?php echo $id; ?>">
            <label for="firstname">Name:</label>
            <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>">
            
            <label for="lastname">Business:</label>
            <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>">
            
            <input type="submit" name="submit" value="Submit">
            
            <a href="index.php">Back to Dashboard</a>
        </form>
        <?php
            } else {
                echo "<p>User not found.</p>";
            }
        } else {
            echo "<p>Invalid or missing user ID.</p>";
        }
        ?>
    </div>
</body>
</html>
