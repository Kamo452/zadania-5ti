<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Chroniona strona</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	body {
        background-color: rgb(216, 216, 216);
        font-family: Verdana;
	}
	</style>
</head>
<body>
<nav class="navbar navbar-inverse" style="margin-bottom: 0;">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand">Kalkulator Kredytowy | KB</a>
        </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Zalogowano jako <?php echo $role ?></a></li>
                <li><a href="<?php print(_APP_ROOT); ?>/app/calc.php"><span class="glyphicon glyphicon-ok-circle"></span> Powrót do kalkulatora</a></li>
                <li><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php"><span class="glyphicon glyphicon-log-out"></span> Wyloguj się</a></li>
            </ul>
        </div>
    </nav>
	<div style="width:90%; margin: 2em auto;">
		<p>To jest inna chroniona strona aplikacji internetowej</p>
	</div>	
	<div style="width:90%; margin: 2em auto;">

		<a href="<?php print(_APP_ROOT); ?>/app/calc.php" class="pure-button">
			<button type="button" class="btn btn-default btn-lg">
				<span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span> Powrót do kalkulatora
			</button>
		</a>
		
	</div>



</body>
</html>