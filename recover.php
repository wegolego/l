<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Get the user data to be recovered
        $query = mysqli_query($conn, "SELECT * FROM `deleted_user` WHERE userid='$id'");
        $row = mysqli_fetch_array($query);

        if ($row) {
            // Move the data back to the 'user' table and remove it from the 'deleted_user' table
            mysqli_query($conn, "INSERT INTO `user` (firstname, lastname) VALUES ('{$row['firstname']}', '{$row['lastname']}')");
            mysqli_query($conn, "DELETE FROM `deleted_user` WHERE userid='$id'");

            header('location: index.php');
        } else {
            // Handle the case where the user data doesn't exist in the 'deleted_user' table
            echo "User data not found for recovery.";
        }
    }
}
?>
