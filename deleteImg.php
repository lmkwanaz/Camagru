<?php
    include_once 'config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }

    if (isset($_POST['img_id']))
    {
        $id = $_POST['img_id'];

        $getImgNameQ = "SELECT `img_name` FROM `gallery` WHERE `img_id` = ?";
        $getImgNameR = $conn->prepare($getImgNameQ);
        $getImgNameR->execute([$id]);

        $path = $getImgNameR->fetch()['img_name'];

        $deletePostQ = "DELETE from `gallery` WHERE `img_id` = ?";
        $deletePostR = $conn->prepare($deletePostQ);
        $deletePostR->execute([$id]);
        if ($deletePostR && file_exists($path))
        {
            unlink($path);
            echo "Deleted";
        }
    }
    else
    {
        echo "No value provided";
    }
?>