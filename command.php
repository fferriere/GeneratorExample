<?php

include __DIR__ . '/vendor/autoload.php';

define('APP_PATH', __DIR__ . '/app');
if (!is_dir(APP_PATH)) {
    if (!mkdir(APP_PATH, 0777, true)) {
        throw new Exception(sprintf('Directory "%s" can not be created !', APP_PATH));
    }
}

use Fferriere\GeneratorExample\Controller\PersonController;

$controller = new PersonController();
$controller->exportAction();
