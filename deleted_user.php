<!DOCTYPE html>
<html>
<head>
    <title>Deleted User Table</title>
    <link  rel="stylesheet" href= "deletestyle.css">
</head>
<body>
<div class="topnav">
<a class="active" href="index.php">Home</a>
  <a href="deleted_user.php">R/D BIn</a>
  <a href="#contact">Contact</a>
  <a href="search_results.php">Search</a>
  <a href="login.php">Log out</a>
</div>
    <div class="container">
        <h2>Deleted User Table</h2>
        <table>
            <thead>
                <th>User ID</th>
                <th>Name</th>
                <th>Business</th>
                <th>Deleted Date</th>
                <th>Recovery</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $query = mysqli_query($conn, "SELECT * FROM `deleted_user`");
                while ($row = mysqli_fetch_assoc($query)) {
                    $user_id = $row['userid'];
                    $first_name = $row['firstname'];
                    $last_name = $row['lastname'];
                    $deleted_at = $row['deleted_date'];

                    echo "<tr>";
                    echo "<td>$user_id</td>";
                    echo "<td>$first_name</td>";
                    echo "<td>$last_name</td>";
                    echo "<td>$deleted_at</td>";
                    echo "<td>";
                    echo "<form class='recovery-form' method='post' action='recover_user.php'>";
                    echo "<input type='hidden' name='user_id' value='$user_id'>";
                    echo "<button type='submit' class='recovery-button'>Recover</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "<td>";
                    echo "<form class='delete-form' method='post' action='deleted.php'>";
                    echo "<input type='hidden' name='user_id' value='$user_id'>";
                    echo "<button type='submit' class='delete-button'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                    
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>