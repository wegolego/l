<?php
    include('conn.php');

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    // Insert the data into the 'user' table
    mysqli_query($conn, "INSERT INTO `user` (firstname, lastname) VALUES ('$firstname', '$lastname')");

    // Redirect back to the index page after insertion
    header('location: index.php');
?>
