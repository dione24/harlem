<section>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter d'une maintenance</h3>
                    <form class="form-horizontal" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="date" class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="date" name="date" value="<?= (isset($maintenance))? $maintenance['Date']:''; ?>" placeholder="Date de la vente" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="plaque" class="col-sm-2 control-label">Plaque</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="plaque" name="plaque" value="<?= (isset($maintenance))? $maintenance['Plaque']:''; ?>" placeholder="Plaque du client" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom" class="col-sm-2 control-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nom" name="nom" value="<?= (isset($maintenance))? $maintenance['Nom']:''; ?>" placeholder="Nom du client" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="prenom" class="col-sm-2 control-label">Prénom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?= (isset($maintenance))? $maintenance['Prenom']:''; ?>" placeholder="Prénom du client" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="col-sm-2 control-label">N° Téléphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="<?= (isset($maintenance))? $maintenance['Telephone']:''; ?>" placeholder="N° de téléphone du client" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="prix" class="col-sm-2 control-label">Prix</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="prix" name="prix" value="<?= (isset($maintenance))? $maintenance['Prix']:''; ?>" placeholder="Prix de la maintenance" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" class="form-control" rows="4"><?= (isset($maintenance))? $maintenance['Description']:''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Enregister</button>
                            <a href="/Maintenance/liste" class="btn btn-default">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>