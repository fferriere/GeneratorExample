<?php

$startMicrotime = microtime(true);

include __DIR__ . '/vendor/autoload.php';

define('APP_PATH', __DIR__ . '/app');
if (!is_dir(APP_PATH)) {
    if (!mkdir(APP_PATH, 0777, true)) {
        throw new Exception(sprintf('Directory "%s" can not be created !', APP_PATH));
    }
}

use Fferriere\GeneratorExample\Controller\PersonController;

$array = (count($argv) > 1 && $argv[1] == 'array');

$controller = new PersonController();
$nbPersons = count($controller->getPersonRepository()->findAll());
$startPeak = memory_get_peak_usage();
echo 'Number of persons : ' . $nbPersons . PHP_EOL;
echo 'Memory peak after data loading : ' . $startPeak . ' B' . PHP_EOL;
if ($array) {
    $controller->exportArrayAction();
} else {
    $controller->exportGeneratorAction();
}
$endPeak = memory_get_peak_usage();
echo 'Memory peak after export : ' . $endPeak . ' B' . PHP_EOL;
echo 'Memory used by export : ' . ($endPeak - $startPeak) . ' B' . PHP_EOL;

$endMicrotime = microtime(true);
echo 'Time : ' . ($endMicrotime - $startMicrotime) . ' ms' . PHP_EOL;
