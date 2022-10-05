<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="todo.css">
    <script type="text/javascript" src="todo.js"></script>
</head>

<body>

    <div id="progress">
        <div id="bar">10%</div>
    </div>


    <form action="index.php" method="post">
        <input type="text" name="task">
        <input type="submit">
    </form>
    <?php
    include "sql.php";
    $task = $_POST["task"];
    if (isset($task)) {
        insert_data($task, $conn);
    }

    display_data($conn);
    ?>

</body>

</html>
