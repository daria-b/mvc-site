<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        //echo "$routesPath";
        $this->routes = include($routesPath);
        //print_r($this->routes);
    }

    //Returns request string
    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/'); //удалает в начале и в конце символ '/'
        }
    }

    public function run()
    {
        // Получить строку запроса
        $uri = $this->getURI();
        //echo "$uri";

        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //echo "<br>$uriPattern -> $path";
            //echo "$path";

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", "$uri")) {
                //echo "<br> $path <br>";

               // echo '<br>Где ищем (запрос, который набрал пользователь): '.$uri;
                //echo '<br>Что ищем (совпадение из правила): '.$uriPattern;
               // echo '<br>Кто обрабатывает: '.$path;

                // Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                //echo "$internalRoute";

                //echo '<br><br>Нужно сформировать: '.$internalRoute;

                //Определить контроллер, action, параметры(Определить какой контроллер и action обрабатывают запрос)




                $segments = explode('/', $internalRoute);
                array_shift($segments);
                array_shift($segments);
                //print_r($segments);

                $controllerName = array_shift($segments).'Controller'; //array_shift возращает 1й елемент массива и удаляет его
                $controllerName = ucfirst($controllerName);


                $actionName = 'action'. ucfirst(array_shift($segments));

                $parameters = $segments;

                // Подключить файл класса-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                // Создать обьект, вызвать метод (т. е. action)
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                //$result = $controllerObject->$actionName($parameters);

                if ($result != null){
                    break;
                }

            }
        }






    }

}