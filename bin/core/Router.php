<?php

class Router {

    private $defaultControllerName;
    private $defaultModelName;
    private $defaultMethod;

    private $defaultAppPath;

    private $settings;

    public function __construct($settings) {
        $this->defaultControllerName = "Auth";
        $this->defaultModelName = "Auth";
        $this->defaultMethod = "GenerateMethod";

        $this->settings = $settings;

        $this->defaultAppPath = "bin/";
    }

    public function route($routerSettings)
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if ( !empty($routes[$routerSettings->controllerIndex]) )
        {
            $this->defaultControllerName = ucfirst($routes[$routerSettings->controllerIndex]);
        }

        if( !empty($routes[$routerSettings->methodIndex]) ) {
            if(preg_match("/\?/", $routes[$routerSettings->methodIndex], $out)) {
                $this->defaultMethod = ucfirst(explode("?", $routes[$routerSettings->methodIndex])[0]) . "Method";
            }else {
                $this->defaultMethod = ucfirst($routes[$routerSettings->methodIndex]) . "Method";
            }
        }

        $this->defaultModelName = 'Model_' . $this->defaultControllerName;
        $this->defaultControllerName = 'Controller_' . $this->defaultControllerName;

        $model_path = $this->defaultAppPath . "models/" .$this->defaultModelName . '.php';
        if(file_exists($model_path))
        {
            require_once $model_path;
        }

        $controller_path = $this->defaultAppPath . "controllers/" .$this->defaultControllerName . '.php';

        if(file_exists($controller_path))
        {
            include $controller_path;
        }
        else
        {
            $this->AuthPage();
        }

        $controller = new $this->defaultControllerName($this->settings);
        $method = $this->defaultMethod;

        if(method_exists($controller, $method))
        {
            $controller->$method();
        }
        else
        {
            $this->AuthPage();
        }

    }

    public function AuthPage()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$this->settings->routerSettings->HTTP_HOST.'Auth');
    }

}