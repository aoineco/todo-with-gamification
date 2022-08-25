<?php

$id = $_POST["id"];
try {
    $sql = 'DELETE FROM todo_list WHERE id=$id';
    $conn->exec($sql);
    echo "Record deleted successfully";
} catch (PDOException $e) {
    echo $e->getMessage();
}
header('index.php')
?>
