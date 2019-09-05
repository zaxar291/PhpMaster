<?php

class Model_Users extends Model implements IFileLoader {
    private $dbService;
    private $settings;
    private $error;

    public function __construct($settings) {
        $this->settings = $settings;

        $this->LoadFiles();
        $this->dbService = new DbService($settings);
        $this->dbService->CreateConnection();
    }

    public function LoadData() {
        return $this->dbService->Get("SELECT `fio`, `email`, `adress` FROM `users` WHERE 1");
    }

    public function LoadFiles()
    {
        require_once $this->settings->AppSettings->defaultAbstractionDir . "IDbService.php";
        require_once $this->settings->AppSettings->defaultServicesDir . "DbService.php";
    }
}