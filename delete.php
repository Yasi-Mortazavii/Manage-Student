<?php

$st_id = implode(",",$_POST['st_id']);
$strcon = mysqli_connect('127.0.0.1', 'root', '', 'university');

$q = "delete from student where id in({$st_id})";
$res = mysqli_query($strcon, $q);
header("location:list.php?delete_msg=" .  mysqli_affected_rows($strcon));
