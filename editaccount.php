<?php 
	include('inc/class.MyDB.inc');

	try {
		$c = new MyDB();
	} catch (Exception $e) {
		rint('Error: '.$e);
	}
	$d = $_GET;
	$bid = $d['id'];
	$b = $c->selectFrom('bill',null, array('bid' => $bid));
	$p = $c->selectFrom('person');
	$period = $c->selectFrom('period');

	$title = $b['result'][0]['title'];
	$payorId = $b['result'][0]['id'];
	$amt = $b['result'][0]['amt'];
	$date = $b['result'][0]['start'];
	$due = $b['result'][0]['due_day'];
	$grace = $b['result'][0]['grace_period'];
	$periodPayment = $b['result'][0]['period_payment'];
	$periodType = $b['result'][0]['period_id'];
	$periods = $b['result'][0]['period'];
	$active = $b['result'][0]['active'];

	if ($active) {
		$isactive = 'Active';
	} else {
		$isactive = 'Inactive';
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Update Account</title>
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
			<form action="inc/updateaccount.php" method="POST" role="form">
				<legend>Update Account
					<span class="pull-right">Account is <?php echo $isactive; ?></span>
				</legend>
				<div class="row">
					<div class="form-group col-xs-12">
						<label class="sr-only" for="title">Title</label>
						<input type="text" name="title" id="inputTitle" class="form-control" required="required" placeholder="Title" value="<?php echo $title; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
						<label class="sr-only" for="payor">Payor</label>
						<select name="payor" id="inputPayor" class="form-control" required="required">
							<option value="">Payor</option>
							<?php 
								for ($i=0; $i < $p['num']; $i++) { 
									if ($p['result'][$i]['id'] == $payorId) {
										echo '<option selected="selected" value="'.$p['result'][$i]['id'].'">';
									} else {
										echo '<option value="'.$p['result'][$i]['id'].'">';;
									}
										echo $p['result'][$i]['firstname'].' '.$p['result'][$i]['lastname'];
									echo '</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group col-sm-6">
						<label for="amt" class="sr-only">Amount</label>
						<input type="number" name="amt" id="inputAmt" class="form-control" min="0" max="" step="0.01" required="required" placeholder="Enter Amount" value="<?php echo $amt; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="sr-only" for="date">Start Date</label>
						<input type="date" name="date" id="inputDate" class="form-control" required="required" placeholder="Start Date" value="<?php echo $date; ?>">
					</div>
					<div class="form-group col-sm-4">
						<label for="due" class="sr-only">Due Day</label>
						<input type="number" name="due" id="inputDue" class="form-control" min="1" max="31" step="1" required="required" placeholder="Due Day" value="<?php echo $due; ?>">
					</div>
					<div class="form-group col-sm-4">
						<label for="grace" class="sr-only">Grace Period</label>
						<input type="number" name="grace" id="inputgrace" class="form-control" min="1" max="" step="1" required="required" placeholder="Grace" value="<?php echo $grace; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="period_payment" class="sr-only">Period Payment</label>
						<input type="number" name="period_payment" id="inputPeriod_payment" class="form-control" min="0" max="" step=".01" required="required" placeholder="Period Payment" value="<?php echo $periodPayment; ?>">
					</div>
					<div class="form-group col-sm-4">
						<label class="sr-only" for="period_id">Period Type</label>
						<select name="period_id" id="inputPeriodType" class="form-control" required="required">
							<option value="">Period Type</option>
							<?php 
								for ($i=0; $i < $period['num']; $i++) { 
									if ($period['result'][$i]['period_id'] == $periodType) {
										echo '<option selected="selected" value="'.$period['result'][$i]['period_id'].'">';
									} else {
										echo '<option value="'.$period['result'][$i]['period_id'].'">';
									}
										echo $period['result'][$i]['period_type'];
									echo '</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group col-sm-4">
						<label for="period" class="sr-only">Periods</label>
						<input type="number" name="period" id="inputPeriod" class="form-control" min="1" max="" step="1" required="required" placeholder="Periods" value="<?php echo $periods; ?>">
					</div>
				</div>

				<input type="hidden" name="bid" id="inputBid" class="form-control" value="<?php echo $bid; ?>">
				<input type="hidden" name="active" id="inputBid" class="form-control" value="<?php echo $active; ?>">
				
				<button type="submit" class="btn btn-primary">Update</button>

			</form>
			
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>
</html>