<?php

header('Content-Type: application/json');
require '../connection.php';

$nurse = $_GET["nurse"];

$cursor = $db->duty->findOne([
	'nurses' => $nurse
],[
	'projection' => array(
		'wards' => 1
	)
]);

$result = iterator_to_array($cursor);

$wards = array();
foreach ($result['wards'] as $ward) {
	
		$wards[] = $ward;
	
}

echo json_encode($wards);
