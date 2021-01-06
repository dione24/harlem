<section>
    <br /><br />
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des maintenances</h3>
                    <a href="/Maintenance/add" class="btn btn-sm btn-success" style="float: right;"><i
                            class="fa fa-plus"></i></a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Plaque</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Prix</th>
                                <th>Etat</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($maintenances as $maintenance) { ?>
                            <tr>
                                <td><?= date('d/m/Y', strtotime($maintenance['Date'])); ?></td>
                                <td><?= $maintenance['Plaque']; ?></td>
                                <td><?= $maintenance['Nom']; ?></td>
                                <td><?= $maintenance['Prenom']; ?></td>
                                <td><?= $maintenance['Telephone']; ?></td>
                                <td><?= $maintenance['Prix']; ?></td>
                                <td class="<?php
                                                $today = date('Y-m-d');
                                                if ($maintenance['RefStatut'] == 2) {
                                                    echo "bg-success";
                                                } elseif ($maintenance['Date'] > $today) {
                                                    echo "bg-danger";
                                                } elseif ($maintenance['Date'] == $today) {
                                                    echo "bg-primary";
                                                } else {
                                                    echo "bg-success";
                                                } ?>">
                                    <?php
                                        $today = date('Y-m-d');
                                        if ($maintenance['RefStatut'] == 2) {
                                            echo "Terminé";
                                        } elseif ($maintenance['Date'] > $today) {
                                            echo "A venir";
                                        } elseif ($maintenance['Date'] == $today) {
                                            echo "Aujourd'hui";
                                        } else {
                                            echo "Passé";
                                        }
                                        ?></td>
                                <td data-toggle="modal"
                                    data-target="#modal-maintenance-<?= $maintenance['RefMaintenance']; ?>"
                                    class="<?= ($maintenance['RefStatut'] == 2) ? 'bg-success' : 'bg-danger'; ?>">
                                    <?= $maintenance['Statut']; ?></td>
                                <td>
                                    <a href="/Maintenance/facture/<?= $maintenance['RefMaintenance']; ?>"
                                        class="btn btn-xs btn-default" target="_blank"><i class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-xs btn-default" data-toggle="modal"
                                        data-target="#modal-maintenance-<?= $maintenance['RefMaintenance']; ?>"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="/Maintenance/update/<?= $maintenance['RefMaintenance']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <?php if ($_SESSION['statut']=='Admin') { ?> 
                                    <a href="/Maintenance/delete/<?= $maintenance['RefMaintenance']; ?>" class="btn
                                    btn-xs btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');"><i class="fa fa-trash"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Plaque</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Prix</th>
                                <th>Etat</th>
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

<?php foreach ($maintenances as $maintenance) { ?>
<div class="modal fade" id="modal-maintenance-<?= $maintenance['RefMaintenance']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Description</h4>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <blockquote>
                        <?= $maintenance['Description']; ?>
                    </blockquote>
                    <input type="hidden" name="id" value="<?= $maintenance['RefMaintenance']; ?>">
                    <?php if ($maintenance['RefStatut'] == 2) { ?>
                    <blockquote class="bg-success">
                        <?= $maintenance['Rapport']; ?>
                    </blockquote>
                    <input type="hidden" name="statut" value="2">
                    <?php } else { ?>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="statut" placeholder="Entrer le nom de la pièce"
                                <?= ($maintenance['RefStatut'] == 1) ? 'checked' : ''; ?> value="1"
                                class="statut_non_reglee-<?= $maintenance['RefMaintenance']; ?>">
                            Non reglée
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="statut" placeholder="Entrer le nom de la pièce"
                                <?= ($maintenance['RefStatut'] == 2) ? 'checked' : ''; ?> value="2"
                                class="statut_reglee-<?= $maintenance['RefMaintenance']; ?>">
                            Reglée
                        </label>
                    </div>
                    <?php } ?>
                    <div class="div_rapport">
                        <label for="rapport">Rapport</label>
                        <textarea id="rapport" name="rapport"
                            class="form-control"><?= $maintenance['Rapport']; ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>