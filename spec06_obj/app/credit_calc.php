<?php

require_once dirname(__FILE__). '/../config.php';
require_once $conf->root_path.'/app/calc_validate.class.php';

$walidacja = new calc_validate();

$walidacja -> process();

?>