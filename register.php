<?php

if (isset($_GET['success']))
{
    // echo "<script>window.alert(you are now registered); console.log('registered'); </script>";
    echo '<script type="text/javascript">alert("you are now registered please verify your email");</script>';
} 
?>x
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style/stylie.css">
		<title>camagru</title>
    </head>
    <body>
    <div class="bg-image"></div>
    <div class="action">
    <div class="bg-text">
    <form action="reg.php" method="post">
        <div class="container">
            <h1>Register</h1>
            <p>please fill this form to create an account.</p>
            <hr>


            <label for="username"><b>username</b></label>
            <input type="text" placeholder="Enter username" name="username" id="username" required/>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required/>
            <label for="password">password</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="must contain at least one number and one uppercase and lowercase, and at least 8 or more characters" required/>
            <label for="Repassword">Repeat password</label>
            <input type="password" placeholder="Repeat Password" data-equalto="password" name="Repassword" id="Repeat password" required/>
            <hr>
            <button type="submit" class="registerbtn">Register</button>
            <!-- <a href="register.php">Register</a> -->
            <!--</div>-->
            <div class="container signin">
            <p>already have an account? <a href="login.php">Sign in</a>.</p>
            <p>do you want to <a href="index.php">Sign out</a>?</p> 

        </div>
</div>
    </form>
</div>
</div>
    </body>
</html>