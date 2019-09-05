<?php

class DbConnectErrorException extends Exception {
    public function __toString()
    {
        return "Error during connection to the database: " . $this->getMessage() . ". In file " . $this->getFile() . ", line " . $this->getLine() . ". Stack trace " . $this->getTraceAsString() . "Try to check settings!";
    }
}