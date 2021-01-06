<section>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter une nouvelle vente de pièces</h3>
                    <form class="form-horizontal" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="date" class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="date" name="date" value="<?= (isset($vente))? $vente['Date']:date('Y-m-d'); ?>" placeholder="Date de la vente" readonly required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom" class="col-sm-2 control-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nom" name="nom" value="<?= (isset($vente))? $vente['Nom']:''; ?>" placeholder="Nom du client" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="prenom" class="col-sm-2 control-label">Prénom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?= (isset($vente))? $vente['Prenom']:''; ?>" placeholder="Prénom du client" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="col-sm-2 control-label">N° Téléphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="<?= (isset($vente))? $vente['Telephone']:''; ?>" placeholder="N° de téléphone du client" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vente_pieces" class="col-sm-2 control-label">Pièces</label>
                                <div class="col-sm-10">
                                    <select id="vente_pieces" name="vente_pieces[]" multiple class="form-control" required>
                                        <?php foreach ($pieces as $piece) { ?>
                                        <option value="<?= $piece['RefPieces']; ?>" <?= (isset($vente) && in_array($piece['RefPieces'],$v_pieces))?'selected':''; ?>><?= $piece['NomPiece']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div id="quantite_piece">
                                <?php if (isset($vente_pieces)) {
                                    foreach ($vente_pieces as $piece) { ?>
                                <div class="form-group">
                                    <label for="quantite<?= $piece['RefPieces']; ?>" class="col-sm-2 control-label"><?= $piece['NomPiece']; ?></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="quantite<?= $piece['RefPieces']; ?>" name="quantite[<?= $piece['RefPieces']; ?>]" multiple="multiple" value="<?= $piece['Quantite']; ?>" onkeyup="calculerMontant(<?= $piece['RefPieces']; ?>,<?= $piece['Prix']; ?>)">
                                    </div>
                                    <label for="montant<?= $piece['RefPieces']; ?>" class="col-sm-2 control-label">Montant</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="montant<?= $piece['RefPieces']; ?>"  value="<?= $piece['Quantite']*$piece['Prix']; ?>" readonly>
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Enregister</button>
                            <a href="/Pieces/vente/liste" class="btn btn-default">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>