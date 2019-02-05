<?php
    include_once 'config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM `gallery` ORDER BY time_stamp DESC", PDO::FETCH_ASSOC)->fetchAll();
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <title>camagru</title>
    </head>
    <body>
    <div class="back-image"></div>
         <div class="styles">
        <a href="login.php">Log in<br/></a>
        <a href="register.php">Register</a>
        <br/>
        <br/>
        <p>Camagru</p>
        <p>do you want to go to the<br/><a href="gallery2.php">Gallery</a></p>
        </div>
            <div class="footer">
                <footer>@lmkwanaz</footer>
            </div>
    </body>
</html>