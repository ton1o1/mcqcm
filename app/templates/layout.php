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
    <link rel="stylesheet" href="<?= $this->assetUrl('fonts/mcqcm-font/fonts.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/question_build.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>">

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
            <li><a href="<?= $this->url('quiz_search') ?>"><span class="glyphicon glyphicon-search"></span>Rechercher un quiz</a></li>
            <li><a href="<?= $this->url('result_view_input') ?>"><span class="glyphicon glyphicon-list"></span>Classements</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
                <?php
                if(!empty($w_user)){
                ?>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-comment"></span>Mes quizzes <b class="caret"></b>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->url('quiz_view_user', ['userId' => 1]) ?>" title="Voir les quizzes que j'ai créé"><span class="glyphicon glyphicon-question-sign"></span>Mes quizzes</a></li>
                        <li><a href="<?= $this->url('quiz_create') ?>" title="Créer un nouveau quiz"><span class="glyphicon glyphicon-plus"></span>Créer un quiz</a></li>
                    </ul>
                </li>
                <li><a href="<?= $this->url('result_view_individual', ['userId' => $w_user['id']]) ?>"><span class="glyphicon glyphicon-signal"></span>Mes résultats</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-user"></span><?= ucfirst($w_user['first_name']) . ' ' . ucfirst($w_user['last_name']) ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $this->url('user_profile') ?>"><span class="glyphicon glyphicon-user"></span>Profil</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= $this->url('user_logout') ?>"><span class="glyphicon glyphicon-off"></span>Déconnexion</a></li>
                    </ul>
                </li>
                <?php }
                else{
                ?>
                <li><a href="<?= $this->url('user_login') ?>"><span class="glyphicon glyphicon-lock"></span>Connexion</a></li>
                <li><a href="<?= $this->url('user_register') ?>"><span class="glyphicon glyphicon-plus"></span>Inscription</a></li>
                <?php
                }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="alert alert-danger text-center" id="javascript-error" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>Javascript n'est pas activé sur votre navigateur. Pour une interface plus cool et intuitive, veuillez l'activer.</div>

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


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="<?= $this->assetUrl('js/select2.full.min.js') ?>"></script>
<script>$("#javascript-error").hide();</script>

<?= $this->section('scripts') ?>

</body>
</html>