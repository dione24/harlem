<div class="row">

	<?php require __DIR__.'/userProfil.php'; ?>

	<div class="col-md-8">
		<div class="box box-default">
			<div class="box-header">
				<h3 class="box-title">Changer de mot de passe</h3>
			</div>
			<?php if ($user->hasFlash()) { ?>
			<p class="alert alert-danger"><?= $user->getFlash(); ?></p>
			<?php } ?>
			<form method="POST" role="form">
				<div class="box-body">
					<div class="form-group">
						<label for="password">Mot de passe</label>
						<input id="password" name="password" type="password" class="form-control" placeholder="Mot de passe..." required>
					</div>
				</div>

				<div class="box-footer">
					<button type="submit" class="btn btn-primary" title="Enrégistrer l'information">Save</button>
					<a href="/profil" class="btn btn-default" title="Back to the previous page">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>