<?php
    include_once 'config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM `gallery` ORDER BY time_stamp DESC", PDO::FETCH_ASSOC)->fetchAll();
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }
    
    if ($_SESSION['username'] == "")
	{
		header('Location: login.php');
		die();
	}
    if($_POST["screamer"]){
        // die(var_dump($_POST));
        $src = generateRandomString().".png";
        $img = explode(",", $_POST["img_src"]);
        try{
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $userId = $_SESSION['user_id'];
            $query = $conn->prepare("INSERT INTO `gallery` (`user_id`, `img_name`) VALUES ('$userId', '$src')");
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