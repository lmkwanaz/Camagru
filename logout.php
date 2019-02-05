<?php
    
    include_once 'config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }

    $_SESSION['username'] = "";
    $_SESSION['password'] = "";
    $_SESSION['user_id'] = "";
    header("Location: ./login.php");
?>