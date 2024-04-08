<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

        // Check if the user already exists in the 'user' table
        $checkQuery = mysqli_query($conn, "SELECT * FROM `user` WHERE userid='$user_id'");
        
        if (mysqli_num_rows($checkQuery) == 0) {
            // The user does not exist in 'user' table, proceed with recovery
            $recoverQuery = mysqli_query($conn, "INSERT INTO `user` SELECT * FROM `deleted_user` WHERE userid='$user_id'");
            
            if ($recoverQuery) {
                // Successful recovery, now delete the user from 'deleted_user' table
                $deleteQuery = mysqli_query($conn, "DELETE FROM `deleted_user` WHERE userid='$user_id'");
                
                if ($deleteQuery) {
                    // Successful deletion from 'deleted_user' table
                    header("Location: index.php"); // Redirect to the dashboard or any other appropriate page
                    exit();
                } else {
                    // Handle deletion failure
                    echo "Deletion from 'deleted_user' table failed. Please try again.";
                }
            } else {
                // Handle recovery failure
                echo "Recovery failed. Please try again.";
            }
        } else {
            // Handle case where user already exists in 'user' table
            echo "User already exists in the 'user' table.";
        }
    }
}
?>
