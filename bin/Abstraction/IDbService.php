<?php

interface IDbService {

    public function CreateConnection();
    public function CloseConnection();
    public function Get($query, $o = array());
    public function Insert($query);
    public function Update($query);
    public function Delete($query);

}