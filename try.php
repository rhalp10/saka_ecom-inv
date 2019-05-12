<?php 

	$db = mysqli_connect('localhost', 'root', '', 'saka');

$fa = "admin";



$password_1 = mysqli_real_escape_string($db, $fa);

echo md5($password_1);