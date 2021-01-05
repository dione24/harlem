<section class="invoice">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Harlem AUTO
                <small class="pull-right">Date: <?= date('d/m/Y'); ?></small>
            </h2>
        </div>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            De
            <address>
                <strong>Harlem AUTO</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (804) 123-5432<br>
                Email: info@almasaeedstudio.com
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            A
            <address>
                <strong><?= $maintenance['Nom'].' '.$maintenance['Prenom']; ?></strong><br>
                Téléphone : <?= $maintenance['Telephone']; ?><br>
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            <b>Facture N° : 007612</b><br>
            <br>
            <b>Order ID:</b> 4F3S8J<br>
            <b>Payment Due:</b> 2/22/2014<br>
            <b>Account:</b> 968-34567
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Plaque</th>
                        <th>Description</th>
                        <th>Rapport</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= date('d/m/Y',strtotime($maintenance['Date'])); ?></td>
                        <td><?= $maintenance['Plaque']; ?></td>
                        <td><?= $maintenance['Description']; ?></td>
                        <td><?= $maintenance['Rapport']; ?></td>
                        <td><?= $maintenance['Prix']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>