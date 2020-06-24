<?php
$host = 'localhost';
$user = 'root';
$password = 'password';
$db = 'iteh2lb1var4';

$link = mysqli_connect($host, $user, $password, $db);

$nurses = $link->query("SELECT id_nurse, name FROM nurse");
$department = $link->query("SELECT department FROM nurse");
$shift = $link->query("SELECT shift FROM nurse GROUP BY shift ");

$wards = $link->query("SELECT id_ward, name FROM ward");
