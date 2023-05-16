<?php
    //INDEX GENERAL DE LA APLICACIÓN
    error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
    ini_set('ignore_repeated_errors', TRUE); // always use TRUE
    ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
    ini_set('log_errors', TRUE); // Error/Exception file logging engine.
    ini_set("error_log", "./php-error.log");
    error_log( "Inicio de aplicación web");

    require_once 'config/config.php';
    require_once 'libs/database.php';
    require_once 'classes/errormessages.php';  
    require_once 'classes/successmessages.php';  
    require_once 'libs/controller.php';
    require_once 'libs/model.php';
    require_once 'libs/view.php';
    require_once 'libs/app.php';  
    
    //INSTANCIAR LA CLASE APP EN EN EL ARCHIVO 'libs/app.php'
    $app=new App();
?>