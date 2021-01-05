<section >
    <br/><br/>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des maintenances</h3>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($maintenances as $maintenance) { ?>
                            <tr>
                                <td><?= date('d/m/Y',strtotime($maintenance['Date'])); ?></td>
                                <td><?= $maintenance['Plaque']; ?></td>
                                <td><?= $maintenance['Nom']; ?></td>
                                <td><?= $maintenance['Prenom']; ?></td>
                                <td><?= $maintenance['Telephone']; ?></td>
                                <td><?= $maintenance['Prix']; ?></td>
                                <td class="<?php
                                    $today = date('Y-m-d');
                                    if ($maintenance['Date']>$today) {
                                        echo "bg-danger";
                                    } elseif ($maintenance['Date']==$today) {
                                        echo "bg-primary";
                                    } else {
                                        echo "bg-success";
                                    } ?>"
                                >
                                <?php
                                    $today = date('Y-m-d');
                                    if ($maintenance['Date']>$today) {
                                        echo "A venir";
                                    } elseif ($maintenance['Date']==$today) {
                                        echo "Aujourd'hui";
                                    } else {
                                        echo "Passé";
                                    }
                                ?></td>
                                <td><?= $maintenance['Statut']; ?></td>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>