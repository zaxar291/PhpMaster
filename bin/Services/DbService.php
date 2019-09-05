<?php

class DbService implements IDbService, IFileLoader {

    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;

    private $settings;

    private $connection;

    private $errorMessage;

    public function __construct($settings) {
        $this->db_host = $settings->dbSettings->db_host;
        $this->db_name = $settings->dbSettings->db_name;
        $this->db_user = $settings->dbSettings->db_user;
        $this->db_pass = $settings->dbSettings->db_pass;

        $this->settings = $settings;

        $this->errorMessage = "";

        $this->LoadFiles();
    }

    public function CreateConnection() {
        try {
            $this->connection = new mysqli($this->db_host, $this->db_user , $this->db_pass, $this->db_name);
            if(!$this->connection) {
                throw new DbConnectErrorException(mysqli_connect_error());
            }
        }catch (DbConnectErrorException $exception) {
            $this->errorMessage = $exception;
        }

        mysqli_set_charset($this->connection, "utf8");
        $this->connection->query("set names utf8");
    }
    public function CloseConnection() {
        $this->connection->close();
    }
    public function Get($query, $o = array()) {
        $r = $this->connection->query($query);
        if(!$r) {
            $this->errorMessage = mysqli_error($this->connection);
            return false;
        }
        if($r->num_rows > 0) {
            while($res = $r->fetch_assoc()) {
                $o[] = $res;
            }
        }else{
            $this->errorMessage = mysqli_error($this->connection);
            return false;
        }
        return $o;
    }
    public function Insert($query) {
        return $this->connection->query($query);
    }
    public function Update($query) {
        return $this->connection->query($query);
    }
    public function Delete($query) {
        return $this->connection->query($query);
    }

    public function GetErrorMessage() {
        return $this->errorMessage;
    }

    public function LoadFiles() {
        require_once $this->settings->AppSettings->defaultExceptionsDir . 'DbConnectErrorException.php';
    }

}