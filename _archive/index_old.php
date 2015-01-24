<?php 

	include('inc/class.myDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		print('Error: '.$e);
	}

	setlocale(LC_MONETARY, 'en_US');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Payment Accounts</title>
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
			<h1>Payment System</h1>
			<div class="list-group">
				<a href="accounts.php" class="list-group-item">
					<h4 class="list-group-item-heading">Accounts</h4>
					<p class="list-group-item-text">See all acounts, their status and their details</p>
				</a>
			
				<a href="payments.php" class="list-group-item">
					<h4 class="list-group-item-heading">Payments</h4>
					<p class="list-group-item-text">See all payments and their details.</p>
				</a>

				<a href="addpayment.php" class="list-group-item">
					<h4 class="list-group-item-heading">Add Payment</h4>
					<p class="list-group-item-text">Att a payment for an account</p>
				</a>

				<a href="addbill.php" class="list-group-item">
					<h4 class="list-group-item-heading">Add Bill</h4>
					<p class="list-group-item-text">Add a bill for payment.</p>
				</a>
			
			</div>
			
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>
</html>