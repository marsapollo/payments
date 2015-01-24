<?php 
	include('class.MyDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$data = $_POST;

	$title 				= 	$data['title'];
	$id 				= 	$data['payor'];
	$amt 				= 	$data['amt'];
	$start 				= 	$data['date'];
	$due 				= 	$data['due'];
	$grace 				= 	$data['grace'];
	$period_payment 	= 	$data['period_payment'];
	$period_id 			= 	$data['period_id'];
	$period 			= 	$data['period'];

	$r = $c->insertInto('bill',array(
		'id' => $id,
		'amt' => $amt,
		'due' => $amt,
		'period' => $period,
		'period_id' => $period_id,
		'remaining' => $period,
		'period_payment' => $period_payment,
		'title' => $title,
		'start' => $start,
		'due_day' => $due,
		'grace_period' => $grace,
		'active' => 1
		));

	if ($r['status'] == 'success') {
		header('Location:../index.php?content=accounts&id='.$r['id']);
	}