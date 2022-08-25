<?php
$server = "localhost";
$user = "root";
$pass = 'root';
$dbname = "gamification";

$conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class TableRows extends RecursiveIteratorIterator
{
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }
}
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
        $stmt = $conn->prepare("SELECT task_name FROM todo_list");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $num = 1;
        foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
            echo $v.'<br>';
            /* echo '<form  method="POST", action="index.php">';
            echo '<button type="submit", name="delete", value=$num>削除</button>';
            echo '</form>'; */
            $num += 1;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    echo "</table>";
}
?>
