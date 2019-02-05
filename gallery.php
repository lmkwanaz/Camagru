<?php
    include_once 'config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM `gallery` ORDER BY time_stamp DESC LIMIT 5", PDO::FETCH_ASSOC)->fetchAll();
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }
    if ($_SESSION['username'] == "")
	{
		header('Location: login.php');	
    }

?>

<!DOCTYPE htlml>
<html>
    <head>
    <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    </head>
    <style>
        body{
            text-align: center;
        }
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
    </style>
    <body background="source/b.jpg">
    <ul>
  <li><a class="active" href="#home">Gellery</a></li>
  <li><a href="upload.php">Upload picture</a></li>
  <li><a href="webcam.php">Camera</a></li>
  <li><a href="index.php">Index</a></li>
  <li><a href="forgot_user.php">Reset password</a></li>
  <li><input type="button" value="logout" onclick=logout()></li>
  
</ul>
    <div class="action">
        <div class="bg-text">
        <div class="container" id="con">
    <!-- <input type="button" value="logout" onclick=logout()> -->
     <?php

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

                    echo '<img id="e1" src='.$row['img_name'].' width="50%" data-therealid='.$img_id.' height="auto" onclick="showComments('.$img_id.')">';

                    if ($userId == $_SESSION['user_id'])
                    {
                        echo    '<input type="button" value="Delete" onclick=deletePic('.$img_id.')><br>';
                    }

                    echo    '<input id='.$like_id.' type="button" value="Like" onclick=like_pic('.$img_id.')></br>
                            <input type="text" id='.$comment_id.'>
                            <input type="button" value="comment" width="" onclick=comment('.$img_id.')><br>
                            <p id='.$email_id.' style="display: none;">'.$email['email'].'</p>';
                            /////////move this to comments are
                  
                 }
                 echo '<input type="button" value="next" onclick=nextPage("2")>';
             }
               
            ?> 

             <script>

                /* function nextPage(num)
                {
                    $.ajax({method: "POST", url:"getMorePics.php", data: {"num":num}, success: function(result)
					{
                        document.getElementById("con").innerHTML = result;
					}})
                } */


//////////////////////////////

function nextPage(num)
{
  //alert(num);
   //$sql = "INSERT INTO likes (theimg_id,likers_id,likestatus) VALUES (:img,:lid,:lst) ON DUPLICATE KEY UPDATE likestatus=IF(likestatus=1, 0, 1)";
     var hr = new XMLHttpRequest();
     var url = "getMorePics.php";
     var data = "num="+num;
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
  
             var return_data = hr.responseText;
             var ih =  document.getElementById('con');
             ih.innerHTML = hr.responseText;
         }
     }
     hr.send(data);  
}


//////////////////////////




                function logout()
                {
                    $.ajax({method: "POST", url:"logout.php", success: function(result)
					{
						location.reload();
					}})
                }
                ////////////////

// function logout()
// {
//    //$sql = "INSERT INTO likes (theimg_id,likers_id,likestatus) VALUES (:img,:lid,:lst) ON DUPLICATE KEY UPDATE likestatus=IF(likestatus=1, 0, 1)";
//      var hr = new XMLHttpRequest();
//      var url = "logout.php";
//      hr.open("POST", url, true);
//      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//      hr.onreadystatechange = function() {
//          if(hr.readyState == 4 && hr.status == 200) {
//             alert(hr.responseText);
//             location.reload();
//              var return_data = hr.responseText;
//          }
//      }
//      hr.send(data);  
// }
                /////////////////

                 function like_pic(imgId)
                {
                    var email = document.getElementById("email_" + imgId).innerHTML;
                    $.ajax({method: "POST", url:"likePost.php", data: {"img_id":imgId, "email":email}, success: function(result)
					{
						alert(result);
					}})
                } 
                ////////////////////
            //     function like_pic(imgId){
            //     var email = document.getElementById("email_" + imgId).innerHTML;
               
            //     var hr = new XMLHttpRequest();
            //     var url = "likePost.php";
            //     var data = "img_id="+imgId+"&email="+email;
            //     hr.open("POST", url, true);
            //     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //     hr.onreadystatechange = function() {
            //         if(hr.readyState == 4 && hr.status == 200){
            //             alert(hr.responseText);
            //             // var return_data = hr.responseText;
            //             //ih.innerHTML = hr.responseText; 
            //         }
            //     }
            //     hr.send(data);  
            // }
            

                //////////////////         

                function comment(imgId)
                {
                    var email = document.getElementById("email_" + imgId).innerHTML;
                    var comment = document.getElementById("comment_" + imgId).value;
                    $.ajax({method: "POST", url:"sendComment.php", data: {"img_id":imgId, "email":email, "comment":comment}, success: function(result)
					{
						alert(result);

					}})
                }
                ////////////////////

            //           function comment(imgId){
            //     var email = document.getElementById("email_" + imgId).innerHTML;
            //      var comment = document.getElementById("comment_" + imgId).value;
            //     var hr = new XMLHttpRequest();
            //     var url = "sendComment.php";
            //     var data = "img_id="+imgId+"&email="+email+"&comment"+comment;
            //     hr.open("POST", url, true);
            //     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //     hr.onreadystatechange = function() {
            //         if(hr.readyState == 4 && hr.status == 200){
            //             alert(hr.responseText);
            //             // var return_data = hr.responseText;
            //             // ih.innerHTML = hr.responseText; 
            //         }
            //     }
            //     hr.send(data);  
            // }
                ////////////////////



                ///function to load comments
                function showComments(imgId){
                   // console.log(imgId);

                           var email = document.getElementById("email_" + imgId).innerHTML;
                            var comment = document.getElementById("comment_" + imgId).value;
                            var hr = new XMLHttpRequest();
                            var url = "fetchComment.php";
                            var data = "img_id="+imgId;
                            hr.open("POST", url, true);
                            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            hr.onreadystatechange = function() {
                                if(hr.readyState == 4 && hr.status == 200) {
                                    //alert(hr.responseText);
                                    //var return_data = hr.responseText;
                                    var ih =  document.getElementById('commentsDiv');
                                    ih.innerHTML = "";
                                    ih.innerHTML = hr.responseText;
                                }
                            }
                            hr.send(data);  
                        }
                
                //////////////////         


                function deletePic(imgId)
                {
                    $.ajax({method: "POST", url:"deleteImg.php", data: {"img_id":imgId}, success: function(result)
					{
                        alert(result);
                        location.reload();
					}})
                }


             </script>
        </div>
        <div id="commentsDiv">comment</div>
            </div>


  
                </div>

               
    </body>
</html>
