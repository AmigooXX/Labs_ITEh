<?php
include 'db.php';
$request = $link->query("DELETE from nurse_ward WHERE fid_nurse = '" . $_POST['nurse'] . "' and  fid_ward = '" . $_POST['ward'] . "'");
$request = $link->query("INSERT INTO nurse_ward (fid_nurse, fid_ward)
VALUES ('" . $_POST['nurse'] . "', '" . $_POST['ward'] . "')");
header("HTTP/1.1 301 Moved Permanently");
header("Location: /");
exit();