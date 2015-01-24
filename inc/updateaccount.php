<?php 
	include('class.MyDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$data = $_POST;

	$bid 				= 	$data['bid'];

	$b = $c->selectFrom('bill',null,array('bid' => $bid));

	$title 				= 	$data['title'];
	$id 				= 	$data['payor'];
	$amt 				= 	$data['amt'];
	$start 				= 	$data['date'];
	$due 				= 	$data['due'];
	$grace 				= 	$data['grace'];
	$period_payment 	= 	$data['period_payment'];
	$period_id 			= 	$data['period_id'];
	$period 			= 	$data['period'];
	$active				= 	$data['active'];

	$diff = $b['result'][0]['period'] - $period;

	$remaining = $b['result'][0]['remaining'] - $diff;

	$r = $c->updateTable('bill',array(
		'id' => $id,
		'amt' => $amt,
		'due' => $amt,
		'period' => $period,
		'period_id' => $period_id,
		'remaining' => $remaining,
		'period_payment' => $period_payment,
		'title' => $title,
		'start' => $start,
		'due_day' => $due,
		'grace_period' => $grace,
		'active' => $active
		),array('bid' => $bid));

	if ($r['status'] == 'success') {
		header('Location:../account.php?id='.$bid);
	}