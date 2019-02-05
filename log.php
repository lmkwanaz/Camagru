<?php
include_once 'config/database.php';

var_dump($_POST);
/* echo $_POST['email'];
exit(); */
////
try{
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM users WHERE username = :id";
    $stmt = $db->prepare($query);
   
    $theid = $_POST['username'];
    $thepass = hash('sha256', $_POST['password']);

    $stmt->bindparam(':id', $theid);
    //$stmt->bindparam(':pwd', $theid);

    if($stmt->execute()){
        $row = $stmt->fetch();
        if ($thepass == $row['password']){
            echo "username and password correct...do whatever";
            $_SESSION['username'] = $theid;
            $_SESSION['password'] = $thepass;
            $_SESSION['user_id'] = $row['id'];
            header("Location: ./gallery.php");
            exit();
        }
        else{
            echo "wrong shit nigger";
            header('Location: login.php');
            exit();
        }
    }
    
    //dont run fetch if you are updating,inserting or deleting.
/*     $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result)
        echo($result->username); */
}


catch(PDOexception $e){
    echo $e->getmassage();
}
?>








<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.container {
  position: relative;
  width: 100%;
  max-width: 400px;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 1;
  transition: .3s ease;
}

.icon {
  color: white;
  font-size: 100px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

</style>
</head>
<body>

<h2>Fade in Overlay Icon</h2>
<p>Hover over the image to see the effect.</p>

<div class="container">
  <img src="img_avatar.png" alt="Avatar" class="image">
  <div class="overlay">
  <a href="#" class="icon" title="User Profile">
    <i class="fa fa-user"></i>
  </a>
  </div>
</div>

</body>
</html>
