<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= ($nbre_client!=NULL)?$nbre_client:0; ?></h3>
                <p>Nombre de clients</p>
            </div>
            <div class="icon">
                <i class="ion ion-user"></i>
            </div>
            <a href="#" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= ($qte_pieces!=NULL)?$qte_pieces:0; ?></h3>
                <p>Quantité de pièces vendues</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/Pieces/vente/liste" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= ($nbre_mtn!=NULL)?$nbre_mtn:0; ?></h3>
                <p>Nombre de maintenances prévues</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="/Maintenance/prevues" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= ($nbre_fctr_imp!=NULL)?$nbre_fctr_imp:0; ?></h3>
                <p>Nombre de factures impayées</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/Comptabilite/facture-non-reglee" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>