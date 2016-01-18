<?php

namespace Fferriere\GeneratorExample\Controller;

use Fferriere\GeneratorExample\Model\Person;
use Fferriere\GeneratorExample\Repository\PersonRepository;
use Fferriere\GeneratorExample\Service\Exporter\CsvExporter;

use Fferriere\GeneratorExample\Exception\Exception;
use Fferriere\GeneratorExample\Exception\FileException;

class Controller {

    private $services;

    public function __construct()
    {
        $this->services = [];
    }

    protected function hasService($name)
    {
        return array_key_exists($name, $this->services);
    }

    protected function get($name)
    {
        if (!$this->hasService($name)) {
            $service = $this->createService($name);
            if (!$service) {
                throw new Exception(sprintf('The service "%s" does not exists !', $name));
            }
            $this->services[$name] = $service;
        }
        return $this->services[$name];
    }

    protected function createService($name)
    {
        switch($name) {
            case 'repository.person':
                return $this->createPersonRepository();
            case 'csv_exporter':
                return $this->createCsvExporter();
        }
        return null;
    }

    private function createPersonRepository()
    {
        $persons = [
            new Person('Harry', 'Potter', new \DateTime('1980-08-31')),
            new Person('Ron', 'Weasley', new \DateTime('1980-03-01')),
            new Person('Hermione', 'Granger', new \DateTime('1979-09-19')),
            new Person('Severus', 'Rogue', new \DateTime('1960-01-09')),
            new Person('Lily', 'Evans', new \DateTime('1960-01-30')),
            new Person('James', 'Potter', new \DateTime('1960-03-27')),
            new Person('Ginny', 'Weasley', new \DateTime('1981-08-11')),
            new Person('Minerva', 'McGonagall', new \DateTime('1935-10-04')),
            new Person('Molly', 'Weasley', new \DateTime('1949-10-30')),
            new Person('Sirius', 'Black', new \DateTime('1959-11-03')),
            new Person('Rubeus', 'Hagrid', new \Datetime('1928-12-06'))
        ];

        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);
        $persons = array_merge($persons, $persons);

        return new PersonRepository($persons);
    }

    private function createCsvExporter()
    {
        if (!defined('APP_PATH')) {
            throw new Exception('The constant APP_PATH is not defined !');
        }

        $dirpath = APP_PATH . '/exports';
        if (!is_dir($dirpath)) {
            if (!mkdir($dirpath, 0777, true)) {
                throw new FileException(sprintf('The directory "%s" can\'t be created !', $dirpath));
            }
        }
        $filename = $dirpath . '/Persons_' . date('Ymd-His') . '.csv';
        return new CsvExporter($filename);
    }

}
