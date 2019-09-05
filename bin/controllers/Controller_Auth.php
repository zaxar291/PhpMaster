<?php

class Controller_Auth extends Controller {

    private $settings;

    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->model = new Model_Auth($settings);
        $this->view = new View();
    }
    public function GenerateMethod()
    {
        $this->view->GenerateContent($this->settings->AppSettings->defaultViewsDir . 'auth_view.php', $this->settings->AppSettings->defaultViewsDir . 'default_template.php', $this->settings);
    }

    public function AjaxMethod($data = null) {
        if(isset($_GET)) {
            if(isset($_GET["action"])) {
                switch ($_GET["action"]) {
                    case "regions": $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'auth_ajax_loader_view.php',  $this->settings, $this->model->LoadRegions());
                        break;
                    case "towns": $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'auth_ajax_loader_view.php',  $this->settings, $this->model->LoadRegionIncludes((isset($_GET["region"]) ? $_GET["region"] : null)));
                        break;
                    case "areas": $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'auth_ajax_loader_view.php',  $this->settings, $this->model->LoadAreas((isset($_GET["region"]) ? $_GET["region"] : null)));
                }
            }else{
                $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'auth_ajax_view.php',  $this->settings, $data);
            }
        }else {
            $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'auth_ajax_view.php',  $this->settings, $data);
        }

    }
}