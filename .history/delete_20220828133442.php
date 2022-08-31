<?php
include "sql.php";
$id = $_GET["id"];
try {
    $stmt = $conn->prepare('DELETE FROM todo_list WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    header('Location:http://localhost:8888/gamification/');
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
