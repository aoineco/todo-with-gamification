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
    include "sql.php";
    $task = $_POST["task"];
    if (isset($task)) {
        insert_data($task, $conn);
    }

    if (isset($_POST['delete'])) {
        delete($conn);
    }
    ?>
    <form method="POST">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Password 1</th>
                <th>Password 2</th>
                <th>Drop data</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($QueryVF)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['task_name'] . '</td>';
                echo '<td><button type="submit" name="Delete" value="' . $row['id'] . '">削除</button></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </form>

</body>

</html>
