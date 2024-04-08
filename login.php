<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
    
    <style>
         body {
            display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url() no-repeat;
    background-size: cover;
    background-position: center;
      }
      .button {
            background-color: #007BFF;
            border: none;
            color: #fff;
            padding: 10px 15px;
            margin: 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }
        body {
            display: flex;
    justify-content: flex-end; /* Move content to the right */
    align-items: center;
    height: 100vh;
    flex-direction: column;
    background-color: white
    color: #fff;
}

* {
	font-family: 'Courier New', monospace; /* Menacing font */
	box-sizing: border-box;
}

form {
    width: 500px;
    border: 2px solid #666;
    padding: 30px;
    background: #444;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    margin-left: 80px; /* Adjust the margin to create space on the right */
    margin-bottom: 100px;
}



h2 {
	text-align: center;
	margin-bottom: 40px;
	color: #ff5733; /* Menacing orange-red */
}

input {
	display: block;
	border: 2px solid #777; /* Darker border */
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
	background-color: #555; /* Dark input background */
	color: #fff; /* Light text */
}

label {
	color: #999; /* Lighter text */
	font-size: 18px;
	padding: 10px;
}

button {
	float: right;
	background: #ff5733; /* Menacing orange-red */
	padding: 10px 15px;
	color: #222; /* Dark text */
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}

button:hover {
	opacity: 0.7;
}

.error,
.success {
	background: #222; /* Dark background */
	color: #ff5733; /* Menacing orange-red */
	padding: 10px;
	width: 95%;
	border-radius: 5px;
	margin: 20px auto;
}

h1 {
	text-align: center;
	color: #ff5733; /* Menacing orange-red */
}

.ca {
	font-size: 14px;
	display: inline-block;
	padding: 10px;
	text-decoration: none;
	color: #999; /* Lighter text */
}

.ca:hover {
	text-decoration: underline;
}

.btn-group button {
	background-color: #ff5733; /* Menacing orange-red */
	border: 1px solid #666; /* Darker border */
	color: #222; /* Dark text */
	padding: 15px 75px;
	cursor: pointer;
	float: center;
	font-family: 'Courier New', monospace; /* Menacing font */
}

.btn-group:after {
	content: "";
	clear: both;
	display: table;
}

.btn-group button:not(:last-child) {
	border-right: none;
}

.btn-group button:hover {
	background-color: #222; /* Dark background on hover */
}
.logo {
    position: relative;
    top: 250px; /* Adjust the top position to create space below the form */
    margin-left: 20px; /* Adjust the left margin as needed */
	width: 250px; /* Adjust the width to your desired size */
    height: auto; /* Maintain the aspect ratio */
}

    </style>
	<script>
    window.history.forward();
    function noBack() { window.history.forward(); }
</script>
</head>
<body>

     <form action="log.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

	
     	<button type="submit" class ="button">Login</button>
        
          <a href="signup.php" class="ca">Create an account</a>
     </form>
	
</body>
</html>