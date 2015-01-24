<?php 

	include('inc/class.MyDB.inc');
	
	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$payments = $c->selectFrom('payment',null,null,false,'pid','DESC');
	$bills = $c->selectFrom('bill');

	function getBillTitle($id,$bills) {
		for ($b=0; $b < $bills['num']; $b++) { 
			if($id == $bills['result'][$b]['bid']) {
				return $bills['result'][$b]['title'];
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<title>Payments</title>
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
			<h1>Payments</h1>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Payment Date</th>
							<th>Account</th>
							<th>Amount Paid</th>
							<th>Note</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						for ($i=0; $i < $payments['num']; $i++) { 
							echo '<tr>';
								echo '<td>';
									echo $payments['result'][$i]['pid'];
								echo '</td>';
								echo '<td>';
									echo '<a href="payment.php?id='.$payments['result'][$i]['pid'].'">';
										echo date_format(date_create($payments['result'][$i]['date']), 'F j, Y');
									echo '</a>';
								echo '</td>';
								echo '<td>';
									echo getBillTitle($payments['result'][$i]['bid'],$bills);
								echo '</td>';
								echo '<td>$';
									echo $payments['result'][$i]['amount'];
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

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>
</html>