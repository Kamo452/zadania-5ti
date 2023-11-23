<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';




    function odebranieParam(&$form){
		$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;	
		$form['oprocentowanie'] = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;	
		$form['czas'] = isset($_REQUEST['czas']) ? $_REQUEST['czas'] : null;
    }

    function validate(&$form,&$infos,&$messages,&$hide_intro) {

		if ( ! (isset($form['kwota']) && isset($form['oprocentowanie']) && isset($form['czas']) ))	return false;	

		$hide_intro = true;

		
		$infos [] = 'Przekazano parametry.';


        if ($form['kwota'] == "") {
            $messages[] = 'Nie podano kwoty.';
        }

        if ($form['oprocentowanie']  == "") {
            $messages[] = 'Nie podano oprocentowania.';
        }

        if ($form['czas']  == "") {
            $messages[] = 'Nie podano czasu spłaty.';
        }

        if (count ( $messages ) != 0) return false;

		if ($form['oprocentowanie']  == "0") {
            $messages[] = 'Oprocentowanie nie może wynosić 0%.';
        }

        if (!is_numeric($form['oprocentowanie'])) {
            $messages[] = 'Oprocentowanie musi być wartością.';
        }
        if (!is_numeric($form['kwota'])) {
            $messages[] = 'Kwota musi być wartością.';
        }
        if (!is_numeric($form['czas'])) {
            $messages[] = 'Czas spłaty musi być wartością.';
        }

        if (count ( $messages ) != 0) return false;
        else return true;
    }
    
    function process(&$form,&$infos,&$messages,&$result) {

		$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
        $kwota = intval($form['kwota']);
		$oprocentowanie = $form['oprocentowanie'];
		$czas = $form['czas'];
        $stopa = $oprocentowanie / 100 / 12;
        $stopaPotega = pow(( $stopa + 1) , $czas);
        $result = $kwota * ($stopa) * $stopaPotega / (( $stopaPotega ) -1 );
        $result = round($result, 2);
		
    }

	$result = null;
	$form = null;
	$messages = array();
	$infos = array();

    odebranieParam($form);
	if ( validate($form,$infos,$messages,$hide_intro) ){
		process($form,$infos,$messages,$result);
	}



$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator | Kalkulator Kredytowy');
$smarty->assign('page_description','Kalkulator do obliczania rat kredytu');
$smarty->assign('page_header','Kalkulator');

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

$smarty->display(_ROOT_PATH.'/app/calc.html');