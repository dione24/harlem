  <section>
      <br /><br />

      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Liste des Voitures en Reparation</h3>
                      <a href="/Reparation/add" class="btn btn-sm btn-success" style="float: right;"><i
                              class="fa fa-plus"></i></a>
                  </div>
                  <div class="box-body">
                      <table id="example1" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>Plaque</th>
                                  <th>Nom</th>
                                  <th>Prenom</th>
                                  <th>Telephone</th>
                                  <th>Problème</th>
                                  <th>Montant</th>
                                  <th>Statut</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($reparations as $reparation) { ?>
                              <tr>
                                  <td><?= $reparation['Plaque']; ?></td>
                                  <td><?= $reparation['NomClient']; ?></td>
                                  <td><?= $reparation['PrenomClient']; ?></td>
                                  <td><?= $reparation['TelephoneClient']; ?></td>
                                  <td><?= $reparation['DescriptionProbleme']; ?></td>
                                  <td><?= $reparation['Montant'] + $reparation['MontantTotal']; ?></td>
                                  <td data-toggle="modal"
                                      data-target="#modal-reparation-<?= $reparation['RefReparation']; ?>"
                                      <?= ($reparation['RefStatut'] == 1) ? 'class="bg-danger"' : 'class="bg-success"'; ?>>
                                      <?= $reparation['Statut']; ?></td>
                                  <td>
                                      <a href="/Reparation/facture/<?= $reparation['RefReparation']; ?>"
                                          class="btn btn-xs btn-default" target="_blank"><i class="fa fa-print"></i></a>
                                      <a href="/Reparation/update/<?= $reparation['RefReparation']; ?>"
                                          class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                      <a href="/Reparation/delete/<?= $reparation['RefReparation']; ?>"
                                          onclick="return confirm('Êtes-vous sûr de supprimer cet élément ?');"
                                          class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
                              <?php } ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th>Plaque</th>
                                  <th>Nom</th>
                                  <th>Prenom</th>
                                  <th>Telephone</th>
                                  <th>Problème</th>
                                  <th>Montant</th>
                                  <th>Statut</th>
                                  <th>Actions</th>
                              </tr>
                          </tfoot>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <?php foreach ($reparations as $reparation) { ?>
  <div class="modal fade" id="modal-reparation-<?= $reparation['RefReparation']; ?>">
      <div class="modal-dialog">
          <div class="modal-content">
              <form method="POST">
                  <input type="hidden" name="id" value="<?= $reparation['RefReparation']; ?>">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Reglé la réparation</h4>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <input id="statut_non_reglee" type="radio" name="statut"
                              placeholder="Entrer le nom de la pièce"
                              <?= ($reparation['RefStatut'] == 1) ? 'checked' : ''; ?> value="1">
                          <label for="statut_non_reglee">Non reglée</label>
                      </div>
                      <div class="form-group">
                          <input id="statut_reglee" type="radio" name="statut" placeholder="Entrer le nom de la pièce"
                              <?= ($reparation['RefStatut'] == 2) ? 'checked' : ''; ?> value="2">
                          <label for="statut_reglee">Reglée</label>
                      </div>
                      <div class="div_rapport">
                          <label for="rapport">Rapport</label>
                          <textarea id="rapport" name="rapport"
                              class="form-control"><?= $reparation['Rapport']; ?></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Modifier</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <?php } ?>