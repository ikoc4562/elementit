<?php
//error_reporting(0);
$username = "root";
$password = "";
$hostname = "localhost";
$dbname = "ref";
try {
    $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



$sql = $db->query('select * from kullanicilar where id="'.$_COOKIE['id'].'"');
$kullanicilar = $sql->fetchAll();


/*
$username = "root";
$password = "";
$hostname = "localhost";
$dbname = "nhodb";
*/
?>

