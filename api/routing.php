<?php

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

    //Auth
    $r->addRoute('POST', BASE.'/login', 'AuthController/login');
    $r->addRoute('POST', BASE.'/register', 'AuthController/register');

    //Categories
    $r->addRoute('GET', BASE.'/categories', 'CategoryController/getAll');

    //Placezs
    $r->addRoute('GET', BASE.'/places', 'PlaceController/getAll');

});

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);


$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:    
        http_response_code(404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        list($class, $method) = explode("/", $handler, 2);

        $r = new ReflectionClass($class);
        $obj = $r->newInstanceArgs(array($entityManager));

        call_user_func_array(array($obj, $method), $vars);
        break;
}