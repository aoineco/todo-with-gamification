<?php
$server = "localhost";
$user = "root";
$pass = 'root';
$dbname = "gamification";

$conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function insert_data($task, $conn){
    try {
        $sql = "INSERT INTO todo_list (task_name) VALUES ('$task')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
}

function display_data($conn){
    try {
        $stmt = $conn->query('SELECT * FROM todo_list');
        $result = 0;
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<table border="1">';
        echo "<tr>\n";
        echo "<th>task</th>\n";
        echo "</tr>\n";
        foreach ($result as $user) {
            echo "<tr>\n";
            //echo "<td>" . $user["id"] . "</td>\n";
            echo "<td>" . $user["task_name"] . "</td>\n";
            echo "<td>\n";
            echo "<a href=delete.php?id=" . $user["id"] . ">削除</a>\n";
            echo "<a href=update.php?id=" . $user["id"] . ">編集</a>\n";
            echo "</td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function update($conn, $id, $task_name)
{
    try{
    $stmt = $conn->prepare("UPDATE todo_list SET task_name=:task_name WHERE id=:id");

    $stmt->execute(array(':id' => $id, ':task_name'=>$task_name));
    var_dump($stmt);

    } catch(PDOException $e) {
    echo $stmt . "<br>" . $e->getMessage();
    }

}

?>
