<?php

namespace Versonix\Interview\Main;

use Versonix\Interview\Helpers\UrlHelper;
use Versonix\Interview\Main\Traits\RouteTrait;

class Core {

    use RouteTrait;

    public function __construct()
    {

    }

    public function run(): void
    {
        $routes = Param::get('route');
        $url = UrlHelper::parseUrl($_SERVER['REQUEST_URI']);

        $routeFragments = $this->getRouteFragments($routes, $url);

        $routeParams = $this->getRouteParams($routeFragments);

        if($routeParams){

            $controller = $this->getControllerByParams($routeParams);

            $action = $routeParams[self::KEY_ACTION];
            if(method_exists($controller, $action)){
                $controller->$action();
            }
        }
    }
}