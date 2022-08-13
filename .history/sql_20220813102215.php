<?php
$server = "localhost";
$user = "root";
$pass = 'root';
$dbname = "gamification";


function insert_data($server, $user, $pass, $dbname, $task){
    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO todo_list (task_name) VALUES ('$task')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?>
