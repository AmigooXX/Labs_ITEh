<?php

include 'db.php';
$request = $link->query("INSERT INTO ward (name)
                                    VALUES ('" . $_POST['name'] . "')");
header("HTTP/1.1 301 Moved Permanently");
header("Location: /");
exit();