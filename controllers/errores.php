<?php

class Errores extends Controller{
    function __construct(){
        parent::__construct();
        error_log('LOGIN::inicio de errores');
    }

    function render(){
        $this->view->render('errores/index');
    }
}