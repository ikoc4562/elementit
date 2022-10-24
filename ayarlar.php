<?php

$username = "root";
$password = "";
$hostname = "localhost";
$dbname = "relDb";
$db="";
try {
    $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


/*
$username = "root";
$password = "";
$hostname = "localhost";
$dbname = "nhodb";
*/
?>

