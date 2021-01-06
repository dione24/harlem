<section>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $titles; ?></h3>
          <form method="POST" role="form">
            <div class="card-body">
              <div class="row form-group">

                <div class="col-md-3">
                  <label for="nom">Nom</label>
                  <input id="nom" name="nom" type="text" class="form-control" value="<?= (isset($compte))? $compte['NomUsers']:''; ?>" placeholder="Nom..." required>
              </div>

              <div class="col-md-3">
                  <label for="prenom">Prénom</label>
                  <input id="prenom" name="prenom" type="text" class="form-control" value="<?= (isset($compte))? $compte['PrenomUsers']:''; ?>" placeholder="Prénom..." required>
              </div>

              <div class="col-md-3">
                  <label for="email">Email</label>
                  <input id="email" name="email" type="email" class="form-control" value="<?= (isset($compte))? $compte['EmailUsers']:''; ?>" placeholder="Prénom..." required>
              </div>

              <div class="col-md-3">
                  <label for="username">Identifiant</label>
                  <input id="username" name="username" type="text" class="form-control" value="<?= (isset($compte))? $compte['login']:''; ?>" placeholder="Identifiant..." required>
              </div>

              <div class="col-md-3">
                  <label for="password">Mot de passe </label>
                  <input id="password" name="password" type="password" class="form-control" placeholder="Mot de passe ..." required>
              </div>

              <div class="col-md-3">
                <label for="statut">Statut</label>
                <select id="statut" name="statut" class="form-control" required>
                    <option value="">Statut</option>
                    <?php foreach ($statuts as $statut) { ?>
                        <option value="<?= $statut['RefStatut']; ?>" <?= (isset($compte) && $compte['RefStatut']==$statut['RefStatut'])?'selected':''; ?>><?= $statut['name_statut']; ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Enrégistrer</button>
      <a href="/Compte/liste" class="btn btn-default">Annuler</a>
  </div>
</form>
</div>
</div>
</div>
</div>
</section>