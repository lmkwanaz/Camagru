
<?php
include_once 'config/database.php';

/* var_dump($_POST);
exit(); */

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   
    $result = $conn->query("SELECT * FROM `comments` WHERE img_id = ".$_POST['img_id'], PDO::FETCH_ASSOC)->fetchAll();
} catch (PDOException $e) {
    echo "ERROR EXECUTING: \n" . $e->getMessage();
}
if ($_SESSION['username'] == "")
{
    header('Location: login.php');	
}

$myArray = "Comments";

if ($result){
    foreach ($result as $row)
    {
        $comm = $row['comment'];
        $myArray .= "<br>".$comm;

/*         $like_id = "like_".$img_id;
        $userId = $row['user_id'];
        $email_id = "email_".$img_id;
        $comment_id = "comment_".$img_id;*/  

    }
    echo $myArray;
}else{
    echo "No comments";
}
?> 