<section>
    <br /><br />

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des Pièces</h3>
                </div>
                <div class="box-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i> Ajouter une Pièce
                    </button><br /><br />
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Qté</th>
                                <th>Qté Restant</th>
                                <th>PU</th>
                                <th>Montan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pieces as $piece) { ?>
                            <tr>
                                <td><?= $piece['NomPiece']; ?></td>
                                <td><?= $piece['Qte']; ?></td>
                                <td><?= $piece['QteRestante']; ?></td>
                                <td><?= $piece['Prix']; ?></td>
                                <td><?= $piece['Prix']  * $piece['Qte']; ?></td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-default" data-toggle="modal" n
                                        data-target="#modal-default-stock-<?= $piece['RefPieces']; ?>"><i
                                            class="fa fa-plus"></i></a>
                                    <a href="#" class="btn btn-xs btn-primary" data-toggle="modal"
                                        data-target="#modal-default-<?= $piece['RefPieces']; ?>"><i
                                            class="fa fa-edit"></i></a>
                                    <?php if ($_SESSION['statut'] == 'Admin') { ?>
                                    <a href="/Pieces/delete/<?= $piece['RefPieces']; ?>" class="btn btn-xs btn-danger"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');"><i
                                            class="fa fa-trash"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <th>Nom</th>
                            <th>Qté</th>
                            <th>Qté Restant</th>
                            <th>PU</th>
                            <th>Montan</th>
                            <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ajouter une Pièce</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="nom_piece" class="form-control"
                            placeholder="Entrer le nom de la pièce">
                    </div>
                    <div class="form-group">
                        <input type="text" name="prix" class="form-control" placeholder="Entrer le prix de la Pièce ">
                    </div>
                    <div class="form-group">
                        <input type="number" name="quantite" class="form-control"
                            placeholder="Entrer le stock initial pour cette pièce ">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($pieces as $piece) { ?>
<div class="modal fade" id="modal-default-<?= $piece['RefPieces']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="id" value="<?= $piece['RefPieces']; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modifier une Pièce</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="nom_piece" class="form-control" placeholder="Entrer le nom de la pièce"
                            value="<?= $piece['NomPiece']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="prix" class="form-control" placeholder="Entrer le prix de la Pièce "
                            value="<?= $piece['Prix']; ?>">
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

<div class="modal fade" id="modal-default-stock-<?= $piece['RefPieces']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="id_piece" value="<?= $piece['RefPieces']; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Stock d'une pièce</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="date" name="date" class="form-control"
                            placeholder="Entrer la date d'entrée de la pièce">
                    </div>
                    <div class="form-group">
                        <input type="number" name="quantite" class="form-control"
                            placeholder="Entrer la quantité de la Pièce ">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enrégistrer</button>
                </div>
            </form>
        </div>
        <div class="modal-content" style="padding: 0px 20px;">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Quantité</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($piece['stock'] as $stock) { ?>
                    <tr>
                        <td><?= $stock['Quantite']; ?></td>
                        <td><?= date('d/m/Y', strtotime($stock['Date'])); ?></td>
                        <td>
                            <a href="/Pieces/delete-stock/<?= $stock['RefStock']; ?>" class="btn btn-xs btn-danger"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table><br>
        </div>
    </div>
</div>
<?php } ?>