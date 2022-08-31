<body>
<?php
include "sql.php";
$id = $_GET["id"];
try{
    $stmt = $conn->prepare("SELECT task_name FROM todo_list WHERE id=$id");
    $stmt->execute();
    echo $stmt;
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
    <input type="text" name="modify" ,value="">
</body>
