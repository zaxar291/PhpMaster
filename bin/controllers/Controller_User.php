<?php

class Controller_User extends Controller {
    private $settings;

    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->model = new Model_User($settings);
        $this->view = new View();
    }

    public function AjaxMethod($data = null) {
        $data = $this->model->LoadData((isset($_GET["email"])) ? $_GET["email"] : null);
        $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'user_ajax_view.php',  $this->settings, $data);
    }
}