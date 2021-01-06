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
                                    <input type="text" class="form-control" id="plaque" name="plaque"
                                        value="<?= (isset($reparation)) ? $reparation['Plaque'] : ''; ?>"
                                        placeholder="Plaque d'immatriculation ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom" class="col-sm-2 control-label">Nom du client</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom"
                                        value="<?= (isset($reparation)) ? $reparation['NomClient'] : ''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Prenom" class="col-sm-2 control-label">Prenom du client</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="prenom" name="prenom"
                                        placeholder="Prenom"
                                        value="<?= (isset($reparation)) ? $reparation['PrenomClient'] : ''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Telephone" class="col-sm-2 control-label">Telephone du client</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telephone" name="telephone"
                                        placeholder="Telephone"
                                        value="<?= (isset($reparation)) ? $reparation['TelephoneClient'] : ''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description du Problème</label>
                                <div class="col-sm-10">
                                    <textarea id="description" name="description"
                                        class="form-control"><?= (isset($reparation)) ? $reparation['DescriptionProbleme'] : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vente_pieces" class="col-sm-2 control-label">Pièces</label>
                                <div class="col-sm-10">
                                    <select id="vente_pieces" name="vente_pieces[]" multiple
                                        class="form-control  select2" required>
                                        <?php foreach ($pieces as $piece) { ?>
                                        <option value="<?= $piece['RefPieces']; ?>"
                                            <?= (isset($vente) && in_array($piece['RefPieces'], $v_pieces)) ? 'selected' : ''; ?>>
                                            <?= $piece['NomPiece']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div id="quantite_piece">
                                <?php if (isset($vente_pieces)) {
                                    foreach ($vente_pieces as $piece) { ?>
                                <div class="form-group">
                                    <label for="quantite<?= $piece['RefPieces']; ?>"
                                        class="col-sm-2 control-label"><?= $piece['NomPiece']; ?></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control"
                                            id="quantite<?= $piece['RefPieces']; ?>"
                                            name="quantite[<?= $piece['RefPieces']; ?>]" multiple="multiple"
                                            value="<?= $piece['Quantite']; ?>"
                                            onkeyup="calculerMontant(<?= $piece['RefPieces']; ?>,<?= $piece['Prix']; ?>)">
                                    </div>
                                    <label for="montant<?= $piece['RefPieces']; ?>"
                                        class="col-sm-2 control-label">Montant</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control"
                                            id="montant<?= $piece['RefPieces']; ?>"
                                            value="<?= $piece['Quantite'] * $piece['Prix']; ?>" readonly>
                                    </div>
                                </div>
                                <?php }
                                } ?>
                            </div>
                            <div class="form-group">
                                <label for="montant" class="col-sm-2 control-label">Frais de Reparation </label>
                                <div class="col-sm-10">
                                    <input type="text" name="montant" class="form-control" id="montant"
                                        placeholder="montant"
                                        value="<?= (isset($reparation)) ? $reparation['Montant'] : ''; ?>">
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