<section >
    <br/><br/>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des factures reglées</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type d'opération</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($maintenances as $maintenance) { ?>
                            <tr>
                                <td><?= date('d/m/Y',strtotime($maintenance['Date'])) ?></td>
                                <td>Maintenance</td>
                                <td><?= $maintenance['Nom']; ?></td>
                                <td><?= $maintenance['Prenom']; ?></td>
                                <td><?= $maintenance['Telephone']; ?></td>
                                <td><?= $maintenance['Prix']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php foreach ($reparations as $reparation) { ?>
                            <tr>
                                <td><?= date('d/m/Y',strtotime($reparation['Date'])) ?></td>
                                <td>Réparation</td>
                                <td><?= $reparation['NomClient']; ?></td>
                                <td><?= $reparation['PrenomClient']; ?></td>
                                <td><?= $reparation['TelephoneClient']; ?></td>
                                <td><?= $reparation['Montant']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php foreach ($ventes as $vente) { ?>
                            <tr>
                                <td><?= date('d/m/Y',strtotime($vente['Date'])) ?></td>
                                <td>Vente de pièces</td>
                                <td><?= $vente['Nom']; ?></td>
                                <td><?= $vente['Prenom']; ?></td>
                                <td><?= $vente['Telephone']; ?></td>
                                <td><?= $vente['MontantTotal']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Type d'opération</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Montant</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>