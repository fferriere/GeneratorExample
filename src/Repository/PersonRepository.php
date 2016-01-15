<?php

namespace Fferriere\GeneratorExample\Repository;

use Fferriere\GeneratorExample\Model\Person;

class PersonRepository
{

    private $persons;

    public function __construct(array $persons)
    {
        $this->persons = $persons;
    }

    public function findAll()
    {
        return $this->persons;
    }

    public function findAllAsArray()
    {
        $persons = $this->findAll();

        if (empty($persons)) {
            return;
        }

        foreach ($persons as $person) {
            yield $this->convertPersonAsArray($person);
        }
    }

    protected function convertPersonAsArray(Person $person)
    {
        return [
            $person->getLastName(),
            $person->getFirstName(),
            $person->getBirthday()->format('Y-m-d')
        ];
    }

}
