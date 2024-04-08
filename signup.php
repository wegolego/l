<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="styless.css">
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
            background-color:#373c42;
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
        .logo-container {
            width: 200px; /* Adjust the width as needed */
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
        }

        .logo-container img {
            width: 100%;
            height: auto;
        }

        .main-content {
            margin-left: 220px; /* Adjust the margin based on the width of the logo container + some space */
            padding: 20px;
        }

    </style>
</head>
<body>

     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>User Name</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirm Password"><br>

     	<button type="submit" class="button">Sign Up</button>
          <button class="button"><a href="login.php" class="button">Back</a></buttton>
     </form>
</body>
</html>