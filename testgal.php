<?php
//check if session has started
if(session_id() == ''){
    //session has not started
    session_start();
}
//check if session is legit
if ($_SESSION['username'] == "")
{
    header('Location: login.php');	
} 



//////sort out DB connection shit

    include_once 'config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }


    $result = $conn->query("SELECT * FROM `gallery` ORDER BY time_stamp DESC LIMIT 5", PDO::FETCH_ASSOC)->fetchAll();



    function loadpic($result)
    {
        include 'config/database.php';
        if ($result){
            foreach ($result as $row)
            {
                $img_id = $row['img_id'];
                $like_id = "like_".$img_id;
                $userId = $row['user_id'];
                $email_id = "email_".$img_id;
                $comment_id = "comment_".$img_id;

                $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
               $query = "SELECT `email` FROM `users` WHERE `id` = ?";
               $stmt = $db->prepare($query);
               $stmt->execute([$userId]);
               $email = $stmt->fetch();

              
               echo '<img id="e1" src='.$row['img_name'].' width="50%" height="auto">';

               if ($userId == $_SESSION['user_id'])
               {
                   echo    '<input type="button" value="Delete" onclick=deletePic('.$img_id.')><br>';
               }

               echo    '<input id='.$like_id.' type="button" value="Like" onclick=like_pic('.$img_id.')></br>
                       <input type="text" id='.$comment_id.'>
                       <input type="button" value="comment" width="" onclick=comment('.$img_id.')><br>
                       <p id='.$email_id.' style="display: none;">'.$email['email'].'</p>';
            }
            echo '<input type="button" value="next" onclick=nextPage("2")>';
  
    }
}

?>