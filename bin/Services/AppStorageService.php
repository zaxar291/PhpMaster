<?php

class AppStorageService implements IStorageService, IFileLoader {

    private $storageSalt;
    private $encryptorProvider;
    private $file;
    private $appDir;


    public function __construct($file) {
        $this->appDir = "bin/";
        $this->LoadFiles();

        if(!is_file($file)) {
            die("Cannot find file " . $file);
        }

        $this->file = $file;

        $this->storageSalt = "AAAFNSF-4564FSF-FSF4564-SFA45FF-FSDA456";

        $this->encryptorProvider = new EncryptorProvider();
    }

    public function LoadData()
    {
        if(is_file($this->file)) {
            $encryptedContent = json_decode(file_get_contents($this->file))->EncryptedData;
            $data = $this->encryptorProvider->decrypt($encryptedContent, $this->storageSalt);
            if(gettype($data) == "string") {
                return json_decode($data);
            }
        }
        return false;
    }

    public function UpdateData($data)
    {
        if(is_file($this->file)) {
            $encryptedData = $this->encryptorProvider->encrypt(json_encode($data), $this->storageSalt);
            return file_put_contents($this->file, json_encode(array("EncryptedData" => $encryptedData)));
        }
    }

    public function LoadFiles()
    {
        require_once $this->appDir . "Services/EncryptorProvider.php";
    }

}