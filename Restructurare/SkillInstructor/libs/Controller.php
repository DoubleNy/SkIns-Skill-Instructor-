<?php
require 'libs/View.php';
class Controller {
    protected $view;
    function __construct() {
        $this->view = new View();
    }
    //function returnView($view_filename,$view_data = [])
    //{
    //    $this->view = new View($view_filename,$view_data);
    //    return $this->view;
    //}
}
