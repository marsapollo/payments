<?php 

	include('inc/class.myDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		print('Error: '.$e);
	}

	setlocale(LC_MONETARY, 'en_US');

	$data = $_GET;

	if (isset($data['content']) && isset($data['id']) && $data['content'] == 'accounts') {
		$bid = $data['id'];

		$result = $c->selectFrom('bill',null,array('bid' => $bid));
		$person = $c->selectFrom('person',null,array('id' => $result['result'][0]['id']));
		$payments = $c->selectFrom('payment',null,array('bid' => $bid),false,'pid','DESC');

		if ($result['result'][0]['active']) {
			$activate = 'Deactivate';
		} else {
			$activate = 'Activate';
		}
	} elseif (isset($data['content']) && isset($data['id']) && $data['content'] == 'payments') {

		$pid = $data['id'];

		$payment = $c->selectFrom('payment',null,array('pid' => $pid));
		$pay = $payment['result'][0];
		$bill = $c->selectFrom('bill',null,array('bid' => $pay['bid']));
		$bi = $bill['result'][0];
		$person = $c->selectFrom('person',null,array('id' => $bi['id']));
		$per = $person['result'][0];
		$u = $c->selectFrom('user',null,array('uid' => 3));
		$user_info = $c->selectFrom('person',null,array('id' => $u['result'][0]['id']));

		$prev = $c->selectFrom('payment',null,array('bid' => $pay['bid']));
		$prevPaid = 0;
		for ($i=0; $i < $prev['num']; $i++) { 
			if($prev['result'][$i]['pid'] < $pid) {
				$prevPaid += $prev['result'][$i]['amount'];
			}
		}
		$prevBal = $bi['amt'] - $prevPaid;
	} else {
		$pay = $c->selectFrom('payment',null,null,false,'pid','DESC');
		$b = $c->selectFrom('bill');
		$bill = $c->selectFrom('bill',null,array('active' => 1));
		$p = $c->selectFrom('person');
		$period = $c->selectFrom('period');

		if (isset($data['active']) && ($data['active'] == false || $data['active'] == 'false')) {
			$active = 0;
			$view = '<a href="index.php?content=accounts&active=true">View Active Accounts</a>';
		} else {
			$active = 1;
			$view = '<a href="index.php?content=accounts&active=false">View Inactive Accounts</a>';
		}
	}

	function getBillTitle($id,$b) {
		for ($b=0; $b < $b['num']; $b++) { 
			if($id == $b['result'][$b]['bid']) {
				return $b['result'][$b]['title'];
			}
		}
	}

	function advNum($num) {
		if ($num % 10 == 1 && $num != 11) {
			$adv = 'st';

		} elseif ($num % 10 == 2 && $num != 12) {
			$adv = 'nd';
			
		} elseif ($num % 10 == 3 && $num != 13) {
			$adv = 'rd';
			
		} else {
			$adv = 'th';
		}

		return $num.$adv;
	}

?>