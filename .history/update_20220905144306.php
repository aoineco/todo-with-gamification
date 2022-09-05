<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<form>
    <?php
    include "sql.php";
    $id = $_GET["id"];

    if (isset($_GET["id"])) {
        try {
            $stmt = $conn->prepare("SELECT task_name FROM todo_list WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $data = $stmt->fetch();
            $data =  $data["task_name"];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>

    <form action="update.php" method="POST">
        <input type="text" name='modify' value=<?php echo $data; ?>>
        <input type="submit" value="完了">
    </form>

    <?php
    if (isset($_GET['modify'])) {
        update($conn, $id, $_POST['modify']);
    }
    ?>



    </body>

</html>
