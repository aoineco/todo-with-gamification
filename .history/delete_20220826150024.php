<?php
include "sql.php";
try {
    $stmt = $conn->prepare('DELETE FROM users WHERE id = :id');
    $stmt->execute(array(':id' => $_GET["id"]));
    header("http://localhost:8888/gamification/");
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
