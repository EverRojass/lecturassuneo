<?php
class Controller{
    function __construct(){
       $this->view= new View(); //Indicar que vista se requiere cargar.
    }


    //Cargar el archivo del modelo del controlador asociado.
    function loadModel($model){
        $url='models/'.$model.'model.php';
        if (file_exists($url)) {
            require_once $url;
            $modelName=$model.'Model';
            $this->model=new $modelName();
        }
    }

    /*Validar que existan todos los parametros del arreglo $_POST[]*/
    function existPOST($params){
        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                error_log("ExistPOST: No existe el parametro $param" );
                return false;
            }
        }
        error_log( "ExistPOST: Existen parámetros" );
        return true;
    }

    /*Validar que existan todos los parametros del arreglo $_GET[]*/
    function existGET($params){
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }

    function getGet($name){
        return $_GET[$name];
    }

    function getPost($name){
        return $_POST[$name];
    }

    /*Redirigir al usuario a una pagina*/
    function redirect($route, $mensajes = []){
        $data = [];
        $params = '';
        
        foreach ($mensajes as $key => $value) {
            array_push($data, $key . '=' . $value);
        }
        $params = join('&', $data);
        
        if($params != ''){
            $params = '?' . $params;
        }
        header('location: ' . constant('URL') . $route . $params);
    }
}