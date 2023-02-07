<?php
session_start();
if(!(isset($_SESSION['loggedin']))){
    header("Location:login.php");
}
require_once "Board.php";
$crossBoard = new Board(1, array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5));
$formatted = "";
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://static.nieks-projecten.nl/FontAwesome/css/all.min.css">
    <script>
        module.exports = {
            mode: 'jit',
            purge: ['./public/**/*.html'],
            darkMode: false, // or 'media' or 'class'
            theme: {
                extend: {
                    padding: {
                        '1/2': '50%',
                        full: '100%',
                    },
                },
            },
            variants: {
                extend: {},
            },
            plugins: [],
        };
    </script>
    <title>The Matrix</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100">
<br><br><h1 class="text-3xl font-bold">
    <?php

    if(isset($_POST['0'])) {
        $crossBoard->change(0);
        $formatted = $crossBoard->getFormatted();
    } else if(isset($_POST['1'])) {
        $crossBoard->change(1);
        $formatted = $crossBoard->getFormatted();
    } else if(isset($_POST['2'])) {
        $crossBoard->change(2);
        $formatted = $crossBoard->getFormatted();
    } else if(isset($_POST['3'])) {
        $crossBoard->change(3);
        $formatted = $crossBoard->getFormatted();
    } else if(isset($_POST['4'])) {
        $crossBoard->change(4);
        $formatted = $crossBoard->getFormatted();
    }
    ?>
    <style>
        .square{
            border-radius: 15%;
            font-family: 'Poppins', sans-serif;
        }
        .input{
            background-color: #1a202c;
            color: white;
            border: 2px solid #1a202c;
            border-radius: 15px;
            padding: 10px 20px;
            font-size: 20px;
            margin: 10px;
        }
        .switch_button{
            color: white;
            border: 2px solid #65a30d;
            border-radius: 5px;
            padding: 8px 16px;
            font-size: 20px;
            margin: 10px;      
        }
    </style>
    <center>

        <div class="switcher">
            <div><a class="p-4" disabled onclick="alert('Password reset functie staat uit')"><i class="fa-solid fa-gear"></i></a> <a href="info.pdf" class="p-4"><i class="fa-solid fa-circle-info"></i></a> <a href="logout.php" class="p-4"><i class="fa-solid fa-right-from-bracket"></i></a></div><br>
            <a href="index.php" class="switch_button disabled:opacity-75 bg-lime-600 hover:bg-lime-700 transition duration-50 ease-in-out hover:border-lime-700">Kruizen</a> <a class="switch_button disabled:opacity-75 bg-lime-600 hover:bg-lime-700 transition duration-50 ease-in-out hover:border-lime-700" href="cijfers.php" disabled>Cijfers</a>
        <br><br>
        </div>
    <div class="flex items-center justify-center h-96 w-96 bg-slate-800 square">
        <?php echo $formatted; ?>
    </div>
    <form method="post">

        <br>
        <input type="submit" name="0" value="Uit" class="w-20 input disabled:opacity-75 hover:bg-slate-900" <?php if($crossBoard->getCurrent() == 0) echo "disabled"?>/>
        <input type="submit" name="1" value="30" class="w-20 input disabled:opacity-75 hover:bg-slate-900" <?php if($crossBoard->getCurrent() == 1) echo "disabled"?>/>
        <input type="submit" name="2" value="50" class="w-20 input disabled:opacity-75 hover:bg-slate-900" <?php if($crossBoard->getCurrent() == 2) echo "disabled"?>/>
        <input type="submit" name="3" value="60" class="w-20 input disabled:opacity-75 hover:bg-slate-900" <?php if($crossBoard->getCurrent() == 3) echo "disabled"?>/>
        <input type="submit" name="4" value="70" class="w-20 input disabled:opacity-75 hover:bg-slate-900" <?php if($crossBoard->getCurrent() == 4) echo "disabled"?>/>
    </form>
    </center>

</h1>

</body>
</html>