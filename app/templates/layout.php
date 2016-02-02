<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $this->e($metadesc) ?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>"> -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/animate.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('fonts/mcqcm-font/fonts.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/style.min.css') ?>">
</head>
<body>
<!-- HEADER - Beginning -->
    <header>
        <div class="container">

            <h1 class="logo"><a href="<?= $this->url("home");?>"><span class="logo__icon icon-mcqcm-logo"></span><span class="logo__text">MCQCM</span></a></h1>
        
            <nav class="navigation navigation--header" role="menu">

                <a class="navigation__button" href="#">menu</a>

                <ul class="navigation__list">
                    <li><a class="navigation__item" href="<?= $this->url("home", []);?>">accueil</a></li>
                    <li><a class="navigation__item" href="<?= $this->url("question_builder", []);?>">questions</a></li>
                    <li><a class="navigation__item" href="<?= $this->url("apropos", []);?>">à propos</a></li>
                    <li><a class="navigation__item" href="<?= $this->url("contact", []);?>">contactez-nous</a></li>
                </ul>

                <a class="navigation__connexion" href="<?= $this->url("home", []);?>">se connecter</a>

              </nav>
           
        </div>

    </header>
<!-- HEADER - End -->
<!-- MAIN CONTENT - Begininng -->        
    <section>
        <div class="container">
        <?= $this->section('main_content') ?>
        </div>
    </section>
<!-- MAIN CONTENT - End -->
<!-- FOOTER - Beginning -->
    <footer>
        <div class="container">
        <nav class="navigation navigation--footer" role="navigation">
            <ul>
                <li><a href="<?= $this->url("home", []);?>">accueil</a></li>
                <li><a href="<?= $this->url("question_builder", []);?>">questions</a></li>
                <li><a href="<?= $this->url("apropos", []);?>">à propos</a></li>
                <li><a href="<?= $this->url("contact", []);?>">contactez-nous</a></li>
                <li><a href="<?= $this->url("user_connection", []);?>">se connecter</a></li>
            </ul>           
        </nav>
        </div>
    </footer>
<!-- FOOTER - End -->

<!-- JS SCRIPTS -->
    <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= $this->assetUrl('js/all.js') ?>"></script>

</body>
</html>