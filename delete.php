<?php
include 'connect.php';
include 'functions.php';
$id=$_GET['id'];
$name=$_GET['name'];
mysql_query("delete from `tests` where `id`='$id'");
mysql_query("delete from `questions` where `examname`='$name'");
header('location: setexam.php');
?>