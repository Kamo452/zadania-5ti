<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';
?>
<?php
	$page_title = "Chroniona strona | Kalkulator Kredytowy";
	$page_header = "Inna chroniona strona";
	$page_footer = "Autor: Kamil Bujara 5TI";
	$page_description = "To jest inna chroniona strona";
	$chroniona = "x";
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/style.css">

</head>
<body>
	<?php
		include _ROOT_PATH.'/templates/top.php';
	?>
	
	<div style="width:90%; margin: 2em auto;">

		<a href="<?php print(_APP_ROOT); ?>/app/calc.php" class="pure-button">
			<button type="button" class="btn btn-default btn-lg">
				<span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span> Powrót do kalkulatora
			</button>
		</a>
		
	</div>


	<?php
		include _ROOT_PATH.'/templates/bottom.php';
	?>
</body>
</html>