<section>
    <br /><br />
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des ventes de pièces</h3>
                    <a href="/Pieces/vente/add" class="btn btn-sm btn-success" style="float: right;"><i
                            class="fa fa-plus"></i></a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Pieces</th>
                                <th>Quantité</th>
                                <th>Montant total</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventes as $vente) { ?>
                            <tr>
                                <td><?= date('d/m/Y', strtotime($vente['Date'])); ?></td>
                                <td><?= $vente['Nom']; ?></td>
                                <td><?= $vente['Prenom']; ?></td>
                                <td><?= $vente['Telephone']; ?></td>
                                <td>
                                    <ul>
                                        <?php foreach ($vente['pieces'] as $piece) { ?>
                                        <li><?= $piece['NomPiece']; ?></li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <?php foreach ($vente['pieces'] as $piece) { ?>
                                        <li><?= $piece['Quantite']; ?></li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td><?= number_format($vente['MontantTotal'], 0, ',', '.'); ?></td>
                                <td data-toggle="modal" data-target="#modal-vente-<?= $vente['RefVente']; ?>"
                                    class="<?= ($vente['RefStatut'] == 2) ? 'bg-success' : 'bg-danger'; ?>">
                                    <?= $vente['Statut']; ?></td>
                                <td>
                                    <a href="/Pieces/vente/facture/<?= $vente['RefVente']; ?>"
                                        class="btn btn-xs btn-default" target="_blank"><i class="fa fa-print"></i></a>
                                    <a href="/Pieces/vente/update/<?= $vente['RefVente']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="/Pieces/vente/delete/<?= $vente['RefVente']; ?>"
                                        class="btn btn-xs btn-danger"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Pieces</th>
                                <th>Quantité</th>
                                <th>Montant total</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php foreach ($ventes as $vente) { ?>
<div class="modal fade" id="modal-vente-<?= $vente['RefVente']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="id" value="<?= $vente['RefVente']; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Reglé la vente</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="statut_non_reglee" type="radio" name="statut" placeholder="Entrer le nom de la pièce"
                            <?= ($vente['RefStatut'] == 1) ? 'checked' : ''; ?> value="1">
                        <label for="statut_non_reglee">Non reglée</label>
                    </div>
                    <div class="form-group">
                        <input id="statut_reglee" type="radio" name="statut" placeholder="Entrer le nom de la pièce"
                            <?= ($vente['RefStatut'] == 2) ? 'checked' : ''; ?> value="2">
                        <label for="statut_reglee">Reglée</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>