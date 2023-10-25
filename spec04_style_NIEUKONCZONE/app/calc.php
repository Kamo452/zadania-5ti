<?php 

    require_once dirname(__FILE__).'/../config.php';

    include _ROOT_PATH.'/app/security/check.php';

    function odebranieParam(&$kwota,&$oprocentowanie,&$czas){
        $kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
        $oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
        $czas = isset($_REQUEST['czas']) ? $_REQUEST['czas'] : null;
    }

    function validate(&$kwota,&$oprocentowanie,&$czas,&$messages) {


        if (!(isset($kwota) && isset($oprocentowanie) && isset($czas))) {
			return false;
        }

        if ($kwota == "") {
            $messages[] = 'Nie podano kwoty.';
        }

        if ($oprocentowanie == "") {
            $messages[] = 'Nie podano oprocentowania.';
        }

        if ($czas == "") {
            $messages[] = 'Nie podano czasu spłaty.';
        }

        if (count ( $messages ) != 0) return false;

		if ($oprocentowanie == "0") {
            $messages[] = 'Oprocentowanie nie może wynosić 0%.';
        }

        if (!is_numeric($oprocentowanie)) {
            $messages[] = 'Oprocentowanie musi być wartością.';
        }
        if (!is_numeric($kwota)) {
            $messages[] = 'Kwota musi być wartością.';
        }
        if (!is_numeric($czas)) {
            $messages[] = 'Czas spłaty musi być wartością.';
        }

        if (count ( $messages ) != 0) return false;
        else return true;
    }
    
    function process(&$kwota,&$oprocentowanie,&$czas,&$messages,&$resultRata){
        global $role;

        if ($kwota > 100000 && $role == "user" ) {
            $messages[] = "Maksymalna kwota kredytu dla roli 'user' wynosi 100 000 zł.";
        } 
        if ($oprocentowanie < 5 && $role == "user" ) {
            $messages[] = "Minimalne oprocentowanie dla roli 'user' wynosi 5%.";
        } 
        if ( count ($messages) == 0 ) {
            $kwota = intval($kwota);
            $stopa = $oprocentowanie / 100 / 12;
            $stopaPotega = pow(( $stopa + 1) , $czas);
            $resultRata = $kwota * ($stopa) * $stopaPotega / (( $stopaPotega ) -1 );
            $resultRata = round($resultRata, 2);
        }
    }

    $page_title = "Kalkulator | Kalkulator Kredytowy";
    $page_header = "Kalkulator";
    $page_footer = "Autor: Kamil Bujara 5TI";
    $page_description = "Kalkulator do obliczania rat kredytu.";
	$kwota = null;
	$oprocentowanie = null;
	$czas = null;
	$resultRata = null;
	$messages = array();

    odebranieParam($kwota,$oprocentowanie,$czas);
	if ( validate($kwota,$oprocentowanie,$czas,$messages) ) {
		process($kwota,$oprocentowanie,$czas,$messages,$resultRata);
	}
    include 'calc_view.php';

?>