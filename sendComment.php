<?php

    include_once 'config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }

    if (isset($_POST['img_id']) && isset($_POST["comment"]) && isset($_POST['email']))
    {
        $img_id = $_POST['img_id'];
        $email = $_POST['email'];
        $comment = $_POST["comment"];
        $user = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
        $commentQuery = "INSERT INTO `comments`(`img_id`, `user_id`, `comment`) VALUES(?, ?, ?)";
        $commentResult = $conn->prepare($commentQuery);
        $commentResult->execute([$img_id, $user_id, $comment]);
        $conn->exec("COMMIT");
        //if ($notif == '1')
        //{
            sendEmail($email, $user." commented to your picture: ".$comment, "Commented picture.");
        //}
        echo "Comment sent";
    }
    else{
        echo "Something went wrong";
    }

    function sendEmail($to, $msg, $sbj)
    {
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "you@camagru.com";
        $header = "From:" . $from;

        mail($to, $sbj, $msg, $header);
    }
?>