<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function random_number()
    {
        $a = rand(1, 6);
        $b = rand(1, 6);
        echo $a . '  ' . $b . '<br>';
        if ($a == $b) {
            echo 'congratulations!!';
        } else {
            echo 'Too bad. Try again.';
        }
    }

    if ($_POST['try']) {
        random_number();
    }
    ?>

    <form method="post">
        <input type="submit" value="try" name="try">
    </form>

    <a href="http://localhost:8888/gamification/random_reward/slot.html">スロットゲーム</a>
    <br>
    <a href="http://localhost:8888/gamification/random_reward/dice.html">dice game</a>
    <br>
    <a href="http://localhost:8888/gamification/random_reward/coin_flip.html">coin flip game</a>
    <br>
    <a href="http://localhost:8888/gamification/random_reward/timer.html">coin flip game</a>

</body>

</html>
