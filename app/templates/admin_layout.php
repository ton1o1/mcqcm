<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?> - MCQCM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
     <link rel="stylesheet" href="<?= $this->assetUrl('css/animate.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/admin.min.css') ?>">
</head>
<body>
<!-- HEADER - Beginning -->
    <header class="header">
        <div class="container">

            <h1 class="logo"><a href="<?= $this->url("home");?>"><span class="logo__icon icon-mcqcm-logo"></span><span class="logo__text">MCQCM</span></a></h1>
        
            <nav class="navigation navigation--header" role="menu">

                
                <?php 
                    if(empty($w_user)){
                ?>
                        <a class="navigation__connexion" href="<?= $this->url("user_login", []);?>">se connecter</a>
                <?php
                        }
                    else {
                ?>
                        <a class="navigation__connexion" href="<?= $this->url("user_logout", []);?>">se déconnecter</a>
                <?php }?>

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
        </nav>
        </div>
    </footer>
<!-- FOOTER - End -->

<!-- JS SCRIPTS -->
    <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= $this->assetUrl('js/bootstrap.js') ?>"></script>
    <script type="text/javascript" src="<?= $this->assetUrl('js/admin.js') ?>"></script>

</body>
</html>