<?php

use App\Router;
use App\Controllers\PublicController;

Router::addRoute('/', [PublicController::class, 'index']);

Router::addRoute('/us', [PublicController::class, 'us']);

Router::addRoute('/tech', [PublicController::class, 'tech']);

Router::addRoute('/form', [PublicController::class, 'form'], 'GET');

Router::addRoute('/form', [PublicController::class, 'submitForm'], 'POST');