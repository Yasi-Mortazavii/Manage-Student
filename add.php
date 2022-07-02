<?php
$name = $_POST['name'];
$age = $_POST['age'];

$strcon = mysqli_connect('127.0.0.1', 'root', '', 'university');
$q = "insert into student (name, age) values ('{$name}', {$age}) ";
$res = mysqli_query($strcon, $q);

header("location:list.php");
