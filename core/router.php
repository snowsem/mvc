<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 12:19
 */

use App\Core;

class Router
{
    static $controller = "Main";
    static $action = "index";

    static function run()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $url_segments = explode('/', $url);

        $scheme = ['controller', 'action', 'params'];
        $route = [];

        foreach ($url_segments as $index => $segment){
            if ($scheme[$index] == 'params'){
                $route['params'] = array_slice($url_segments, $index);
                break;
            } else {
                $route[$scheme[$index]] = $segment;
            }
        }





        if (!empty($route['controller']))
        {
            self::$controller = $route['controller'];
        }
        if (!empty($route['action']))
        {
            self::$action = $route['action'];
        }

        self::$controller = self::$controller . 'Controller';

        $file_controller = strtolower(self::$controller) . '.php';
        $file_controller_path = "app/controller/" . $file_controller;

        if (file_exists($file_controller_path))
        {
            include $file_controller_path;
        }
        else
        {
            Core::error_load_controller($file_controller);

        }
        $controllerName = self::$controller;
        $controller = new $controllerName;
        $action = self::$action;
        if (method_exists($controller, $action))
        {
            \App\Request::$route = $route;
            \App\Request::$params = (!empty($route['params'])) ? $route['params'] : NULL;


            call_user_func(array($controller, $action));
        }
        else
        {
            //Здесь тоже нужно добавить обработку ошибок
        }
    }
}