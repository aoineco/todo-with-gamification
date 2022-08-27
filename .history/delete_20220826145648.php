<?php
include "sql.php";
try {
    $stmt = $dbh->prepare('DELETE FROM users WHERE id = :id');
    $stmt->execute(array(':id' => $_GET["id"]));
    echo "削除しました。";
} catch (Exception $e) {
    echo  $e->getMessage();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>削除完了</title>
</head>

<body>
    <p>
        <a href="index.php">投稿一覧へ</a>
    </p>
</body>

</html>
