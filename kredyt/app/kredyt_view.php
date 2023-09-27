<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="UTF-8">
    <title>Kredyt</title>
    <link rel="stylesheet" href="style/style.css">

</head>

<body>

    <div id = "naglowek">

        Kredyt

    </div>

    <hr>

    <div id = "panel">

        <form action="<?php print(_APP_URL);?>/app/kredyt.php" method="post">

            <label for="id_kwota">Kwota kredytu: </label>
            <input id="id_kwota" min="1000" step="1000" max="250000" type="range" name="kwota" autocomplete="off" value="<?php echo isset($kwota) ? $kwota : "1000"; ?>">
            <font id="kwotaTekst"><?php echo isset($kwota) ? $kwota : "1000"; ?></font> zł<br> 

            <label for="id_oprocentowanie">Oprocentowanie: </label>
            <input id="id_oprocentowanie" type="text" name="oprocentowanie" autocomplete="off" value="<?php echo isset($oprocentowanie) ? $oprocentowanie : "3"; ?>">
            %
            <br>

            <label for="id_czas">Czas spłaty: </label>
            <input id="id_czas" min="3" max="120" type="range" name="czas" autocomplete="off" value="<?php echo isset($czas) ? $czas : "3"; ?>">
            <font id="czasTekst"><?php echo isset($czas) ? $czas : "3"; ?></font> MSC <br>
            
            <input type="submit" value="Oblicz">

            <br>
            <script>
                kwota = document.getElementById("id_kwota");
                kwota.oninput = function() {
                    wartosc = this.value;
                    document.getElementById("kwotaTekst").innerHTML = wartosc;
                }

                czas = document.getElementById("id_czas");
                czas.oninput = function() {
                    wartosc = this.value;
                    document.getElementById("czasTekst").innerHTML = wartosc;
                }
            </script>

        </form>

    <?php

    if (isset($messages)) {
        if (count ( $messages ) > 0) {
            echo '<ol style="padding: 10px 30px; border-radius: 5px; background-color: #f88; width:350px;">';
            foreach ( $messages as $key => $msg ) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
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


