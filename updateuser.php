<?php
session_start();

if (isset($_POST['submit']))
{
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        /*$query = "SELECT `password` FROM `users` WHERE `email` = :email";
        $stmt = $db->prepare($query);
        $stmt->bindparam(':email', $_POST['email']);
        $stmt->execute();
        $result = $stmt->fetchall();*/

        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $thepass = hash('sha256', $password);


        if($password == $confirmpassword){
            $query = "UPDATE `users` SET `password` = :passwd WHERE `email` = :email";
            $stmt = $db->prepare($query);
            $stmt->bindparam(':email', $_POST['email']);
            $stmt->bindparam(':passwd', $thepass);
            $stmt->execute();
            echo "User has been updated...";

        }else{
            echo "User doesn't exist";
        }
        header("Location: login.php");
    } catch(PDOException $e){
        echo "Error".$e;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <div class="bg-img"></div>
</head>
        <body>
            <div class="bg-image"></div>
        <div class="action">
    <div class="bg-text">
        <form action="" method="post">
    <div class="container">
        
        <h2>Update your account?</h2><br><br>

      <label for="email"></label>
      <input type="email" placeholder="Enter email" name="email" required/>
      <label for="password"></label>
      <input type="password" placeholder="password" name="password" required/>     
      <label for="confirmpassword"></label>
      <input type="password" placeholder="confirmpassword" name="confirmpassword" required/>           
      <button type="submit" class="registerbtn" name="submit">Register</button>
        </div>
</form>
    </div>
      </div>
        </body>
</html>