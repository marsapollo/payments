<?php 
	include('class.MyDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$data = $_POST;
	$img = $_FILES;

	$pid = $data['pid'];

	$p = $c->selectFrom('payment',array('img','amount','bid'),array('pid' => $pid));

	$amount =  $p['result'][0]['amount'];
	$file = $p['result'][0]['img'];

	if (isset($_FILES["file"]["name"])) {
		move_uploaded_file($_FILES["file"]["tmp_name"], "../img/upload/" . $_FILES["file"]["name"]);
		$file = $_FILES["file"]["name"];
	}

	$bid 	= 	$data['bill'];
	$id 	= 	$data['payor'];
	$date 	= 	$data['date'];
	$amt 	= 	$data['amt'];
	$memo 	= 	$data['memo'];

	$result = $c->updateTable('payment',array(
		'bid' => $bid,
		'id' => $id,
		'date' => $date,
		'amount' => $amt,
		'memo' => $memo,
		'img' => $file
		),array('pid' => $pid));

	if ($result['status'] == 'success') {

		$b1 = $c->selectFrom('bill',array('due','remaining'),array('bid' => $p['result'][0]['bid']));
		$b1_due = $b1['result'][0]['due'] + $amount;
		$b1_remaining = $b1['result'][0]['remaining'] + 1;
		$update1 = $c->updateTable('bill',array('due' => $b1_due,'remaining' => $b1_remaining),array('bid' => $p['result'][0]['bid']));

		$b2 = $c->selectFrom('bill',array('due','remaining'),array('bid' => $bid));
		$b2_due = $b2['result'][0]['due'] - $amt;
		$b2_remaining = $b2['result'][0]['remaining'] - 1;
		$update2 = $c->updateTable('bill',array('due' => $b2_due,'remaining' => $b2_remaining),array('bid' => $bid));

		if($update1['status'] == 'success' && $update2['status'] == 'success') {
			header('Location:../payment.php?id='.$pid);
			echo 'success';
		} else {
			echo "There was an error!";
		}
	} else {
		echo "There was an error!";
	}



 ?>