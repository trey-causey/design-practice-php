<?php

class Bootstrap
{
    public function __construct()
    {
        //1.router
        $tokens = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));

        //2.dispatcher
        $controllerName = ucfirst($tokens[1]);
        if (file_exists(__DIR__ . '/../app/controllers/' . $controllerName . 'Controller.php'))
        {
            require_once(__DIR__ . '/../app/controllers/' . $controllerName . 'Controller.php');
            $controllerName = $controllerName . 'Controller';
            $controller = new $controllerName();

            if(isset($tokens[2]))
            {
                $actionName = $tokens[2] . 'Action';
                if(isset($tokens[3]))
                {
                    $controller->{$actionName}($tokens[3]);
                } else {
                    $controller->{$actionName}();
                }

            } else {
                //default action
                ;
                $controller->IndexAction();
            }
        } else {

            //called if root/folder does not exist
            require_once(__DIR__ . '/../app/controllers/Controller.php');
            $controllerName = 'Controller';
            $controller = new $controllerName;
            $controller->IndexAction();
        }
    }
}