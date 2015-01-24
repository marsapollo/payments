<nav class="navbar navbar-inverse navbar-static-top hidden-print" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
  			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		 	<a class="navbar-brand" href="index.php?content=home">Payment System</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li <?php echo (isset($data['content']) && !isset($data['action'])) ? ($data['content'] == 'accounts') ? 'class="active"' : '' : '' ; ?>><a href="index.php?content=accounts">Accounts</a></li>
				<li <?php echo (isset($data['content']) && !isset($data['action'])) ? ($data['content'] == 'payments') ? 'class="active"' : '' : '' ; ?>><a href="index.php?content=payments">Payments</a></li>
				<li <?php echo (isset($data['content']) && isset($data['action'])) ? ($data['content'] == 'payments' && $data['action'] == 'add') ? 'class="active"' : '' : '' ; ?>><a href="index.php?content=payments&action=add">Add Payment</a></li>
				<li <?php echo (isset($data['content']) && isset($data['action'])) ? ($data['content'] == 'accounts' && $data['action'] == 'add') ? 'class="active"' : '' : '' ; ?>><a href="index.php?content=accounts&action=add">Add Account</a></li>
			</ul>
		</div>
	</div>
</nav>