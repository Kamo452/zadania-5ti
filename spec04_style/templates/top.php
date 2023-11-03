<?php require_once dirname(__FILE__) .'/../config.php';?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php out($page_description); if (!isset($page_description)) {  ?> Opis domyślny ... <?php } ?>">
    <link rel="icon" href="<?php print(_APP_URL); ?>/img/logo.jpg">
    <title><?php out($page_title); if (!isset($page_title)) {  ?> Tytuł domyślny ... <?php } ?></title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/style.css">
</head>
<body>

<div id="app_top" class="header">

</div>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 0;">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand">Kalkulator Kredytowy | KB</a>
        </div>
        <?php if (!empty($role)) {  ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=""><span class="glyphicon glyphicon-user"></span> Zalogowano jako <?php echo $role ?></a></li>
                <?php if (isset($chroniona)) { ?> 
                <li><a href="<?php print(_APP_ROOT); ?>/app/calc.php"><span class="glyphicon glyphicon-ok-circle"></span> Powrót do kalkulatora</a></li>
                <?php } else { ?>
                <li><a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php"><span class="glyphicon glyphicon-ok-circle"></span> Kolejna chroniona strona</a></li>
                <li><a href="#app_content"><span class="glyphicon glyphicon-ok-circle"></span> Idź do formularza</a></li>
                <li><a href="#app_top"><span class="glyphicon glyphicon-ok-circle"></span> Idź do góry strony</a></li>
                <?php } ?>
                <li><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php"><span class="glyphicon glyphicon-log-out"></span> Wyloguj się</a></li>
            </ul>
            <?php } else { ?>
                <ul class="nav navbar-nav navbar-right">
      			<li><a href="">Nie zalogowano</a></li>
      			<li><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php"><span class="glyphicon glyphicon-log-in"></span> Zaloguj się</a></li>
     		</ul>
            <?php } ?>
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

<div class="content-wrapper">

    <div id="app_content" class="content">
