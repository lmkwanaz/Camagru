<?php
    include_once './config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM `gallery` ORDER BY time_stamp DESC", PDO::FETCH_ASSOC)->fetchAll();
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }

    // if ($_SESSION['username'] == "")
	// {
	// 	header('Location: login.php');
	// 	die();
	// }
?>

<!DOCTYPE htlml>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <body>
    <body background="source/b.jpg">
    <ul>
  <li><a class="active" href="#home">Gellery</a></li>
  <li><a href="login.php">sign in</a></li>
  <li><a href="Register.php">Register</a></li>
  <li><a href="index.php">Index</a></li>
</ul>
    <div class="bg-image"></div>
    <div class="action">
        <div class="bg-text">
        <div class="container">
        <h2>Gallery</h2>
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

                    echo '<img id="e1" src='.$row['img_name'].' width="80%" height="auto">';

                   
                 }
             }
            ?>

                                <script>

                    function logout()
                    {
                        $.ajax({method: "POST", url:"logout.php", success: function(result)
                        {
                            location.reload();
                        }})
                    }
                    </script>
            </div>
                </div>
                    </div>
                        </body>
                                </html>


