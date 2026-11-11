<?php

use App\Models\User;

function dump(...$vars)
{
    echo '<pre>';
    var_dump(...$vars);
    echo '</pre>';
}

function dd(...$vars) {
    dump(...$vars);
    die;
}

function view($viewName, $variables=[]){
    extract($variables);
    include __DIR__ . "/views/$viewName.php";
}

function redirect($to) {
    header("Location: $to");
}

function auth() {
    $userID = $_SESSION['userID'] ?? false;
    if($userID) {
        return User::find($userID);
    }
    return false;
}
