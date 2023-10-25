<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="UTF-8">
    <title>Kalkulator | Kalkulator Kredytowy</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	body {
        background-color: rgb(216, 216, 216);
        font-family: Verdana;
	}
	#naglowek {
		text-align: center;
		background-image: radial-gradient(cyan, blue);
		padding: 10px;
	}
	hr {
		background-color: rgb(255, 255, 255);
	}
	#panel {
		width: 50%;
	}
	input[type="text"] {
		width: 40px;
		text-align: right;
	}
	input[type="submit"] {
		background-image: radial-gradient(blue, cyan);
		color: white;
		padding: 10px;
		margin: 15px;
		border-radius: 10px;
	}
	input[type="submit"]:hover {
		background-image: radial-gradient(cyan, blue);
		color: black;
		padding: 10px;
		margin: 15px;
		border-radius: 10px;
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
                <li><a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php"><span class="glyphicon glyphicon-ok-circle"></span> Kolejna chroniona strona</a></li>
                <li><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php"><span class="glyphicon glyphicon-log-out"></span> Wyloguj się</a></li>
            </ul>
        </div>
    </nav>

    <div style="width:90%; margin: 2em auto; background-color: white; padding: 20px;">
	<h3>Kalkulator</h3>

	<hr>
    <div id = "panel">

        <form action="<?php print(_APP_ROOT);?>/app/calc.php" method="post">

    <?php
        global $role;
        if ($role != 'admin') {
            echo '<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>
            <strong>Uwaga! <br></strong>Z rolą \'user\' nie możesz przeliczyć kredytu powyżej 100 000 PLN. Ponadto minimalne oprocentowanie wynosi 5%.</div>';
        }
    ?>
            <label for="id_kwota">Kwota kredytu: </label>
            <input id="id_kwota" min="1000" step="1000" max="250000" type="range" name="kwota" autocomplete="off" value="<?php out($kwota); ?>">
            <font id="kwotaTekst"><?php out($kwota); ?></font> <font id="dopisekPLN"> <?php echo isset($kwota) ? 'PLN' : ""; ?></font><br>

            <label for="id_oprocentowanie">Oprocentowanie: </label>
            <input id="id_oprocentowanie" type="text" name="oprocentowanie" autocomplete="off" value="<?php out($oprocentowanie); ?>">
            %
            <br>

            <label for="id_czas">Czas spłaty: </label>
            <input id="id_czas" min="3" max="120" type="range" name="czas" autocomplete="off" value="<?php out($czas); ?>">
            <font id="czasTekst"><?php out($czas); ?></font> <font id="dopisekMSC"> <?php echo isset($czas) ? 'MSC' : ""; ?></font><br>
            
            <input type="submit" value="Oblicz" name="submit">

            <br>
            <script>
                kwota = document.getElementById("id_kwota");
                kwota.oninput = function() {
                    wartosc = this.value;
                    document.getElementById("kwotaTekst").innerHTML = wartosc;
                    document.getElementById("dopisekPLN").innerHTML = "PLN";
                }

                czas = document.getElementById("id_czas");
                czas.oninput = function() {
                    wartosc = this.value;
                    document.getElementById("czasTekst").innerHTML = wartosc;
                    document.getElementById("dopisekMSC").innerHTML = "MSC";
                }
            </script>

        </form>

    <?php

    if (isset($messages)) {
        if (count ( $messages ) > 0) {
            echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span>
            <strong>Wystąpił błąd: <br></strong><ul>';
            foreach ( $messages as $key => $msg ) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ul></div>';
        }
    }
    ?>


    <?php if (isset($resultRata)){ ?>

    <div id="wynik" style="padding: 10px; border-radius: 5px; background-color: #ff0; width:350px;">

        <?php echo 'Rata miesięczna: '. $resultRata. " zł"; ?>
        <?php } ?>

    </div>

    </div>

</body>
</html>


