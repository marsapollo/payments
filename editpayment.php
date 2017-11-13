<?php 
	include('inc/class.MyDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}

	$pid = $_GET['id'];

	$b = $c->selectFrom('bill');
	$p = $c->selectFrom('person');
	$pay = $c->selectFrom('payment',null,array('pid' => $pid));

	$bill		=	$pay['result'][0]['bid'];
	$id			=	$pay['result'][0]['id'];
	$date		=	$pay['result'][0]['date'];
	$amt		=	$pay['result'][0]['amount'];
	$memo		=	$pay['result'][0]['memo'];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Payment</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include('template/nav.php'); ?>
		<div class="container">
			<form action="inc/updatepay.php" method="POST" role="form" enctype="multipart/form-data">
				<legend>Edit Payment</legend>
				<div class="form-group">
					<label class="sr-only" for="bill">Select Account</label>
					<select name="bill" id="inputBill" class="form-control" required="required">
						<option value="">Select Account</option>
						<?php 
							for ($i=0; $i < $b['num']; $i++) { 
								if ($b['result'][$i]['bid'] == $bill) {
									echo '<option selected="selected" value="'.$b['result'][$i]['bid'].'">';
								} else {
									echo '<option value="'.$b['result'][$i]['bid'].'">';
								}
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
								if ($p['result'][$i]['id'] == $id) {
									echo '<option selected="selected" value="'.$p['result'][$i]['id'].'">';
								} else {
									echo '<option value="'.$p['result'][$i]['id'].'">';
								}
									echo $p['result'][$i]['firstname'].' '.$p['result'][$i]['lastname'];
								echo '</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="sr-only" for="date">Date</label>
					<input type="date" name="date" id="inputDate" class="form-control" required="required" value="<?php echo $date; ?>">
				</div>
				<div class="form-group">
					<label for="amt" class="sr-only">Amount</label>
					<input type="number" name="amt" id="inputAmt" class="form-control" min="0" max="" step="0.01" required="required" placeholder="Enter Amount" value="<?php echo $amt; ?>">
				</div>
				<div class="form-group">
					<label for="memo" class="sr-only">Memo</label>
					<input type="text" name="memo" id="inputMemo" class="form-control" required="required" placeholder="Memo" value="<?php echo $memo; ?>">
				</div>

				<div class="row">
					<div class="form-group">
						<label for="img" class="col-xs-2">Upload Image</label>
						<input type="file" name="file" id="file" class="col-xs-9">
					</div>
				</div>
				
				<input type="hidden" name="pid" id="inputPid" class="form-control" value="<?php echo $pid; ?>">

				<button type="submit" class="btn btn-primary">Update</button>

			</form>
			
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>
</html>