<?php

// New password change approach


// step 1: change users password to random genrated password
//step 2: email user the new password advising them to change it once they log in




//include_once 'config/core/init.php';
include_once 'config/database.php';
if (isset($_POST['submit']))
{
    try{
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $query = "SELECT email FROM users WHERE email = :email";
        $stmt = $db->prepare($query);

        $stmt->bindparam(':email', $_POST['email']);
        $stmt->execute();
        $result = $stmt->fetchAll();
        // die($_POST['email']);
        // die(var_dump($result));
        if(count($result) == 1) {
        // if($UserExist = $stmt->fetch(PDO::FETCH_ASSOC)){
            $email = $_POST['email'];

            // //
            // $activation_hash = md5(rand(0,9999));
            // ////STEP 2: add hash to user record in database
            // //////Step 3: 
            // //$name = $_POST['username'];
            
            $massage = 
            "
            Hi 
            Confirm your Email

            click on the link below to veify your account
            http://localhost:8080/camagru/reset_pwd.php?email=".$email;
            
            mail($email, "camagru email confirmation", $massage, "camagru");
            echo '<script>alert("Please verify your email address");</script>';
                    
        }else{
            echo "User doesn't exist";
        }

    }catch(PDOException $e){
        echo "Error".$e;

    }
}

 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/stylie.css">
    <div class="bg-img"></div>
</head>
    <body>
        <div class="bg-image"></div>
        <div class="action">
            <div class="bg-text">
                <form action="" method="POST">
                    <div class="container">
                        <h2>Forgot Password?</h2><br><br>
                        <label for="email"></label>
                        <input type="email" placeholder="Enter email" name="email" required/>
                        <input type="submit" name="submit" value="submit"><br/>
                        <a href="login.php">exit?</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>