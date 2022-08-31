<?php
include "sql.php";
$id = $_GET["id"];
$stmt = $conn->prepare("SELECT task_name FROM todo_list WHERE id=$id");
$stmt->execute();
echo $stmt;
?>
<body>
    <input type="text" name="modify" ,value="">
</body>
