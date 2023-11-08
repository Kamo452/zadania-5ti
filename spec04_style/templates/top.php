<?php require_once dirname(__FILE__) .'/../config.php';?>
<!doctype html>
<html lang="pl">
<head>

    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php out($page_description); if (!isset($page_description)) {  ?> Opis domyślny ... <?php } ?>">
    
    <link rel="icon" href="<?php print(_APP_URL); ?>/img/logo.jpg">
    
    <title><?php out($page_title); if (!isset($page_title)) {  ?> Tytuł domyślny ... <?php } ?></title>

    <script src="<?php print(_APP_URL); ?>/js/jquery-1.12.4.min.js"></script>
        <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/style.css">
    <script src="<?php print(_APP_URL); ?>/js/bootstrap.js"></script>

</head>
<body>

    <div id="app_top" class="header">

        <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 0;">

            <div class="container-fluid">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand">Kalkulator Kredytowy | KB</a>

                </div>

                <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">

                    <ul class="nav navbar-nav navbar-right">

                        <?php if (!empty($role)) {  ?>
                        <li><a href=""><span class="glyphicon glyphicon-user"></span> Zalogowano jako <?php echo $role ?></a></li>
                        <?php if (isset($chroniona)) { ?> 
                        <li><a href="<?php print(_APP_ROOT); ?>/app/calc.php"><span class="glyphicon glyphicon-ok-circle"></span> Powrót do kalkulatora</a></li>
                        <?php } else { ?>
                        <li><a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php"><span class="glyphicon glyphicon-ok-circle"></span> Kolejna chroniona strona</a></li>
                        <li><a href="#app_content"><span class="glyphicon glyphicon-ok-circle"></span> Idź do formularza</a></li>
                        <li><a href="#app_top"><span class="glyphicon glyphicon-ok-circle"></span> Idź do góry strony</a></li>
                        <?php } ?>
                        <li><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php"><span class="glyphicon glyphicon-log-out"></span> Wyloguj się</a></li>
                    
                        <?php } else { ?>
                        <li><a href="">Nie zalogowano</a></li>
                        <li><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php"><span class="glyphicon glyphicon-log-in"></span> Zaloguj się</a></li>
                        <?php } ?>

                    </ul>

                </div>

            </div>

        </nav>

        <div class="container" style="padding: 15px">

        </div>

        <div class="splash-container" style="width:90%; margin: 2em auto; background-color: white; padding: 20px; margin-top: 40px;">
            
            <div class="splash">
                <h1 class="splash-head"><img src="<?php print(_APP_URL); ?>/img/logo.jpg" style="width:30px; height: 30px;"> <?php out($page_header); if (!isset($page_header)) {  ?> Tytuł domyślny ... <?php } ?></h1>
                <p class="splash-subhead">
                    <?php out($page_description); if (!isset($page_description)) {  ?> Opis domyślny ... <?php } ?>
                </p>
            </div>
            
        </div>

    </div>

<div class="content-wrapper">

    <div id="app_content" class="content">
