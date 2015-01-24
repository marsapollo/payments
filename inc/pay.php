<?php 
	include('class.MyDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$data = $_POST;
	$img = $_FILES;

	$bid 	= 	$data['bill'];
	$id 	= 	$data['payor'];
	$date 	= 	$data['date'];
	$amt 	= 	$data['amt'];
	$memo 	= 	$data['memo'];

	$b = $c->selectFrom('bill',array('due','remaining'),array('bid' => $bid));

	if (isset($_FILES["file"]["name"]) && $_FILES["file"]["size"] > 0) {
		move_uploaded_file($_FILES["file"]["tmp_name"], "../img/upload/" . $_FILES["file"]["name"]);
		$file = $_FILES["file"]["name"];

		$result = $c->insertInto('payment',array(
			'bid' => $bid,
			'id' => $id,
			'date' => $date,
			'amount' => $amt,
			'memo' => $memo,
			'img' => $file
			));
	} else {
		$result = $c->insertInto('payment',array(
			'bid' => $bid,
			'id' => $id,
			'date' => $date,
			'amount' => $amt,
			'memo' => $memo
			));
	}

	if ($result['status'] == 'success') {
		$due = $b['result'][0]['due'] - $amt;
		$remaining = $b['result'][0]['remaining'] - 1;
		$update = $c->updateTable('bill',array('due' => $due,'remaining' => $remaining),array('bid' => $bid));
		if($update['status'] == 'success') {
			header('Location:../index.php?content=payments&id='.$result['id']);
		} else {
			echo "There was an error!";
		}
	} else {
		echo "There was an error!";
	}



 ?>