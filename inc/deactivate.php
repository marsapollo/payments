<?php 
	include('class.MyDB.inc');

	$bid = $_GET['id'];

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}
	$b = $c->selectFrom('bill',array('active'),array('bid' => $bid));
	if ($b['result'][0]['active'] == false) {
		$r = $c->updateTable('bill',array('active' => 1),array('bid' => $bid));
	} else {
		$r = $c->updateTable('bill',array('active' => 0),array('bid' => $bid));
	}

	header('Location:../account.php?id='.$bid);
?>