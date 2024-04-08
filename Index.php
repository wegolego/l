<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="istyle.css">
</head>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const table = document.querySelector("table");
    const headers = table.querySelectorAll("thead th");

    headers.forEach((header, index) => {
      header.addEventListener("click", function () {
        sortTable(index);
      });
    });

    function sortTable(columnIndex) {
      const rows = Array.from(table.querySelectorAll("tbody tr"));

      rows.sort((a, b) => {
        const cellA = a.children[columnIndex].textContent.trim();
        const cellB = b.children[columnIndex].textContent.trim();

        return cellA.localeCompare(cellB, undefined, { sensitivity: "base" });
      });

      while (table.tBodies[0].firstChild) {
        table.tBodies[0].removeChild(table.tBodies[0].firstChild);
      }

      rows.forEach((row) => {
        table.tBodies[0].appendChild(row);
      });
    }
  });
</script>

<body>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="deleted_user.php">Archive</a>
  <a href="#contact">Contact</a>
  <a href="search_results.php">Search</a>
  <a href="login.php">Log out</a>
</div>
<div class="logo-container">
        <img src="translogo.png" alt="Logo">
    </div>

    <div class="container">
        <h2>User Dashboard</h2>
<div class="search-button">
<a href="insert.php">Add User</a>
        </div>


        <table border="1">
            <thead>
                <th>Name</th>
                <th>Business</th>
				<th>View</th>
				<th>Edit</th>
				<th>Remove</th>
            </thead>
            <tbody>
                <?php
                    include('conn.php');
                    $query=mysqli_query($conn,"select * from `user`");
                    while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
							<td><a class="view-button" href="view.php?id=<?php echo $row['userid']; ?>">View</a></td>
                            <td><a class="edit-button" href="edit.php?id=<?php echo $row['userid']; ?>">Edit</a></td>
							<td><a class="delete-button" href="delete.php?id=<?php echo $row['userid']; ?>">Remove</a>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>


    
</div>

   


</body>
</html>


