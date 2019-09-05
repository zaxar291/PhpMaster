<?php

class Model_User extends Model implements IFileLoader {
    private $dbService;
    private $settings;
    private $error;

    public function __construct($settings) {
        $this->settings = $settings;

        $this->LoadFiles();
        $this->dbService = new DbService($settings);
        $this->dbService->CreateConnection();
    }

    public function LoadData($email) {
        return $this->dbService->Get("SELECT `fio`, `email`, `adress` FROM `users` WHERE email='$email'");
    }

    public function LoadFiles()
    {
        require_once $this->settings->AppSettings->defaultAbstractionDir . "IDbService.php";
        require_once $this->settings->AppSettings->defaultServicesDir . "DbService.php";
    }
}