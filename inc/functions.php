<?php 
	function advNum($num) {
		if ($num % 10 == 1 && $num != 11) {
			$adv = 'st';

		} elseif ($num % 10 == 2 && $num != 12) {
			$adv = 'nd';
			
		} elseif ($num % 10 == 3 && $num != 13) {
			$adv = 'rd';
			
		} else {
			$adv = 'th';
		}

		return $num.$adv;
	}
 ?>