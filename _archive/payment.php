<?php 

	include('inc/class.MyDB.inc');

	$pid = $_GET['id'];
	
	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$payment = $c->selectFrom('payment',null,array('pid' => $pid));
	$pay = $payment['result'][0];
	$bill = $c->selectFrom('bill',null,array('bid' => $pay['bid']));
	$bi = $bill['result'][0];
	$person = $c->selectFrom('person',null,array('id' => $bi['id']));
	$per = $person['result'][0];
	$user = $c->selectFrom('user',null,array('uid' => 3));

	$prev = $c->selectFrom('payment',null,array('bid' => $pay['bid']));
	$prevPaid = 0;
	for ($i=0; $i < $prev['num']; $i++) { 
		if($prev['result'][$i]['pid'] < $pid) {
			$prevPaid += $prev['result'][$i]['amount'];
		}
	}
	$prevBal = $bi['amt'] - $prevPaid;

	setlocale(LC_MONETARY, 'en_US');
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Payment ID: <?php echo $pid; ?></title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/payment.css">
	</head>
	<body>
		<?php include('inc/nav.php'); ?>
		<div class="container">
			<div class="col-xs-12 hidden-print">
				<span class="pull-right"><a href="editpayment.php?id=<?php echo $pid; ?>">Edit Payment</a> | <a href="inc/deletepayment.php?id=<?php echo $pid; ?>">Delete Payment</a></span>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-push-6 text-right head"><?php echo date_format(date_create($pay['date']), 'F j, Y'); ?></div>
				<div class="col-sm-6 col-sm-pull-6 head">Payment ID: <?php echo $pid; ?></div>
				<div class="col-xs-12">
					<a href="account.php?id=<?php echo $bi['bid']; ?>">Bill ID: <?php echo $bi['bid']; ?> - <?php echo $bi['title']; ?></a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-push-6 text-right">
					<strong>Paid To:</strong><br>
					<?php echo $user['result'][0]['firstname']; ?> <?php echo $user['result'][0]['lastname']; ?><br>
					<?php echo $user['result'][0]['address1']; ?> <?php echo $user['result'][0]['address2']; ?><br>
					<?php echo $user['result'][0]['city']; ?>, <?php echo $user['result'][0]['state'] ?> <?php echo $user['result'][0]['zip'] ?><br>
					<a href="<?php echo $user['result'][0]['email'] ?>"><?php echo $user['result'][0]['email'] ?></a>
				</div>
				<div class="col-sm-6 col-sm-pull-6">
					<strong>Paid By:</strong>
					<br><?php echo $per['firstname']; ?> <?php echo $per['lastname']; ?>
					<br><?php echo $per['address1']; ?> <?php echo $per['address2']; ?>
					<br><?php echo $per['city']; ?>, <?php echo $per['state'] ?> <?php echo $per['zip'] ?>
					<br><a href="mailto:<?php echo $per['email']; ?>"><?php echo $per['email']; ?></a>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-3 col-xs-push-9 text-right">
					<div><strong>Amount Paid:</strong></div>
					<div>$<?php echo money_format('%!i', $pay['amount']); ?></div>
				</div>
				<div class="col-xs-9 col-xs-pull-3">
					<div><strong>Notes:</strong></div>
					<div><?php echo $pay['memo']; ?></div>
				</div>
			</div>
			
			<?php if ($pay['img'] != null): ?>
				<div class="row">
					<div class="text-center">
						<img src="img/upload/<?php echo $pay['img'] ?>" alt="Image">
					</div>
				</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-xs-6 col-xs-offset-6 text-right">
					<table class="table table-striped table-hover">
						<tbody>
							<tr>
								<td>Previous Balance:</td>
								<td>$<?php echo money_format('%!i', $prevBal); ?></td>
							</tr>
							<tr>
								<td>Paid:</td>
								<td>$<?php echo money_format('%!i', $pay['amount']); ?></td>
							</tr>
							<tr>
								<td>Remaining Balance:</td>
								<td>$<?php echo money_format('%!i', $prevBal - $pay['amount']); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>
</html>