<div class="entete-info">
    <div class="data-ei-1">
        <p><i class="fa fa-user"></i> <b><?= $InfoVente['Nom']; ?></b> </p>
        <p><i class="fa fa-user"></i> <b><?= $InfoVente['Prenom']; ?> </b></p>
        <p><i class="fa fa-phone-alt"></i> <b> <?= $InfoVente['Telephone']; ?> </b></p>
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
                <p><b><?= $InfoVente['Date']; ?></b></p>
            </span>
        </div>
        <div class="cell-ei">
            <span class="cell-ei-i">
                <i class="fas fa-barcode"></i>
            </span>
            <span class="cell-ei-f">
                <p>Facture N°:</p>
                <p><b><?= $InfoVente['RefVente']; ?></b></p>
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
                <th></th>
                <th>Description</th>
                <th>PU</th>
                <th>Qté</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vente as $key => $ventes) { ?>
                <tr>
                    <td></td>
                    <td><?= $ventes['NomPiece']; ?> </td>
                    <td><?= $ventes['Quantite']; ?></td>
                    <td><?= $ventes['Prix']; ?> </td>
                    <td><?= $Montant; ?></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr class="invoice-footer-1">
                <td></td>
                <td>
                </td>
                <td></td>
                <td class="calcul-if">
                    <p>Montant HT:</p>
                    <p>Tva 18%</p>
                </td>
                <td class="calcul-if">
                    <p><?= $Total; ?></p>
                    <p><?= $Tva; ?></p>
                </td>
            </tr>
            <tr class="invoice-footer-2">
                <td></td>
                <td>
                </td>
                <td></td>
                <td>Montant TTC:</td>
                <td><?= $TotalTTC . " CFA"; ?></td>
            </tr>
        </tfoot>
    </table>
</div>