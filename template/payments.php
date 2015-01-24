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
						for ($i=0; $i < $pay['num']; $i++) { 
							echo '<tr>';
								echo '<td>';
									echo $pay['result'][$i]['pid'];
								echo '</td>';
								echo '<td>';
									echo '<a href="index.php?content=payments&id='.$pay['result'][$i]['pid'].'">';
										echo date_format(date_create($pay['result'][$i]['date']), 'F j, Y');
									echo '</a>';
								echo '</td>';
								echo '<td>';
									echo getBillTitle($pay['result'][$i]['bid'],$b);
								echo '</td>';
								echo '<td>$';
									echo $pay['result'][$i]['amount'];
								echo '</td>';
								echo '<td>';
									echo $pay['result'][$i]['memo'];
								echo '</td>';
							echo '</tr>';
						}
						?>
					</tbody>
				</table>
			</div>