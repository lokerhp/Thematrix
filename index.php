<?php
session_start();
if(isset($_SESSION['loggedin'])){
    header("Location:home.php");
}
require_once "Board.php";
$crossBoard = new Board(0, array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5))
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<h1 class="text-3xl font-bold">
    THE MATRIX!<br>
    <?php

    if(isset($_POST['0'])) {
        $crossBoard->change(0);
        echo $crossBoard->getCurrentString();
    } else if(isset($_POST['1'])) {
        $crossBoard->change(1);
        echo $crossBoard->getCurrentString();
    } else if(isset($_POST['2'])) {
        $crossBoard->change(2);
        echo $crossBoard->getCurrentString();
    } else if(isset($_POST['3'])) {
        $crossBoard->change(3);
        echo $crossBoard->getCurrentString();
    }
    ?>

    <form method="post">

        <br>
        Uit <input type="submit" name="0"/><br>
        Kruis <input type="submit" name="1"/><br>
        Links <input type="submit" name="2"/><br>
        Rechts <input type="submit" name="3"/><br>
    </form>
</h1>
</body>
</html>