<?php

$datas = [
    [ 'first_name' => 'Harry', 'last_name' => 'Potter', 'birthday' => '1980-08-31' ],
    [ 'first_name' => 'Ron', 'last_name' => 'Weasley', 'birthday' => '1980-03-01' ],
    [ 'first_name' => 'Hermione', 'last_name' => 'Granger', 'birthday' => '1979-09-19' ]
];

function first_conversion($datas)
{
    $id = 0;
    foreach ($datas as $data) {
        $id++;
        yield array_merge(['id' => $id], $data);
    }
}

function second_conversion($datas)
{
    foreach ($datas as $data) {
        $data['last_name'] = strtoupper($data['last_name']);
        yield $data;
    }
}

$toConverted = first_conversion(
    second_conversion($datas)
);

foreach ($toConverted as $convertedData) {
    print_r($convertedData);
}
