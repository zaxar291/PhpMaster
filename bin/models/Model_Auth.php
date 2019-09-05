<?php

class Model_Auth extends Model implements IFileLoader {

    private $dbService;
    private $settings;

    public function __construct($settings) {
        $this->settings = $settings;

        $this->LoadFiles();
        $this->dbService = new DbService($settings);
        $this->dbService->CreateConnection();
    }


    public function LoadRegions() {
        return $this->dbService->Get("SELECT ter_name, reg_id FROM `t_koatuu_tree` WHERE ter_level = '1'");
    }

    public function LoadRegionIncludes($regionId) {
        return $this->dbService->Get("SELECT ter_address, ter_name FROM `t_koatuu_tree` WHERE reg_id = '$regionId' AND ter_name NOT LIKE '%район%' AND ter_name NOT LIKE '%область%'");
    }

    public function LoadAreas($regionId) {
        return $this->dbService->Get("SELECT ter_address, ter_name FROM `t_koatuu_tree` WHERE reg_id = '$regionId' AND ter_name LIKE '%район%'");
    }

    public function LoadFiles()
    {
        require_once $this->settings->AppSettings->defaultAbstractionDir . "IDbService.php";
        require_once $this->settings->AppSettings->defaultServicesDir . "DbService.php";
    }

}