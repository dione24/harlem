<section >
    <br/><br/>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des Pièces</h3>
                </div>
                <div class="box-body">
	                <a href="/Compte/add" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un utilisateur</a>
                    <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Identidiant</th>
								<th>Email</th>
								<th>Statut</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($comptes as $compte) { ?>
								<tr>
									<td><?= $compte['NomUsers']; ?></td>
									<td><?= $compte['PrenomUsers']; ?></td>
									<td><?= $compte['login']; ?></td>
									<td><?= $compte['EmailUsers']; ?></td>
									<td><?= $compte['name_statut']; ?></td>
									<td>
										<a href="/Compte/update/<?= $compte['RefUsers']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
										<a href="/Compte/delete/<?= $compte['RefUsers']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément !');"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
            </div>
        </div>
    </div>
</div>
</section>