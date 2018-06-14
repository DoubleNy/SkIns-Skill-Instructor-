<?php
class View {
    public function render($name, $values = null)
    {
        require 'views/' . $name . '.php';
    }

}
