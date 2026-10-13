<?php

function dump(...$vars)
{
    echo '<pre>';
    var_dump(...$vars);
    echo '</pre>';
}

function view(string $name, array $data = [])
{
    extract($data);
    require __DIR__ . '/views/' . $name . '.php';
}