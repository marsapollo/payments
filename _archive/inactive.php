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
		<title>Accounts</title>
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
			<div class="pull-right"><a href="accounts.php">View Active Accounts</a></div>
			<h1>Accounts</h1>

			<?php 
				$results = $c->selectFrom('bill', null, array('active' => '0'));

				if ($results['num'] > 0) {
					echo '<div class="table-responsive">';
						echo '<table class="table table-striped table-hover">';
							echo '<thead>';
								echo '<tr>';
									echo '<th>ID</th>';
									echo '<th>Title</th>';
									echo '<th>Amount</th>';
									echo '<th>Due</th>';
									echo '<th>Period Payment</th>';
									echo '<th>Remaining</th>';
								echo '</tr>';
							echo '</thead>';
							echo '<tbody>';
							for ($i=0; $i < $results['num']; $i++) { 
								echo '<tr>';
									echo '<td>';
										echo $results['result'][$i]['bid'];
									echo '</td>';
									echo '<td>';
										echo '<a href="account.php?id='.$results['result'][$i]['bid'].'">';
											echo $results['result'][$i]['title'];
										echo '</a>';
									echo '</td>';
									echo '<td>$';
										echo money_format('%!i', $results['result'][$i]['amt']);
									echo '</td>';
									echo '<td>$';
										echo money_format('%!i', $results['result'][$i]['due']);
									echo '</td>';
									echo '<td>$';
										echo money_format('%!i', $results['result'][$i]['period_payment']);
									echo '</td>';
									echo '<td>';
										echo $results['result'][$i]['remaining'];
									echo '</td>';
								echo '</tr>';
							}
							echo '</tbody>';
				} else {
					echo 'No inactive accounts. <a href="accounts.php">View active accounts</a>';
				}
			?>
			
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>
</html>