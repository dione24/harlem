<div class="col-md-4">
	<div class="box box-primary">
		<div class="box-body box-profile">
			<h3 class="profile-username text-center"><?= $profil['NomUsers']. ' ' .$profil['PrenomUsers']; ?></h3>
			<p class="text-muted text-center">Identifiant : <?= $profil['login']; ?></p>
			<p class="text-muted text-center">Email : <?= $profil['EmailUsers']; ?></p>
			<p class="text-muted text-center">Statut : <?= $profil['name_statut']; ?></p>
			<a href="/Compte/username" class="btn btn-primary btn-block"><b><i class="fa fa-user"></i></b> Changer d'identifiant</a>
			<a href="/Compte/check-password" class="btn btn-primary btn-block"><b><i class="fa fa-lock"></i></b> Changer de mot de passe</a>
		</div>
	</div>
</div>