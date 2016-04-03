<?php
use FastRoute\Dispatcher;
use League\Container\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once '/../vendor/autoload.php';

/**
* 
*/
class App 
{
    
    function __construct()
    {
      


/**
 * Error handler
 */
$whoops = new \Whoops\Run;

    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

$whoops->register();


/**
 * Container setup
 */
$container = new Container();
$container->add('noble\Controllers');
$container->add('View');

/**
 * Routes
 */
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {

 $routes = require '/../routes.php';
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], ['noble\Controllers\\'.$route[2][0], $route[2][1]]);
    }
});


/**
 * Dispatch
 */
$request = Request::createFromGlobals();
$route_info = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
switch ($route_info[0]) {
    case Dispatcher::NOT_FOUND:
        Response::create("404 not found", Response::HTTP_NOT_FOUND)->send();
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        Response::create("405 Method Not Allowed", Response::HTTP_METHOD_NOT_ALLOWED)->send();
        break;
    case Dispatcher::FOUND:
        $class_name = $route_info[1][0];
        $method = $route_info[1][1];
        $vars = $route_info[2];
        $object = $container->get($class_name);

        $response = $object->$method($vars);
        if ($response instanceof Response) {
            $response->prepare(Request::createFromGlobals());
            $response->send();
        }
        break;
    }
}
}