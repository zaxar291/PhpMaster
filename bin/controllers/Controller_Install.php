<?php

class Controller_Install extends Controller {

    private $settings;

    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->model = new Model_Install($settings);
        $this->view = new View();
    }
    public function GenerateMethod()
    {
        $this->view->GenerateContent($this->settings->AppSettings->defaultViewsDir . 'install_view.php', $this->settings->AppSettings->defaultViewsDir . 'default_template.php', $this->settings);
    }

    public function AjaxMethod($data = null) {
        if(isset($_GET)) {
            if(isset($_GET["data"])) {
                require_once "bin/Services/AppStorageService.php";
                $appStorageService = new AppStorageService("bin/AppSettings/app.settings.json");
                $data = json_decode($_GET["data"]);
                $this->settings->dbSettings->db_host = $data->host;
                $this->settings->dbSettings->db_name = $data->dbName;
                $this->settings->dbSettings->db_user = $data->uName;
                $this->settings->dbSettings->db_pass = $data->pass;
                $appStorageService->UpdateData($this->settings);
                if($this->model->InstallDatabases($this->settings)) {
                    $data = json_encode(array("is_success" => true));
                }else {
                    $data = json_encode(array("is_success" => false, "message" => $this->model->ErrorMessage()));
                }
                $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'install_ajax_view.php',  $this->settings, $data);
            }else{
                $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'auth_ajax_view.php',  $this->settings, $data = "Data error");
            }
        }else {
            $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'auth_ajax_view.php',  $this->settings, $data);
        }
    }

}