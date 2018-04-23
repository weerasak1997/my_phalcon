<?php
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'event_db');
// define('DB_CHSRSET', 'utf8');
// $objCon = mysqli_connect('localhost','root','','event_db');
// mysqli_set_charset($objCon, "utf8");
$servername = "localhost";
$username = "root";
$password = "";
 
try{
    // $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" .  DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo = new PDO("mysql:host=$servername;dbname=event_db;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // echo 'Connect Successfully';
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
?>