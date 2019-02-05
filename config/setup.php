<?php
include_once 'database.php';

try{
    $db = new PDO("mysql:host=$host", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "CREATE DATABASE ". $dbname;
    $db->exec($query);
    echo $dbname . "create successfully";
}
catch(PDOexception $e){
  if($e->getmessage() == "SQLSTATE[HY000]: General error: 1007 Can't create database '". $dbname ."'; database exists"){
    $query = "DROP DATABASE ". $dbname;
    $db->exec($query);
    echo $dbname . " drop successfully<br>";  
    try{
      $query = "CREATE DATABASE ". $dbname;
      $db->exec($query);
      echo $dbname . " create successfully<br>";
    }
    catch(PDOexception $e) {
      echo $e->getMessage();
    }
  }
  else {
    echo $e->getMessage();
  }
}


try{
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $query = "CREATE TABLE users (
    id int(11) NOT NULL AUTO_INCREMENT,
    username varchar(20) NULL,
    email varchar(30)  NULL,
    password varchar(64) NULL,
    confirmpassword varchar(64) NULL,
    salt varchar(32) NULL,
    name varchar(50)  NULL,
    user_isvalidated boolean not null DEFAULT '0',
    joined datetime NULL DEFAULT CURRENT_TIMESTAMP,
    groups int(11) NULL DEFAULT '1',
    PRIMARY KEY(id)
  );";
  $db->exec($query);
  echo "create table successfully";
}
catch(PDOexception $e){
  echo $e->getMessage();
}

try{
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $query = "CREATE TABLE comments (
    comment_id int(11) NOT NULL AUTO_INCREMENT,
    comment text NULL,
    img_id int(64) NULL,
    user_id int(64) NULL,
    PRIMARY KEY(comment_id)
);";
  $db->exec($query);
  echo "<br>table 'comments' is created";
}
catch(PDOexception $e){
  echo $e->getmaassge();
}

try{
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $query = "CREATE TABLE gallery (
    img_id int(11) NOT NULL AUTO_INCREMENT,
    img_name varchar(255) NULL,
    user_id int(255) NULL,
    comments_id int(255) NULL,
    time_stamp timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(img_id)
);";
  $db->exec($query);
  echo "<br>table 'gallery' is created";
}
catch(PDOexception $e){
  echo $e->getmaassge();
}

try{
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $query = "CREATE TABLE likes (
    like_id int(11) NOT NULL AUTO_INCREMENT,
    img_id int(64) NULL,
    user_id int(64) NULL,
    PRIMARY KEY(like_id)
);";
  $db->exec($query);
  echo "<br>table 'likes' is created";
}
catch(PDOexception $e){
  echo $e->getmaassge();
}

?>