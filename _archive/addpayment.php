<?php 
	include('inc/class.MyDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$b = $c->selectFrom('bill',null,array('active' => 1));
	$p = $c->selectFrom('person');


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Payment</title>
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
			<form action="inc/pay.php" method="POST" role="form" enctype="multipart/form-data">
				<legend>Add Payment</legend>
				<div class="form-group">
					<label class="sr-only" for="bill">Select Account</label>
					<select name="bill" id="inputBill" class="form-control" required="required">
						<option value="">Select Account</option>
						<?php 
							for ($i=0; $i < $b['num']; $i++) { 
								echo '<option value="'.$b['result'][$i]['bid'].'">';
									echo $b['result'][$i]['title'];
								echo '</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="sr-only" for="payor">Payor</label>
					<select name="payor" id="inputPayor" class="form-control" required="required">
						<option value="">Payor</option>
						<?php 
							for ($i=0; $i < $p['num']; $i++) { 
								echo '<option value="'.$p['result'][$i]['id'].'">';
									echo $p['result'][$i]['firstname'].' '.$p['result'][$i]['lastname'];
								echo '</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="sr-only" for="date">Date</label>
					<input type="date" name="date" id="inputDate" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label for="amt" class="sr-only">Amount</label>
					<input type="number" name="amt" id="inputAmt" class="form-control" min="0" max="" step="0.01" required="required" placeholder="Enter Amount">
				</div>
				<div class="form-group">
					<label for="memo" class="sr-only">Memo</label>
					<input type="text" name="memo" id="inputMemo" class="form-control" required="required" placeholder="Memo">
				</div>

				<div class="row">
					<div class="form-group">
						<label for="img" class="col-xs-2">Upload Image</label>
						<input type="file" name="file" id="file" class="col-xs-9">
					</div>
				</div>
				
				<button type="submit" class="btn btn-primary">Submit</button>

			</form>
			
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>
</html>