<section>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter une Nouvelle Reparation</h3>
                    <form class="form-horizontal" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="Plaque" class="col-sm-2 control-label">Plaque</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="plaque" name="plaque" value="<?= (isset($reparation))? $reparation['Plaque']:''; ?>" placeholder="Plaque d'immatriculation ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom" class="col-sm-2 control-label">Nom du client</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" value="<?= (isset($reparation))? $reparation['NomClient']:''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Prenom" class="col-sm-2 control-label">Prenom du client</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value="<?= (isset($reparation))? $reparation['PrenomClient']:''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Telephone" class="col-sm-2 control-label">Telephone du client</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="<?= (isset($reparation))? $reparation['TelephoneClient']:''; ?>">
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description du Problème</label>
                            <div class="col-sm-10">
                                <textarea id="description" name="description" class="form-control"><?= (isset($reparation))? $reparation['DescriptionProbleme']:''; ?></textarea> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="montant" class="col-sm-2 control-label">Montant</label>
                            <div class="col-sm-10">
                                <input type="text" name="montant" class="form-control" id="montant" placeholder="montant"  value="<?= (isset($reparation))? $reparation['Montant']:''; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enregister</button>
                        <a href="/Reparation/liste" class="btn btn-default">Retour</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>