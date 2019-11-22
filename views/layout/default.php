<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title><?= $title ?? 'MJ Vaubecourt' ?></title>
</head>
<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?= $router->generate('index'); ?>">Mj Vaubecourt</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            Les &Eacute;quipes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= $router->generate('smasc') ?>">&Eacute;quipes adulte Masculine</a>
          <a class="dropdown-item" href="<?= $router->generate('smfem') ?>">&Eacute;quipe adulte Féminine</a>
          <a class="dropdown-item" href="<?= $router->generate('u18masc') ?>">&Eacute;quipe -18 Masculine</a>
          <a class="dropdown-item" href="#">&Eacute;quipe -15 Féminine</a>
          <a class="dropdown-item" href="#">&Eacute;quipe -15 Masculine</a>
          <a class="dropdown-item" href="#">&Eacute;quipe -11 Masculine</a>
          <a class="dropdown-item" href="#">Baby Hand</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Calepin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">&Agrave; propos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Nous contacter</a>
      </li>
    </ul>
      <a class="btn btn-success my-2 my-sm-0" href="#">Login</a>
  </div>
    </nav>


    <div class="container">
        <?= $content ?>
    </div>
  
  
    <footer class="bg-light  footer mt-auto footer-copyright">
        <div class="container col text-center">
          Maison des Jeunes Vaubécourt &nbsp;
            Style venant de : <a href="https://bootswatch.com/united/">bootswatch</a> 
        </div>
  </footer>
</body>
</html>