<div class="entete-info">
    <div class="data-ei-1">
        <p><i class="fa fa-user"></i> <b><?= $maintenance['Nom']; ?></b> </p>
        <p><i class="fa fa-user"></i> <b><?= $maintenance['Prenom']; ?> </b></p>
        <p><i class="fa fa-phone-alt"></i> <b> <?= $maintenance['Telephone']; ?> </b></p>
    </div>
    <div class="data-ei-2">
        <h2>FACTURE</h2>
        <div class="cell-ei">
            <span class="cell-ei-i">
                <i class="fas fa-dollar-sign"></i>
            </span>
            <span class="cell-ei-f">
                <p>Montant TTC:</p>
                <p><b><?= ($maintenance['Prix'] * 0.18) + $maintenance['Prix']; ?></b></p>
            </span>
        </div>
        <div class="cell-ei">
            <span class="cell-ei-i">
                <i class="far fa-calendar-alt"></i>
            </span>
            <span class="cell-ei-f">
                <p>Date:</p>
                <p><b><?= $maintenance['Date']; ?></b></p>
            </span>
        </div>
        <div class="cell-ei">
            <span class="cell-ei-i">
                <i class="fas fa-barcode"></i>
            </span>
            <span class="cell-ei-f">
                <p>Facture N°:</p>
                <p><b><?= $maintenance['RefMaintenance']; ?></b></p>
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
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $maintenance['Plaque']; ?></td>
                <td><?= $maintenance['Description']; ?></td>
                <td><?= $maintenance['Prix']; ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="invoice-footer-1">
                <td></td>
                <td></td>
                <td class="calcul-if">
                    <p>Montant HT: <?= $maintenance['Prix']; ?></p>
                    <p>Tva 18% : <?= $maintenance['Prix'] * 0.18; ?></p>
                </td>
            </tr>
            <tr class="invoice-footer-2">
                <td></td>
                <td>Montant TTC:</td>
                <td><?= ($maintenance['Prix'] * 0.18) + $maintenance['Prix'] . " CFA"; ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>