<?php
include_once 'database.php';

/* if (isset($_GET['submit']))
{
    try{
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $query = "INSERT INTO users (username, email, password) VALUES ( '" . $_GET['username'] . "','" .$_GET['email'] . "','" .$_GET['password']."');";
    $db->exec($query);
    }
    catch(PDOexception $e){
        echo $e->getmassage();
    }
} */
/* var_dump($_POST); */

//$passwd = password_hash(htmlentities($_POST['password']) , DEFAULT_PASSWORD);
//$hash = md5( rand(0,1000) );

try{
    $db  = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $query = "SELECT * FROM users where  username = :username OR email = :email";
    $stmt= $db->prepare($query);
    $stmt->bindparam(':username', $_POST['username']);
    $stmt->bindparam(':email', $_POST['email']);
    $stmt->execute();
    $result = $stmt->fetchall();
    // die("hard");
    if(count($result) == 0){
        if ($_POST['password'] === $_POST['Repassword']){
            try{
                $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $query = "INSERT INTO users (username, email, password)
                VALUES (:username, :email, :password)";
                $stmt= $db->prepare($query);
            
                $stmt->bindparam(':username', $_POST['username']);
                $stmt->bindparam(':email', $_POST['email']);
                $pass = hash('sha256', $_POST['password']);
                $stmt->bindparam(':password', $pass);
                $stmt->execute();

                echo 'you are now registered!';

                $massage = 
                "
                Hi ". $_POST['name'] ."
                Confirm your Email

                click on the link below to veify your account
                http://localhost:8080/camagruz/verify.php?email=".$_POST['email'];
               
                mail($_POST['email'], "camagru email confirmation", $massage,"camagru");
                echo '<script>alert("Please verify your email address");</script>';
                
            }
            catch(PDOexception $e){
                echo $e->getmessage();
            } 
          }     
    }
    header("Location: ./register.php");
}
catch(PDOexception $e){
    echo $e->getmessage();
}

?>