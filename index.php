<?php
$numbers = array(1,2,3);
$numbers = [1, 2, 3];
var_dump($numbers[1]);
$numbers[2] = 5;
var_dump($numbers);
$test = [1, 'test', true, [1, 2, 3]];
var_dump($test);
var_dump($test[3][1]);
$test = [
    'name' => 'Ruslan',
    'age' => 18,
    1,
    2,
    3,
    'color' => 'purple',
    'music' => 'rock',
];
var_dump($test);
var_dump($test['name']);