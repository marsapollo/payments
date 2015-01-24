				<form action="inc/pay.php" method="POST" role="form" enctype="multipart/form-data">
				<legend>Add Payment</legend>
				<div class="form-group">
					<label class="sr-only" for="bill">Select Account</label>
					<select name="bill" id="inputBill" class="form-control" required="required">
						<option value="">Select Account</option>
						<?php 
							for ($i=0; $i < $bill['num']; $i++) { 
								echo '<option value="'.$bill['result'][$i]['bid'].'">';
									echo $bill['result'][$i]['title'];
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