<?php
require '../../vendor/autoload.php';
if(!empty($_SESSION))
// dump($_SESSION);

if (!empty($_COOKIE)) {
  unset($_COOKIE);
}
?>
<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.min.css">


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title><?= $title ?? 'MJ Vaubecourt' ?></title>
</head>
<?php
if (false === strpos($_SERVER['REQUEST_URI'], 'admin') || empty($_SERVER['REQUEST_URI'])) :
  ?>

  <body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="<?= $router->url('index'); ?>">Mj Vaubecourt</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
              Les &Eacute;quipes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= $router->url('smasc') ?>">&Eacute;quipes adulte Masculine</a>
              <a class="dropdown-item" href="<?= $router->url('smfem') ?>">&Eacute;quipe adulte Féminine</a>
              <a class="dropdown-item" href="<?= $router->url('u18masc') ?>">&Eacute;quipe -18 Masculine</a>
              <a class="dropdown-item" href="<?= $router->url('u15fem') ?>">&Eacute;quipe -15 Féminine</a>
              <a class="dropdown-item" href="<?= $router->url('u15masc') ?>">&Eacute;quipe -15 Masculine</a>
              <a class="dropdown-item" href="<?= $router->url('u11masc') ?>">&Eacute;quipe -11 Masculine</a>
              <a class="dropdown-item" href="<?= $router->url('babyhand') ?>">Baby Hand</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
              Le Calepin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= $router->url('calepin') ?>">Consultez le Calepin</a>
              <a class="dropdown-item" href="<?= $router->url('calepinNew') ?>">Ajoutez un article</a>

            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->url('about') ?>">&Agrave; propos</a>
          </li>
          <!-- <li class="nav-item" >
            <a class="nav-link" href="<?= $router->url('contact') ?>">Nous contacter</a>
          </li> -->
          <li class="nav-item">
            <a href="<?= $router->url('news') ?>" class="nav-link">Quoi de neuf ? </a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="container">
      <?= $content ?>
    </div>



  <?php else : ?>



    <?php
      if (session_id()) : ?>
<?php // dump($_COOKIE) ?>
      <body class="d-flex flex-column h-100">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand" href="<?= $router->url('dashboard') ?>">Admin <?php echo$_SESSION['__identite__'] ?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item ">
                <a class="nav-link" href="<?= $router->url('newUser') ?>">Ajouter Utilisateur </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= $router->url('addArticle') ?>">Ajouter Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= $router->url('verifCalpin') ?>">Gestion Calepin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= $router->url('verifNews') ?>">Gestion Feed News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= $router->url('allUser') ?>">Liste Utilisateur</a>
              </li>

              <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
              Résultats du Weekend
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= $router->url('createResult') ?>">Résultats du Weekend</a>
              <a class="dropdown-item" href="<?= $router->url('gestionResult') ?>">Gestion Résultat</a>

            </div>
          </li>
              <li class="form-inline ">
                <a href="<?= $router->url('logout') ?>" class="btn btn-warning">Déconnexion</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="container">


        <?php else : ?>

          <body class="d-flex flex-column h-100 bg-light">
            <div class="jumbotron">
              <h1 class="text-center text-primary">Mj Vaubecourt Administrateur </h1>
            </div>
          </body>
        <?php endif; ?>

        <?= $content ?>
        <?php endif; ?>
      </div>
      <footer class="bg-light  footer mt-auto footer-copyright">
        <div class="container col text-center">
          Maison des Jeunes Vaubécourt &nbsp;
          Style venant de : <a href="https://bootswatch.com/united/">bootswatch</a>
        </div>
      </footer>

    </body>

</html>