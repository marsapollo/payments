<?php 

	include('inc/class.myDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		print('Error: '.$e);
	}

	setlocale(LC_MONETARY, 'en_US');

	$data = $_GET;

	if (isset($data['active']) && ($data['active'] == false || $data['active'] == 'false')) {
		$active = 0;
		$view = '<a href="accounts.php?active=true">View Active Accounts</a>';
	} else {
		$active = 1;
		$view = '<a href="accounts.php?active=false">View Inactive Accounts</a>';
	}

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
			<div class="pull-right"><?php echo $view; ?></div>
			<h1>Accounts</h1>

			<?php 
				$results = $c->selectFrom('bill', null, array('active' => $active),false,'bid','DESC');

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
					echo 'No active accounts. '.$view;
				}
			?>
			
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>
</html>