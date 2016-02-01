<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">

    <title><?= $this->e($title) ?> | MCQCM</title>

    <meta name="description" content="Learning platform, quizzes and skill tests" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/select2-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('fonts/mcqcm-font/fonts.css') ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand icon-mcqcm-logo" href="<?= $this->url("home") ?>" title="Retour à l'accueil" aria-label="MCQCM"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>Accueil</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-list-alt"></span>Catégories <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://www.jquery2dotnet.com">Action</a></li>
                        <li><a href="http://www.jquery2dotnet.com">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-search"></span>Recherche <b class="caret"></b></a>
                    <ul class="dropdown-menu" style="min-width: 300px;">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="navbar-form navbar-left" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">
                                                Go!</button>
                                        </span>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-comment"></span>Quizzes <b class="caret"></b>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>Mes quizzes</a></li>
                        <li><a href="<?= $this->url("quiz_create") ?>"><span class="glyphicon glyphicon-plus"></span>Créer un quiz</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-envelope"></span>Résultats <span class="label label-primary">32</span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="label label-success">81 %</span>PHP orienté objet</a></li>
                        <li><a href="#"><span class="label label-danger">47 %</span>Opquast</a></li>
                        <li><a href="#"><span class="label label-warning">62 %</span>Javascript</a></li>
                        <li><a href="#"><span class="label label-success">90 %</span>HTML & CSS</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="text-center">Voir tous mes résultats</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-user"></span>Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Profil</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Mon compte</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="glyphicon glyphicon-off"></span>Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <section class="container global-content">
        <?= $this->section('main_content') ?>
    </section>

    <footer class="footer">
      <div class="container">
        <div class="text-muted left">&copy 2016 MCQCM</div>
        <div class="text-muted right">
            <a href="<?= $this->url("about") ?>" title="En savoir plus sur les créateurs de MCQCM">A propos</a> - <a href="<?= $this->url("legal") ?>" title="Consulter les mentions légales et conditions d'utilisation">Mentions légales</a> - <a href="<?= $this->url("contact") ?>" title="Contacter notre équipe">Nous contacter</a>
        </div>
      </div>
    </footer>


<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="<?= $this->assetUrl('js/select2.full.min.js') ?>"></script>
<script type='text/javascript' src="<?= $this->assetUrl('js/scripts.js') ?>"></script>
<?= $this->section('scripts') ?>
</body>
</html>