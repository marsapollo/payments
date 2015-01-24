				<form action="inc/bill.php" method="POST" role="form">
				<legend>Add Bill</legend>
				<div class="row">
					<div class="form-group col-xs-12">
						<label class="sr-only" for="title">Title</label>
						<input type="text" name="title" id="inputTitle" class="form-control" required="required" placeholder="Title">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
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
					<div class="form-group col-sm-6">
						<label for="amt" class="sr-only">Amount</label>
						<input type="number" name="amt" id="inputAmt" class="form-control" min="0" max="" step="0.01" required="required" placeholder="Enter Amount">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="sr-only" for="date">Start Date</label>
						<input type="date" name="date" id="inputDate" class="form-control" required="required" placeholder="Start Date">
					</div>
					<div class="form-group col-sm-4">
						<label for="due" class="sr-only">Due Day</label>
						<input type="number" name="due" id="inputDue" class="form-control" min="1" max="31" step="1" required="required" placeholder="Due Day">
					</div>
					<div class="form-group col-sm-4">
						<label for="grace" class="sr-only">Grace Period</label>
						<input type="number" name="grace" id="inputgrace" class="form-control" min="1" max="" step="1" required="required" placeholder="Grace">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="period_payment" class="sr-only">Period Payment</label>
						<input type="number" name="period_payment" id="inputPeriod_payment" class="form-control" min="0" max="" step=".01" required="required" placeholder="Period Payment">
					</div>
					<div class="form-group col-sm-4">
						<label class="sr-only" for="period_id">Period Type</label>
						<select name="period_id" id="inputPeriodType" class="form-control" required="required">
							<option value="">Period Type</option>
							<?php 
								for ($i=0; $i < $period['num']; $i++) { 
									echo '<option value="'.$period['result'][$i]['period_id'].'">';
										echo $period['result'][$i]['period_type'];
									echo '</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group col-sm-4">
						<label for="period" class="sr-only">Periods</label>
						<input type="number" name="period" id="inputPeriod" class="form-control" min="1" max="" step="1" required="required" placeholder="Periods">
					</div>
				</div>
				
				<button type="submit" class="btn btn-primary">Submit</button>

			</form>