<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "sql.php";
    $id = $_GET["id"];
    try {
        $stmt = $conn->prepare(
        'SELECT task_name FROM todo_list WHERE WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
    <input type="text" name="modify" ,value="">

    <?php $conn = null;?>
</body>
</html>
