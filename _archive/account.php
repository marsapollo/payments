<?php 
	include('inc/class.MyDB.inc');

	$bid = $_GET['id'];

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$result = $c->selectFrom('bill',null,array('bid' => $bid));
	$person = $c->selectFrom('person',null,array('id' => $result['result'][0]['id']));
	$payments = $c->selectFrom('payment',null,array('bid' => $bid),false,'pid','DESC');

	if ($result['result'][0]['active']) {
		$activate = 'Deactivate';
	} else {
		$activate = 'Activate';
	}

	setlocale(LC_MONETARY, 'en_US');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Account ID: <?php echo $result['result'][0]['bid']; ?></title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include('inc/nav.php'); ?>
		<div class="container">
			<div class="pull-right"><a href="editaccount.php?id=<?php echo $bid; ?>">Edit Account</a> | <a href="inc/deactivate.php?id=<?php echo $bid; ?>"><?php echo $activate; ?> Account</a></div>
			<h1>Account ID: <?php echo $result['result'][0]['bid']; ?>
				<small><?php echo $result['result'][0]['title']; ?></small>
			</h1>
			<div class="col-sm-6">
				<h2>Account Details</h2>
				<p>Owner: <?php echo $person['result'][0]['firstname'],' ', $person['result'][0]['lastname'], ' <a href="mailto:', $person['result'][0]['email'], '">', $person['result'][0]['email'], '</a>'; ?></p>
				<p>Start Date: <?php echo date_format(date_create($result['result'][0]['start']), 'F j, Y'); ?></p>
				<p>Payments Due: <?php echo $result['result'][0]['period']; ?></p>
				<p>Payments Remaining: <?php echo $result['result'][0]['remaining']; ?></p>
				<p>Starting Due: $<?php echo money_format('%!i', $result['result'][0]['amt']); ?></p>
				<p>Remaining Due: $<?php echo money_format('%!i', $result['result'][0]['due']); ?></p>
				<p>Terms:
					<br>Day Due - <?php echo advNum($result['result'][0]['due_day']); ?>
					<br>Grace Period - <?php echo $result['result'][0]['grace_period']; ?> Days
					<br>Period Payment - $<?php echo money_format('%!i', $result['result'][0]['period_payment']); ?>
				</p>
			</div>
			<div class="col-sm-6">
				<h2>Payments</h2>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Payment Date</th>
								<th>Amount Paid</th>
								<th>Note</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							for ($i=0; $i < $payments['num']; $i++) { 
								echo '<tr>';
									echo '<td>';
										echo '<a href="payment.php?id='.$payments['result'][$i]['pid'].'">';
											echo date_format(date_create($payments['result'][$i]['date']), 'F j, Y');
										echo '</a>';
									echo '</td>';
									echo '<td>$';
										echo money_format('%!i', $payments['result'][$i]['amount']);
									echo '</td>';
									echo '<td>';
										echo $payments['result'][$i]['memo'];
									echo '</td>';
								echo '</tr>';
							}
							?>
							
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