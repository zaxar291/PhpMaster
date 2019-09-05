<?php

class Core {

    private $settings;
    private $appSettings;
    private $routerSettings;

    private $configFile;

    private $appStorageService;

    public function __construct() {
        $this->configFile = "bin/AppSettings/app.settings.json";
        $this->LoadAppStorageService();
    }

    public function run() {
        $this->IncludeFiles();
        if($this->RouterNeedInitialization()) {
            $this->InitializeRouter();
        }
        if(class_exists("Router")) {
            if(method_exists("Router", "route")) {
                $router = new Router($this->settings);
                $router->route($this->routerSettings);
            }else{
                die("Error during router initialisation detected, check your settings");
            }
        }else{
            die("Error during router initialisation detected, check your settings");
        }
    }

    private function IncludeFiles() {
        require_once $this->appSettings->defaultCoreDir . "Model.php";
        require_once $this->appSettings->defaultCoreDir . "Controller.php";
        require_once $this->appSettings->defaultCoreDir . "View.php";
        require_once $this->appSettings->defaultCoreDir . "Router.php";
    }

    private function LoadAppStorageService() {
        require_once "bin/Abstraction/IStorageService.php";
        require_once "bin/Abstraction/IFileLoader.php";
        require_once "bin/Services/AppStorageService.php";

        $this->appStorageService = new AppStorageService($this->configFile);

        $this->settings = $this->appStorageService->LoadData();

        if(!$this->settings) {
            die("Cannot load file " . $this->configFile);
        }

        $this->appSettings = $this->settings->AppSettings;
        $this->routerSettings = $this->settings->routerSettings;
    }

    private function RouterNeedInitialization() {
        return !$this->settings->routerSettings->IsInstalled;
    }

   private function InitializeRouter() {
        $controllerIndex = $this->FindControllerIndex();
        $actionIndex = $controllerIndex + 1;
        $this->settings->routerSettings->HTTP_HOST = $this->CreateNewHttpHost($controllerIndex);
        $this->settings->routerSettings->controllerIndex = $controllerIndex;
        $this->settings->routerSettings->methodIndex = $actionIndex;
        $this->settings->routerSettings->IsInstalled = true;
        $this->appStorageService->UpdateData($this->settings);
        header("Location: " . $this->settings->routerSettings->HTTP_HOST . "install");
        exit();
   }

   private function FindControllerIndex() {
       $routes = explode('/', $_SERVER['REQUEST_URI']);
       foreach ($routes as $key => $value) {
           if($value !== "") {
               foreach ($this->settings->routerSettings->routes as $k => $v) {
                   if($value == $v) {
                       return $key;
                   }
               }
           }
       }
       return false;
   }

   private function CreateNewHttpHost($currentIndex) {
        $n =  $this->GetProtocol() . "://" . $_SERVER['SERVER_NAME'];
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        foreach ($routes as $key => $value) {
            if($key < $currentIndex) {
                $n .= $value . "/";
            }
        }
        return $n;
   }

   private function GetProtocol() {
       $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5)) == 'https' ? 'https' : 'http';
       if($_SERVER["SERVER_PORT"] == 443)
           $protocol = 'https';
       elseif (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1')))
           $protocol = 'https';
       elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')
           $protocol = 'https';

       return $protocol;
   }
}