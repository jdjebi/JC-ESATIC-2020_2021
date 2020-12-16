<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Notifications Flash</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a href="?create=random" class="btn btn-sm btn-outline-secondary">Générer</a>
      <a href="?clear=all" class="btn btn-sm btn-outline-danger">Tout supprimer</a>
    </div>
  </div>
</div>

<div class="">

  <?php foreach (Flash::get2() as $notif): ?>
    <div class="alert alert-<?= $notif["type"] ?> ">
      <div class="text-center">
        <?= $notif["message"] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  <?php endforeach;  ?>

</div>
