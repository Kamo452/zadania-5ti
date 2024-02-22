<?php

require_once $conf->root_path.'/app/calc_form.class.php';
require_once $conf->root_path.'/app/calc_result.class.php';
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/app/calc_errorlist.class.php';

class calc_validate {

    private $form;
	private $errorlist;
	private $result;

	public function __construct() {

		$this->form = new calc_form();
		$this->result = new calc_result();
		$this->errorlist = new errorlist();

	}

	public function daneZFormularza() {

		$this->form->kwota = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota']:null;
		$this->form->oprocentowanie = isset($_REQUEST ['oprocentowanie']) ? $_REQUEST ['oprocentowanie']:null;
		$this->form->czas = isset($_REQUEST ['czas']) ? $_REQUEST ['czas']:null;

	}
    
	public function waliduj() {

		if (! (isset ( $this->form->kwota ) && isset ( $this->form->oprocentowanie ) && isset ( $this->form->czas ))) {
			return false; 
		}
		
		if ($this->form->kwota == "") {
			$this->errorlist->addError('Nie podano kwoty.');
		}

		if ($this->form->oprocentowanie == "") {
			$this->errorlist->addError('Nie podano oprocentowania.');
		}

        if ($this->form->czas == "") {
			$this->errorlist->addError('Nie podano czasu spłaty.');
		}
		
		if (! $this->errorlist->isError()) {
			
			if (!is_numeric ( $this->form->kwota )) {
				$this->errorlist->addError('Kwota musi być wartością.');
			}
			
			if (!is_numeric ( $this->form->oprocentowanie )) {
				$this->errorlist->addError('Oprocentowanie musi być wartością.');
			}

			if ($this->form->oprocentowanie == 0) {
				$this->errorlist->addError('Oprocentowanie nie może być równe 0.');
			}

			if (!is_numeric ( $this->form->czas )) {
				$this->errorlist->addError('Czas spłaty musi być wartością.');
			}
			
		}
		
		return !$this->errorlist->isError();

	}


	public function process() {

		$this->daneZFormularza();
		
		if ($this->waliduj()) {

            $kwota = intval($this->form->kwota);
            $oprocentowanie = $this->form->oprocentowanie;
            $czas = $this->form->czas;
            $stopa = ($this->form->oprocentowanie) / 100 / 12;
            $stopaPotega = pow(( $stopa + 1) , $czas);
            $result = $kwota * ($stopa) * $stopaPotega / (( $stopaPotega ) -1 );
			$this->result->result = round($result, 2);
		}
		
		$this->generujWidok();
	}

	public function generujWidok() {

		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator | Kalkulator Kredytowy');
		$smarty->assign('page_description','Kalkulator do obliczania rat kredytu');
		$smarty->assign('page_header','Kalkulator');
				
		$smarty->assign('errorlist',$this->errorlist);
		$smarty->assign('form',$this->form);
		$smarty->assign('result',$this->result);
		
		$smarty->display($conf->root_path.'/app/credit_calc_view.html');

	}

}