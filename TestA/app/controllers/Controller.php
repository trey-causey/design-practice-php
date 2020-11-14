<?php

class Controller
{
    public function __construct()
    {
        //construct the view
        //$this->view = new View();
        echo 'hello';
    }

    public function IndexAction()
    {
        echo 'from the Controller Index';
    }
}
