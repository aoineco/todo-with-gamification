<?php
$server = "localhost";
$user = "username";
$pass = "";

try {
    $conn = new PDO("mysql:host=$server", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){

}
