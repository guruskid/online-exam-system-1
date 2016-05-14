<?php
include 'connect.php';
include 'functions.php';
$id=$_GET['id'];
mysql_query("delete from `questions` where `id`='$id'");
header('location:questions.php');
?>