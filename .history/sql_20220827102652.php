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

function delete($conn)
{

    $id = $_POST["delete"];
    try {
        $sql = 'DELETE FROM todo_list WHERE id=$id';
        $conn->exec($sql);
        echo "Record deleted successfully";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function display_data($conn)
{

    try {
        $stmt = $conn->query('SELECT * FROM todo_list');
        $result = 0;
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<table border="1">\n';
        echo "<tr>\n";
        echo "<th>task</th>\n";
        echo "</tr>\n";
        foreach ($result as $user) {
            echo "<tr>\n";
            //echo "<td>" . $user["id"] . "</td>\n";
            echo "<td>" . $user["task_name"] . "</td>\n";
            echo "<td>\n";
            echo "<a href=delete.php?id=" . $user["id"] . ">削除</a>\n";
            echo "</td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function update($conn)
{}
    $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
    $stmt = $conn->prepare($sql);
    try{
    $stmt->execute();
    echo $stmt->rowCount() . " records UPDATED successfully";
    } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
}

?>
