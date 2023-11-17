<!DOCTYPE html>
<html lang="pl">
<?php
    include _ROOT_PATH.'/templates/top.php';
?>
<head>

    <meta charset="UTF-8">

</head>

<body>


    <div style="width:90%; margin: 2em auto; background-color: white; padding: 20px;">


    <div id = "panel">

        <form action="<?php print(_APP_ROOT);?>/app/calc.php" method="post">

    <?php
        global $role;
        if ($role != 'admin' && (!isset($resultRata)) && (empty($messages))) {
            echo '<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>
            <strong>Uwaga! <br></strong>Z rolą \'user\' nie możesz przeliczyć kredytu powyżej 100 000 PLN. Ponadto minimalne oprocentowanie wynosi 5%.</div>';
        }
        
    ?>
    <?php if (isset($resultRata)){ ?>
        <?php 
        echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>
        <strong>Wynik: <br></strong><ul>';
        echo 'Rata miesięczna: '. $resultRata. " zł</div>"; 
        ?>
    <?php } ?>
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







</body>
<?php
include _ROOT_PATH.'/templates/bottom.php';
?>
</html>


