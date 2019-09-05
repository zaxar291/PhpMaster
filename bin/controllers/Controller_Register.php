<?php

class Controller_Register extends Controller {
    private $settings;

    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->model = new Model_Register($settings);
        $this->view = new View();
    }
    public function GenerateMethod()
    {
        $this->view->GenerateContent($this->settings->AppSettings->defaultViewsDir . 'auth_view.php', $this->settings->AppSettings->defaultViewsDir . 'default_template.php', $this->settings);
    }

    public function AjaxMethod($data = null) {
        if(isset($_GET["data"])) {
            $d = json_decode($_GET["data"]);
            if($this->Validate($d)) {
                if($this->model->IsRegistered($d->email)) {
                    $data = array("is_success" => false, "message_type" => "user_registered", "userEmail" => $d->email, "message" => "User with address " . $d->email . " already registered, loading data about this user...");
                }else {
                    if($this->model->RegisterUser($d, $this->CreateAdress($d))) {
                        $data = array("is_success" => true, "message" => "You was successfully registered!");
                    }else {
                        $data = array("is_success" => false, "message" => $this->model->GetErrorMessage());
                    }
                }

            }else {
                $data = array("is_success" => false, "message" => "Cannot validate your data, check the fields!");
            }
        }
        $this->view->GenerateAjaxContent($this->settings->AppSettings->defaultViewsDir . 'register_ajax_view.php',  $this->settings, $data);
    }

    private function Validate($data) {
        if(empty($data)) {
            return false;
        }

        if(empty($data->fio)) {
            return false;
        }

        if(empty($data->email)) {
            return false;
        }

        if(empty($data->region)) {
            return false;
        }

        if(empty($data->town)) {
            return false;
        }

        if(empty($data->area)) {
            return false;
        }

        return true;
    }

    private function CreateAdress($data) {
        return $data->town . ", " . $data->area . ", " . $this->model->GetRegion($data->region);
    }
}