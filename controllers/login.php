<?php

class Login extends Controller{
    function __construct(){
        parent::__construct();
        error_log('LOGIN::inicio de controlador login');
    }

    function render(){
        $this->view->render('login/index');
    }
}