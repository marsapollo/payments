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
										echo '<a href="index.php?content=accounts&id='.$results['result'][$i]['bid'].'">';
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