<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Erreur</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="jumbotron mt-5">
        <h1 class="display-4">Connexion à la base de données impossible</h1>
        <?php if($DEBUG): ?>
        <p class="lead text-danger"><?=  $e->getMessage(); ?></p>
        <?php endif ?>
      </div>
    </div>
  </body>
</html>
