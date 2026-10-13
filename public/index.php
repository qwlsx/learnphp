<?php



if (preg_match('/\.(?:png|jpg|jpeg|gif|js|css)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
}


spl_autoload_register(function ($class) {
    $class = substr($class, 4);
    $class = str_replace('\\', '/', $class);
    require_once __DIR__ . "/../src/$class.php";
});

use App\Router;

require_once __DIR__ . '/../helpers.php';
require __DIR__ . '/../routes.php';

$router = new Router($_SERVER['REQUEST_URI']);
$match = $router->match();
if($match) {
    if(is_callable($match['action'])) {
        call_user_func($match['action']);
    } else if (is_array($match['action'])){
        $class = $match['action'][0];
        $controller = new $class();
        $method = $match['action'][1];
        $controller->$method();
    }
} else {
    echo 404;
}