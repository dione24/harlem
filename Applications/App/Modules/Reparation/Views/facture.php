<div class="entete-info">
    <div class="data-ei-1">
        <p><i class="fa fa-user"></i> <b><?= $reparation['PrenomClient']; ?></b> </p>
        <p><i class="fa fa-user"></i> <b><?= $reparation['NomClient']; ?> </b></p>
        <p><i class="fa fa-phone-alt"></i> <b> <?= $reparation['TelephoneClient']; ?> </b></p>
    </div>
    <div class="data-ei-2">
        <h2>FACTURE</h2>
        <div class="cell-ei">
            <span class="cell-ei-i">
                <i class="fas fa-dollar-sign"></i>
            </span>
            <span class="cell-ei-f">
                <p>Montant TTC:</p>
                <p><b><?= $TotalTTC; ?></b></p>
            </span>
        </div>
        <div class="cell-ei">
            <span class="cell-ei-i">
                <i class="far fa-calendar-alt"></i>
            </span>
            <span class="cell-ei-f">
                <p>Date:</p>
                <p><b><?= $reparation['Date']; ?></b></p>
            </span>
        </div>
        <div class="cell-ei">
            <span class="cell-ei-i">
                <i class="fas fa-barcode"></i>
            </span>
            <span class="cell-ei-f">
                <p>Facture N°:</p>
                <p><b><?= $reparation['RefReparation']; ?></b></p>
            </span>
        </div>
    </div>
</div>
</div>
<br><br>
<div class="content">
    <table>
        <thead>
            <tr>
                <th>Plaque</th>
                <th>Description</th>
                <th>Montant</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $reparation['Plaque']; ?></td>
                <td><?= $reparation['DescriptionProbleme']; ?></td>
                <td><?= number_format($reparation['Montant'], 0, ',', '.'); ?></td>
                <td></td>
            </tr>
            <?php
            $totalPieces = 0;
            foreach ($pieces as $piece) {
                $totalPieces =  $piece['Quantite'] * $piece['Prix']; ?>
            <tr>
                <td></td>
                <td><?= $piece["NomPiece"] . " " . ($piece["Quantite"]); ?></td>
                <td><?= $piece['Quantite'] * $piece['Prix']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr class="invoice-footer-1">
                <td></td>
                <td></td>
                <td class="calcul-if">
                    <p>Montant HT:</p>
                    <p>Tva 18%</p>
                </td>
                <td class="calcul-if">
                    <p><?= $totalPieces + $reparation['Montant']; ?></p>
                    <p><?= ($totalPieces + $reparation['Montant']) * 0.18; ?></p>
                </td>
            </tr>
            <tr class="invoice-footer-2">
                <td></td>
                <td>
                </td>
                <td>Montant TTC:</td>
                <td><?= $TotalTTC . " CFA"; ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>