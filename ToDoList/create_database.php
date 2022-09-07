<?php
$server = "localhost";
$user = "username";
$pass = "";

try {
    $conn = new PDO("mysql:host=$server", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myDBPDO";
    $conn->exec($sql);
    echo "datavase created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
