<?php
/* include_once 'database.php';

try{
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM users WHERE id = :id AND  groups = :gr;";
    $stmt = $db->prepare($query);
    $theid = 1;
    $thegr = 1;
    $stmt->bindparam(':id', $theid);
    $stmt->bindparam(':gr', $thegr);
    $stmt->execute();
    //dont run fetch if you are updating,inserting or deleting.
    $result = $stmt->fetch();
    print_r($result);
}

catch(PDOexception $e){
    echo $e->getmassage();
} */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <div class="bg-img"></div>
</head>
<body>
    <div class="bg-image"></div>
    <div class="action">
        <div class="bg-text">
<form action="log.php" method="post">
<div class="container">
    <label for="username">username</label>
    <input type="text" placeholder="Enter username" name="username" id="username" required/>
    <label for="password">password</label>
    <input type="password" placeholder="Enter Password" name="password" id="password"/>
    <input type="submit" name="submit"/>
    <p>want to <a href="../index.php">log out</a>.</p>
    </div>
</form>
</div>
</div>
</body>
</html>

