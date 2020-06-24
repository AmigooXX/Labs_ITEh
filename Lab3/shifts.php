<?php

header('Content-Type: application/json');
require '../connection.php';


$cursor = $db->duty->findOne([
	'shift' => $_GET['shift'],
	'department' => $_GET['department']
],[
	'projection' => array(
		'_id' => 0
	)
]);
$result = "";
if ($cursor != "") {
	$result = iterator_to_array($cursor);
	$result['date'] = $result['date']->toDateTime()->format('d.m.Y');
}



echo json_encode($result);