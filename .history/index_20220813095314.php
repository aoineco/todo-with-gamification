<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <input type="text" name="task">
        <input type="submit">
    </form>

    <?php
        include_once "sql.php";
        insert_data($server, $user, $pass, $dbname, $task)
    ?>

</body>

</html>
