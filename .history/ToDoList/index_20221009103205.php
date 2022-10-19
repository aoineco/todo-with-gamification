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
    <br>
    <button onclick="move()">click here</button>


    <form action="index.php" method="post">
        <input type="text" name="task">
        <input type="submit">
    </form>
    <br>
    <br>
    <?php
    include "sql.php";
    $task = $_POST["task"];
    if (isset($task)) {
        insert_data($task, $conn);
    }
    display_data($conn);
    ?>

    <div id="myDIV" class="header">
        <h2 style="margin:5px">My To Do List</h2>
        <input type="text" id="myInput" placeholder="Title...">
        <span onclick="newElement()" class="addBtn">Add</span>
    </div>

    <ul id="myUL">
        <li>Hit the gym</li>
        <li class="checked">Pay bills</li>
        <li>Meet George</li>
        <li>Buy eggs</li>
        <li>Read a book</li>
        <li>Organize office</li>
    </ul>


</body>

</html>
