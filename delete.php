<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
        // Get the user data to be deleted
        $query = mysqli_query($conn, "SELECT * FROM `user` WHERE userid='$id'");
        $row = mysqli_fetch_array($query);

        // Move the data to the 'deleted_user' table and add the deletion date
        $deleted_date = date('Y-m-d H:i:s'); // Current date and time
        mysqli_query($conn, "INSERT INTO `deleted_user` (firstname, lastname, deleted_date) VALUES ('{$row['firstname']}', '{$row['lastname']}', '$deleted_date')");

        // Delete the record from the 'user' table
        mysqli_query($conn, "DELETE FROM `user` WHERE userid='$id'");

        header('location: index.php');
    } else {
        // If not confirmed, display the delete form
        $query = mysqli_query($conn, "SELECT * FROM `user` WHERE userid='$id'");
        $row = mysqli_fetch_array($query);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
	<style>
    .confirmation-form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 80px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center; /* Center-align the form contents */
    }

    .confirmation-form p {
        color: #333;
    }

    .confirmation-form a {
        display: inline-block;
        padding: 10px 10px;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        margin-right: 10px;
    }

    .confirmation-form .yes-button {
        background-color: #007BFF;
        color: #fff;
		float: left;
    }

    .confirmation-form .cancel-button {
        background-color: #ccc;
        color: #333;
        float: right; 
    }

    .confirmation-form a:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <center><h2>Delete User</h2></center>
    <?php if (isset($row)): ?>
        <form class="confirmation-form" action="delete.php" method="GET">
            <p>Are you sure you want to remove this user: <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>?</p>
            <a class="yes-button" href="delete.php?id=<?php echo $id; ?>&confirm=true">Yes, remove</a>
            <a class="cancel-button" href="index.php">Cancel</a>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
    </center>
    <?php else: ?>
        <p>User not found or already deleted.</p>
        <a href="index.php">Back to User Dashboard</a>
    <?php endif; ?>
</body>
</html>