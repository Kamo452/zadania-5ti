<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	
	<title>Logowanie | Kalkulator Kredytowy</title>

	<?php
    	include _ROOT_PATH.'/templates/top.php';
	?>

</head>
<body>


<form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">

	<div style="width:90%; margin: 2em auto; background-color: white; padding: 20px;">

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
<?php
include _ROOT_PATH.'/templates/bottom.php';
?>
</body>
</html>