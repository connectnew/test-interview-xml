<?php

namespace Versonix\Interview\Main\Traits;

use Versonix\Interview\Main\Controller;

trait RouteTrait {

    const INDEX_MODULE = 0;
    const INDEX_CONTROLLER = 1;
    const INDEX_ACTION = 2;

    const KEY_MODULE = 'module';
    const KEY_CONTROLLER = 'controller';
    const KEY_ACTION = 'action';


    const POSTFIX_MODULE = 'Module';
    const POSTFIX_CONTROLLER = 'Controller';

    const MODULE_NAMESPACE = 'Versonix\Interview\Modules';
    const CLASS_FOLDER = 'Controllers';

    private function getRouteParams(array $routeFragments): array
    {
        $routeParams = [];

        if(count($routeFragments) > 2){
            $routeParams[self::KEY_MODULE] = ucfirst($routeFragments[self::INDEX_MODULE]) .  self::POSTFIX_MODULE;
            $routeParams[self::KEY_CONTROLLER] = ucfirst($routeFragments[self::INDEX_CONTROLLER]) . self::POSTFIX_CONTROLLER;
            $routeParams[self::KEY_ACTION] = $routeFragments[self::INDEX_ACTION];
        }

        return $routeParams;
    }

    private function getRouteFragments(array $routes, string $url)
    {
        if(isset($routes[$url])){
            $route = $routes[$url];
            $routeFragments = explode("/", $route['path']);
        } else {
            $routeFragments = explode("/", $url);
        }

        return $routeFragments;
    }

    private function getControllerByParams(array $routeParams): Controller
    {
        $class = self::MODULE_NAMESPACE . "\\{$routeParams[self::KEY_MODULE]}\\" .
            self::CLASS_FOLDER . "\\{$routeParams[self::KEY_CONTROLLER]}";

        if(!class_exists($class)){
            throw new Exception("Error: Not found this controller {$class}");
        }

        return new $class;
    }
}