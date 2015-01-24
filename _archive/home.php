<?php include('template/head.php') ?>

	<?php 

		if(isset($data['content'])) {
			if ($data['content'] == 'home') {
				include('template/home.php');
			} elseif($data['content'] == 'accounts') {
				include('template/accounts.php');
			} else {
				echo '<h1>No Content Found</h1>';
			}
		} else {
			echo '<h1>No Content Found</h1>';
		}

	?>



<?php include('template/foot.php') ?>
