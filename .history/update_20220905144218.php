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
    var_dump($_GET['modify']);
    if (isset($_GET['modify'])) {
        //update($conn, $id, $_POST['modify']);

        try {
            $stmt = $conn->prepare("UPDATE todo_list SET task_name=:task_name WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':task_name', $_GET['modify'], PDO::PARAM_STR_CHAR);
            $res = $stmt->execute();
            var_dump($res);
            echo 'success';
            header('Location:http://localhost:8888/gamification/index.php');
        } catch (PDOException $e) {
            echo $res . "<br>" . $e->getMessage();
        }
    } else {
        echo 'error';
    }
    ?>



    </body>

</html>
