<?php

$values = [
    [ 'first_name' => 'Harry', 'last_name' => 'Potter', 'birthday' => '1980-08-31' ],
    [ 'first_name' => 'Ron', 'last_name' => 'Weasley', 'birthday' => '1980-03-01' ],
    [ 'first_name' => 'Hermione', 'last_name' => 'Granger', 'birthday' => '1979-09-19' ]
];

function first_conversion($values)
{
    $id = 0;
    foreach ($values as $value) {
        $id++;
        yield array_merge(['id' => $id], $value);
    }
}

function second_conversion($values)
{
    foreach ($values as $value) {
        $value['last_name'] = strtoupper($value['last_name']);
        yield $value;
    }
}

$toConverted = first_conversion(
    second_conversion($values)
);

foreach ($toConverted as $convertedData) {
    print_r($convertedData);
}
