<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Logowanie | Kalkulator Kredytowy</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<?php
    	include _ROOT_PATH.'/templates/top.php';
	?>
</head>
<body>


<form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">
	<nav class="navbar navbar-inverse" style="margin-bottom: 0;">
    	<div class="container-fluid">
      		<div class="navbar-header">
        		<a class="navbar-brand">Kalkulator Kredytowy | KB</a>
     		</div>

      		<ul class="nav navbar-nav navbar-right">
      			<li><a href="">Nie zalogowano</a></li>
      			<li><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php"><span class="glyphicon glyphicon-log-in"></span> Zaloguj się</a></li>
     		</ul>
    	</div>
  	</nav>

	<div style="width:90%; margin: 2em auto; background-color: white; padding: 20px;">
	<h3>Logowanie</h3>

	<hr>

	<?php

		if (isset($messages)) {
			if (count ( $messages ) > 0) {
				echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span>
				<strong>Wystąpił błąd: <br></strong><ul>';
				foreach ( $messages as $key => $msg ) {
					echo '<li>'.$msg.'</li>';
				}
				echo '</ul></div><hr>';
			}
		}

	?>
		<label for="id_login" style="width: 15%;">Login: </label>
		<div>
			<input placeholder="Wpisz login..." id="id_login" type="text" name="login" class="form-control" value="<?php out($form['login']); ?>" style="width: 33%;">
		</div>
		<br>
		<label for="id_pass">Hasło: </label>
		<div>
			<input placeholder="Wpisz hasło..." id="id_pass" type="password" class="form-control" name="pass" style="width: 33%;">
		</div>
		<br>
	<input type="submit" class="btn btn-primary" value="Zaloguj">
	<br>
</form>	




</div>

</body>
</html>