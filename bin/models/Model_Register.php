<?php

class Model_Register extends Model implements IFileLoader {

    private $dbService;
    private $settings;
    private $error;

    public function __construct($settings) {
        $this->settings = $settings;

        $this->LoadFiles();
        $this->dbService = new DbService($settings);
        $this->dbService->CreateConnection();
    }

    public function RegisterUser($data, $adress) {
        if($this->dbService->Insert("INSERT INTO `users`(`fio`, `email`, `adress`) VALUES ('".$data->fio."','".$data->email."', '$adress')")) {
            return true;
        }else {
            $this->error = $this->dbService->GetErrorMessage();
            return false;
        }
    }

    public function GetErrorMessage() {
        return $this->error;
    }

    public function IsRegistered($email){
        $data = $this->dbService->Get("SELECT id FROM users WHERE email='$email'");
        if(!$data) {
            return false;
        }
        return true;
    }

    public function GetRegion($regionId) {
        $data = $this->dbService->Get("SELECT * FROM t_koatuu_tree WHERE reg_id='$regionId' AND ter_level='1'");
        if(!$data) {
            return false;
        }
        return $data[0]["ter_name"];
    }

    public function LoadFiles()
    {
        require_once $this->settings->AppSettings->defaultAbstractionDir . "IDbService.php";
        require_once $this->settings->AppSettings->defaultServicesDir . "DbService.php";
    }

}