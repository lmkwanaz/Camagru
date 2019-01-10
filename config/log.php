<?php
include_once 'database.php';

//var_dump($_POST);
/* echo $_POST['email'];
exit(); */
////
try{
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM users WHERE username = :id;";
    $stmt = $db->prepare($query);
   
    $theid = $_POST['username'];

    $stmt->bindparam(':id', $theid);

    $stmt->execute();
    //dont run fetch if you are updating,inserting or deleting.
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result)
        echo($result->username);
}

catch(PDOexception $e){
    echo $e->getmassage();
}
?>