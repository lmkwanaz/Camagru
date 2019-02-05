<?php

    include_once 'config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }

    if (isset($_POST['img_id']) && isset($_POST['img_id']))
    {
        $img_id = $_POST['img_id'];
        $email = $_POST['email'];
        $user_id = $_SESSION['user_id'];
        $user = $_SESSION['username'];
        $isLiked = $conn->query("SELECT * FROM `likes` WHERE `img_id` = '$img_id' AND `user_id` = '$user_id'");
        if ($isLiked->rowCount())
        {
            $unLikeQuery = "DELETE FROM `likes` WHERE `img_id` = ? AND `user_id` = ?";
            $unLikeResult = $conn->prepare($unLikeQuery);
            $unLikeResult->execute([$img_id, $user_id]);
            //if ($notif == '1')
            //{
                sendEmail($email, $user." un-liked you picture.", "UN-Liked picture.");
            //}
            echo "Post unliked";
        }
        else
        {
            $likeQuery = "INSERT INTO `likes`(`img_id`, `user_id`) VALUES(?, ?)";
            $likeResult = $conn->prepare($likeQuery);
            $likeResult->execute([$img_id, $user_id]);
            //if ($notif == '1')
            //{
                sendEmail($email, $username." liked you picture.", "Liked picture.");
            //}
            echo "Post liked";
        }
        $conn->exec("COMMIT");
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