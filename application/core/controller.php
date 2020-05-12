<?php
class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
        require_once('application/models/ModelBase.php');
    }

    function action_index()
    {
    }
}