<?php

session_start();

$GLOBALS['config'] = array(
'mysql' => array(
    'host' => $host,
    'username' =>  $username,
    'password' => $password,
     'db' => $dbname
),
)
?>