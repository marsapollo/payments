<?php 
	include('class.MyDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$pid = $_GET['id'];

	$w = array('pid' => $pid);
	$p = $c->selectFrom('payment',null,$w);

	$amt = $p['result'][0]['amount'];
	$bid = $p['result'][0]['bid'];

	$b = $c->selectFrom('bill',array('due','remaining'),array('bid' => $bid));

	$due = $b['result'][0]['due'] + $amt;
	$remaining = $b['result'][0]['remaining'] + 1;

	$b_u = $c->updateTable('bill',array('due' => $due,'remaining' => $remaining),array('bid' => $bid));

	if ($b_u['status'] == 'success') {
		$r = $c->deleteFrom('payment',$w);
		if ($r['status'] == 'success') {
			header('Location:../account.php?id='.$bid);
		} else {
			echo 'Error!';
		}
		
	} else {
		echo 'Error!';
	}
	
?>