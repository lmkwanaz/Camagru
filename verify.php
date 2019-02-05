<?php

include_once 'config/core/init.php';
include_once 'config/database.php';

try{
    $db = new PDO("mysql:host=$host;bdname=$dbname", $username, $password);
    echo "dbname :".$dbname;
    echo "username :".$username;
    $query = "SELECT * FROM users WHERE username = :username OR email = :email";
    $stmt = $db->prepare($query);

    $stmt->bindparam(':username', $_POST['username']);
    $stmt->bindparam(':email', $_POST['email']);
    $stmt->execute();
    $result = $stmt->fetchall();
    if(count($result) == 1){
        $query = "UPDATE users SET user_isValidated = 1 WHERE username = :username";
        $stmt->bindparam(':username', $_POST['username']);
        $stmt->execute();
        echo "User has been updated...";
    }else{
        echo "User doesn't exist";
    }
    header("Location: login.php");
}catch(PDOException $e){
    echo "Error".$e;

}

?>
