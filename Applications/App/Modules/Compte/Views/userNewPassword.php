<div class="row">

	<?php require __DIR__.'/userProfil.php'; ?>

	<div class="col-md-8">
		<div class="box box-default">
			<div class="box-header">
				<h3 class="box-title">Change password</h3>
			</div>
			<?php if ($user->hasFlash()) { ?>
			<p class="alert alert-danger"><?= $user->getFlash(); ?></p>
			<?php } ?>
			<form method="POST" role="form">
				<div class="box-body">
					<div class="form-group">
						<label for="password">Password</label>
						<input id="password" name="password" type="password" class="form-control" placeholder="Type your new password..." required>
					</div>
					<div class="form-group">
						<label for="password_conf">Confrim password</label>
						<input id="password_conf" name="password_conf" type="password" class="form-control" placeholder="Confrim your new password..." required>
					</div>
				</div>

				<div class="box-footer">
					<button type="submit" class="btn btn-primary" title="Save the information">Save</button>
					<a href="/profil" class="btn btn-default" title="Back to the previous page">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>