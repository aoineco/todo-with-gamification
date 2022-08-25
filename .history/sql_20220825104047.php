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



function display_data($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM todo_list");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $num = 0;
        foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
            echo $v;
            echo '<form , method="GET">';
            echo '<button type="submit", name="delete", value="id">削除</button>';
            echo '</form>';
            $num += 1;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
