<?php
class View {
    public function render($name, $values = null)
    {
        require 'views/' . $name . '.php';
    }
    //public function __construct($view_filename,$view_data)
    //{
    //    $this->view_data = $view_data;
    //    $this->view_filename = $view_filename;
    //}
}
