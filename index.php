<?php include('template/head.php') ?>

	<?php 

		if(isset($data['content'])) {
			if ($data['content'] == 'home') {
				include('template/home.php');
			} elseif($data['content'] == 'accounts') {
				if (isset($data['action']) && $data['action'] == 'add') {
					include('template/add/account.php');
				} elseif (isset($data['id'])) {
					include('template/account.php');
				} else {
					include('template/accounts.php');
				}
			} elseif ($data['content'] == 'payments') {
				if (isset($data['action']) && $data['action'] == 'add') {
					include('template/add/payment.php');
				} elseif (isset($data['id'])) {
					include('template/receipt.php');
				} else {
					include('template/payments.php');
				}
			} else {
				echo '<h1>No Content Found</h1>';
			}
		} else {
			include('template/home.php');
		}

	?>

<?php include('template/foot.php') ?>
