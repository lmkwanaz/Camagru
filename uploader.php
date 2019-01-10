<?php
    include_once '../config/database.php';
    if($_POST["img_src"]){
        $src = generateRandomString().".png";
        $img = explode(",", $_POST["img_src"]);
        try{
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare("INSERT INTO `gallery` (`user_id`, `img_name`) VALUES (1043, '$src')");
            file_put_contents($src, base64_decode($img[1]));
            
            if ($query->execute())
            header("Location: gallery.php");
            else
                echo "failure";
        } catch(PDOException $e){
            echo "ERROR EXECUTING: \n".$e->getMessage();
        }
    }else{
        header("Location: upload.php");
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>