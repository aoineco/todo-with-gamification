<?php
include "sql.php";
try {
    $stmt = $conn->prepare('DELETE FROM todo_list WHERE id = :id');
    $stmt->execute(array(':id' => $_GET["id"]));
    header("http://localhost:8888/gamification/");
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
