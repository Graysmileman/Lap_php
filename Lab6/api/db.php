<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
    
    // XAMPP
    $host = "localhost";
    $db_name = "CatBreeds";
    $username = "root";
    $password = "";

}else{

    // Hosting
    $host = "localhost";
    $db_name = "it67040233132";
    $username = "it67040233132";
    $password = "W7N2M1C5";
}

try{

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4",$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){

die("DB Error: ".$e->getMessage());

}

?>
