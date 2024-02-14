<?php
include_once "db.php";

$_POST['footer'];


$footer=$Footer->find(1);
$footer['footer']=$_POST['footer'];
$Footer->save($footer);

header("location:../back.php?do=footer");