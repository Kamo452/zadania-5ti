<?php 

    require_once dirname(__FILE__).'/../config.php';

    $kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : "";

    $oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : "";

    $czas = isset($_REQUEST['czas']) ? $_REQUEST['czas'] : "";

    if (!(isset($kwota)) && isset($oprocentowanie) && isset($czas)) {
        $messages[] = 'Błędne wykonanie aplikacje. Brak jednego z parametrów.';
    }

    if ($kwota == "") {
        $messages[] = 'Nie podano kwoty.';
    }

    if ($oprocentowanie == "") {
        $messages[] = 'Nie podano oprocentowania.';
    }

    if ($oprocentowanie == "0") {
        $messages[] = 'Oprocentowanie nie może wynosić 0%.';
    }

    if ($czas == "") {
        $messages[] = 'Nie podano czasu spłaty.';
    }

    if (empty($messages)) {

        if (!is_numeric($oprocentowanie)) {
            $messages[] = 'Oprocentowanie musi być wartością.';
        }
        if (!is_numeric($kwota)) {
            $messages[] = 'Kwota musi być wartością.';
        }
        if (!is_numeric($czas)) {
            $messages[] = 'Czas spłaty musi być wartością.';
        }

    }   

    if(empty($messages)) {
        $kwota = intval($kwota);
        $stopa = $oprocentowanie / 100 / 12;
        $stopaPotega = pow(( $stopa + 1) , $czas);
        $resultRata = $kwota * ($stopa) * $stopaPotega / (( $stopaPotega ) -1 );
        $resultRata = round($resultRata, 2);
    }
    
    include 'kredyt_view.php';

?>