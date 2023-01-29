<?php
session_start();
if(isset($_SESSION['loggedin'])){
    header("Location:home.php");
}
require_once "Board.php";
$crossBoard = new Board(0, array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5));
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
</head>
<body class="bg-gray-100">

<h1 class="text-3xl font-bold">
    THE MATRIX!<br>
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
    }
    ?>
    <style>
        .square{
            border-radius: 15%;
        }
        .input{
            background-color: #1a202c;
            color: white;
            border: 2px solid #1a202c;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 20px;
            margin: 10px;
        }
    </style>
    <center>
    <div class="flex items-center justify-center h-96 w-96 bg-slate-800 square">
        <?php echo $formatted; ?>
    </div>
    <form method="post">

        <br>
        <input type="submit" name="0" value="Uit" class="input"/>
        <input type="submit" name="1" value="Kruis" class="input"/>
        <input type="submit" name="2" value="Pijl Links" class="input"/>
        <input type="submit" name="3" value="Pijl Rechts" class="input"/>
    </form>
    </center>

</h1>

</body>
</html>