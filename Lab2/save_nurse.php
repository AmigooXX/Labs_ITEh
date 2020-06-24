<?php
include 'db.php';
$request = $link->query( "INSERT INTO nurse (name, date, department, shift)
                                    VALUES ('".$_POST['name']."', '".$_POST['date']."', ".$_POST['department'].", '".$_POST['shift']."')");
header("HTTP/1.1 301 Moved Permanently");
header("Location: /");
exit();