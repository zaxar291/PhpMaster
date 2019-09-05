<?php

class Controller_Users extends Controller {
    private $settings;

    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->model = new Model_Users($settings);
        $this->view = new View();
    }

    public function AjaxMethod($data = null) {
        $data = $this->model->LoadData();
        $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'users_ajax_view.php',  $this->settings, $data);
    }
}