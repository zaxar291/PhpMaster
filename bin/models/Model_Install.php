<?php

class Model_Install extends Model implements IFileLoader {

    private $dbService;
    public $settings;
    private $errorMessage;

    public function __construct($settings) {
        $this->settings = $settings;

        $this->LoadFiles();
    }

    public function InstallDatabases($settings) {
        $this->dbService = new DbService($settings);
        $this->dbService->CreateConnection();
        if($this->dbService->GetErrorMessage() == "") {
            $this->dbService->Insert("CREATE TABLE `users` (`id` int(11) NOT NULL,`fio` varchar(255) NOT NULL,`email` varchar(255) NOT NULL,`adress` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            $this->dbService->Insert("ALTER TABLE `users` ADD PRIMARY KEY (`id`)");
            $this->dbService->Insert("ALTER TABLE `users`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3; COMMIT;");
            return true;
        }else{
            $this->errorMessage = $this->dbService->GetErrorMessage();
            return false;
        }
    }

    public function ErrorMessage() {
        return $this->errorMessage;
    }

    public function LoadFiles()
    {
        require_once $this->settings->AppSettings->defaultAbstractionDir . "IDbService.php";
        require_once $this->settings->AppSettings->defaultServicesDir . "DbService.php";
    }



}