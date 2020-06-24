<?php


require '../connection.php';
header('Content-Type: application/json');


$cursor = $db->duty->findOne([
	'department' => $_GET["ward"]
],[
	'projection' => array(
		'nurses' => 1
	)
]);

$result = iterator_to_array($cursor);

$nurses = array();

foreach ($result['nurses'] as $nurse) {
	$nurses[] = $nurse;
}



echo json_encode($nurses);
