<?php

namespace Fferriere\GeneratorExample\Model;

class Person {

    /**
    * @var string
    */
    private $firstName;

    /**
    * @var string
    */
    private $lastName;

    /**
    * @var \DateTime
    */
    private $birthday;

    public function __construct($lastName, $firstName, \DateTime $birthday)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->birthday = $birthday;
    }

    /**
    * @return string
    */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
    * @return string
    */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
    * @return \DateTime
    */
    public function getBirthday()
    {
        return $this->birthday;
    }

}
