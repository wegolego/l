<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];

    // Perform the delete operation
    $deleteQuery = mysqli_query($conn, "DELETE FROM `deleted_user` WHERE userid = $user_id");

    if ($deleteQuery) {
        // Move the user to the `deleted_user` table (adjust this based on your schema)
        $insertDeletedQuery = mysqli_query($conn, "INSERT INTO `deleted_user` SELECT * FROM `deleted_user` WHERE userid = $user_id");

        if ($insertDeletedQuery) {
            // Successful delete and move to the archive
            header("Location: deleted_user.php");
            exit();
        } else {
            echo "Error moving user to archive: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>
