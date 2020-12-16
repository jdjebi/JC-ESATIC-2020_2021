<div class="card resac-account-card-support">
  <div class="card-header">
    Informations personnelles
  </div>
  <div class="card-body">
    <?php if(isset($FormInfo->errors)): ?>

      <?php if(isset($FormInfo->errors["required"])): ?>
        <div class="alert alert-danger">
          Veuiller remplir tous les champs.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>
    <?php endif ?>
    <form action="<?= route('param') ?>" method="post">
      @csrf
      <div class="form-group">
        <label for="nom">Nom <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $FormInfo->state('nom') ?>" value="<?= $FormInfo->get("nom") ?>" name="nom" value="" id="nom">
        <span class="text-danger small"><?= $FormInfo->get_error('required2','nom') ?></span>
      </div>

      <div class="form-group">
        <label for="prenom">Prénom <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $FormInfo->state('prenom') ?>" value="<?= $FormInfo->get("prenom") ?>" name="prenom" id="prenom">
        <span class="text-danger small"><?= $FormInfo->get_error('required2','prenom') ?></span>
      </div>

      <div class="form-group">
        <label for="email">E-mail <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $FormInfo->state('email') ?>" value="<?= $FormInfo->get("email") ?>" name="email" id="email">
        <span class="text-danger small"><?= $FormInfo->get_error('*','email') ?></span>
      </div>

      <div class="form-group">
        <label for="numero">Numéro de téléphone</label>
        <input type="text" class="form-control <?= $FormInfo->state('numero') ?>" value="<?= $FormInfo->get("numero") ?>" name="numero" id="numero">
        <span class="text-danger small"><?= $FormInfo->get_error('*','numero') ?></span>
      </div>

      <h5 class="mt-5">Lieu d'habitation actuel</h5>
      <hr>

      <div class="form-row">

        <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
          <label for="pays">Pays</label>
          <select class="form-control" name="pays" value="" id="pays">

            <?php if(empty($FormInfo->get("pays"))): ?>
              <option value="" selected>Aucun pays</option>
            <?php else: ?>
              <option value="">Aucun pays</option>
              <option value="<?= $FormInfo->get('pays') ?>" selected><?= Country::get($FormInfo->get("pays")) ?></option>
            <?php endif ?>

            <option v-for="(country, code) in countries" v-bind:value="code">@{{ country }}</option>
          </select>
          <span class="text-danger small"><?= $FormInfo->get_error('selects','pays') ?></span>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
          <label for="ville">Ville</label>
          <input type="text" name="ville" class="form-control" id="ville" value="<?= $FormInfo->get('ville') ?>">
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
          <label for="commune">Commune &middot Quartier</label>
          <input type="text" name="commune" class="form-control" id="commune" value="<?= $FormInfo->get('commune') ?>">
        </div>

      </div>

      <h5 class="mt-5">Mon parcours</h5>
      <hr>

      <h6>Promotion</h6>
      <div class="form-row mb-4">
        <div class="col-md-6 mb-3">
          <label for="promo1">Année de début</label>
          <input type="number" min="1945" max="2021" name="promo1" class="form-control" id="promo1" value="<?= $FormInfo->get("promo1") ?>">
          <span class="text-danger"><?= $FormInfo->get_error('double_required','promo') ?></span>
          <span class="text-danger"><?= $FormInfo->get_error('integer','promo1') ?></span>
          <span class="text-danger"><?= $FormInfo->get_error('interval','promo1.interval') ?></span>
        </div>
        <div class="col-md-6 mb-3">
          <label for="promo2">Année de fin</label>
          <input type="number" min="1945" max="2021" name="promo2" class="form-control" id="promo2" value="<?= $FormInfo->get("promo2") ?>">
          <span class="text-danger"><?= $FormInfo->get_error('integer','promo2') ?></span>
          <span class="text-danger"><?= $FormInfo->get_error('interval','promo2.interval') ?></span>
        </div>
      </div>

      <h6>Etude et vie professionelle</h6>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="universite">Dernière université fréquentée</label>
          <input type="text" name="universite" class="form-control" placeholder="Lycée Classique d'Abidjan" id="universite" value="<?= $FormInfo->get("universite") ?>">
        </div>
        <div class="col-md-6 mb-3">
          <label for="emploi">Emploi récent</label>
          <input type="text" name="emploi" class="form-control" placeholder="Etudiant" id="emploi" value="<?= $FormInfo->get("emploi") ?>">
        </div>
      </div>

      <div class="">
        <p><small><b>Les champs marqués du caractère <span class="text-danger">*</span> sont obligatoires.</b></small></p>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-sm btn-primary" name="change_info">Envoyer</button>
      </div>
    </form>
  </div>
</div>
