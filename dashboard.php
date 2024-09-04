<?php
	require 'database.php';
?>
<?php require 'includes/header.php'; ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3>Welcome to Admin panel~<?=$_SESSION['logged_id']?> </h3>
			</div>
		</div>
	</div>
</div>
<?php require 'includes/footer.php'; ?>