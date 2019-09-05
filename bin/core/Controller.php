<?php
/**
 * Created by PhpStorm.
 * User: gener
 * Date: 9/3/2019
 * Time: 3:30 PM
 */

class Controller
{
    public $model;
    public $view;

    public function __construct() {
        $this->view = new View();
    }
    function GenerateMethod() { }

    public function AjaxMethod() {}
}