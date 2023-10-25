<?php require_once dirname(__FILE__) .'/../config.php';?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php out($page_description); if (!isset($page_description)) {  ?> Opis domyślny ... <?php } ?>">

    <title><?php out($page_title); if (!isset($page_title)) {  ?> Tytuł domyślny ... <?php } ?></title>

    <script src="<?php print(_APP_URL); ?>/js/bootstrap.bundle.js"></script>
  
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/bootstrap.min.css">
	
</head>
<body>

<div id="app_top" class="header">
     <a href=""><?php out($page_title); if (!isset($page_title)) {  ?> Tytuł domyślny ... <?php } ?></a>
</div>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 0;">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand">Kalkulator Kredytowy | KB</a>
        </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Zalogowano jako <?php echo $role ?></a></li>
                <li><a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php"><span class="glyphicon glyphicon-ok-circle"></span> Kolejna chroniona strona</a></li>
                <li><a href="#app_content"><span class="glyphicon glyphicon-ok-circle"></span> Idź do formularza</a></li>
                <li><a href="#app_top"><span class="glyphicon glyphicon-ok-circle"></span> Idź do góry strony</a></li>
                <li><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php"><span class="glyphicon glyphicon-log-out"></span> Wyloguj się</a></li>
            </ul>
        </div>
    </nav>
    <div class="container" style="padding: 15px">
    </div>
<div class="splash-container" style="width:90%; margin: 2em auto; background-color: white; padding: 20px;">
    <div class="splash">
        <h1 class="splash-head"><?php out($page_header); if (!isset($page_header)) {  ?> Tytuł domyślny ... <?php } ?></h1>
        <p class="splash-subhead">
             <?php out($page_description); if (!isset($page_description)) {  ?> Opis domyślny ... <?php } ?>
        </p>
    </div>
</div>

<div class="content-wrapper">

    <div id="app_content" class="content">
