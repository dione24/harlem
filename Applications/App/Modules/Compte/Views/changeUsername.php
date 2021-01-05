<div class="row">

	<?php require __DIR__.'/userProfil.php'; ?>

	<div class="col-md-8">
		<div class="box box-default">
			<div class="box-header">
				<h3 class="box-title">Changer d'identifiant</h3>
			</div>
			

			<form method="POST" role="form">
				<div class="box-body">
					<div class="form-group">
						<label for="username">Identifiant</label>
						<input id="username" name="username" type="username" class="form-control" placeholder="Veuillez saisir votre nouvel identifiant..." value="<?= $profil['login']; ?>" required>
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