<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form.example {
            overflow: hidden;
            margin-bottom: 20px;
        }

        form.example input[type=text] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }

        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 16px;
            border: 1px solid #ccc;
            border-left: none;
            cursor: pointer;
        }

        form.example button:hover {
            background: #0b7dda;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button a:hover {
            background-color: #45a049;
        }
        .filter-dropdown {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #fff;
        width: 120px; /* Adjust width as needed */
        float: right;
        margin-right: 10px; /* Add some spacing to the right of the select */
    }

    /* Style for the options within the select */
    .filter-dropdown option {
        background-color: #fff;
        color: #333;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Search Results</h2>

        <form method="GET" action="search_results.php" class="example">
            <label for="search" class="visually-hidden">Search:</label>
            <input type="text" id="search" name="search" placeholder="Search..." required>

            <label for="filter" class="visually-hidden">Filter by:</label>
            <select id="filter" name="filter" class="filter-dropdown">
    <option value="firstname">Name</option>
    <option value="lastname">Business</option>
    <!-- Add more options as needed -->
</select>

            <button type="submit">Search</button>
        </form>

        <table>
            <thead>
                <th>User ID</th>
                <th>Name of Owner</th>
                <th>Business Name</th>
                <!-- Add more columns as needed -->
            </thead>
            <tbody>
                <?php
                include('conn.php');

                if (isset($_GET['search'])) {
                    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
                    $filter = isset($_GET['filter']) ? $_GET['filter'] : 'firstname';

                    $query = mysqli_query($conn, "SELECT * FROM `user` WHERE $filter LIKE '%$searchTerm%'");

                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<td>{$row['userid']}</td>";
                        echo "<td>{$row['firstname']}</td>";
                        echo "<td>{$row['lastname']}</td>";
                        // Add more columns as needed
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No results found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="back-button">
            <a href="index.php">Back to Previous Page</a>
        </div>
    </div>
</body>

</html>
