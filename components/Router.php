<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/'); //удалает в начале и в конце символ '/'
        }
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", "$uri")) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);
                //array_shift($segments);
                //array_shift($segments);

                $controllerName = array_shift($segments).'Controller'; //array_shift возращает 1й елемент массива и удаляет его
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'. ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null){
                    break;
                }

            }
        }
    }

}