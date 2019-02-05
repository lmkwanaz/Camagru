<?php
// include_once 'config/database.php';

//var_dump($_POST);
/* echo $_POST['email'];
exit(); */
///
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="style/stylie.css"/>
    <div class="bg-img"></div>
</head>
<style>

</style>
<body>
    <div class="bg-image"></div>
    <div class="action">
        <div class="bg-text">
<form action="log.php" method="post">
<div class="container">
    <label for="username">username</label>
    <input type="text" placeholder="Enter username" name="username" id="username" required/>
    <label for="password">password</label>
    <input type="password" placeholder="Enter Password" name="password" id="password"/>
    <input type="submit" name="submit"><br/>
    <a href="forgot_user.php">forgot password?</a>
    <p>want to <a href="index.php">log out</a>.</p>
    </div>
</form>
</div>
</div>
</body>
</html>

