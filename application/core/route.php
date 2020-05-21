<?php


class Route
{
    static function start()
    {

        $controller_name = 'Towns';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);


        if (!empty($routes[1])) {
            $controller_name = ucfirst($routes[1]);

            if($routes[1]=='towns') {
                $vartown=strtolower($routes[2]);
                if(!empty($routes[3])) {
                    $vartown=strtolower($routes[2]);
                    $action_name = ucfirst($routes[3]).'Town';
                }
                else {
                    if (!empty($routes[2])) {
                        $action_name = 'Town';
                    }
                }
            }
            elseif($routes[1]=='admin') {
                if(!empty($routes[3])) {
                    $vartown=strtolower($routes[2]);
                    $action_name = ucfirst($routes[3]).'Admin';
                }
                else {
                    if (!empty($routes[2])) {
                        $vartown=strtolower($routes[2]);
                        $action_name = 'Admin';
                    } else {
                        $action_name = 'index';
                    }
                }
            } 
            else {
                if (!empty($routes[2])) {
                        $action_name = ucfirst($routes[2]);
                }
            }
        }

        $model_name = 'Model' . $controller_name;
        $controller_name = 'Controller' . $controller_name;
        $action_name = 'action_' . $action_name;



        $model_file = $model_name. '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }


        $controller_file = $controller_name. '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "application/controllers/" . $controller_file;
        } else {

            Route::ErrorPage404();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            if(($routes[1]=='towns' or $routes[1]=='admin') and isset($routes[2])) {
                $controller->$action($vartown);
            } else {
                $controller->$action();
            } 
        } else {
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
