<?php
session_start();
require_once "Board.php";
if(!(isset($_SESSION['loggedin']))){
    header("Location:index.php");
}

$crossBoard = new Board(0, array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"))
?>