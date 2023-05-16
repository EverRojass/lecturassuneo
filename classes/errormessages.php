<?php

/*CLASE PARA DEFINIR MENSAJES DE ERROR*/

class ErrroMessages{
    /*

    NOMENCLATURA DE LAS CONSTATES:
    ERROR|SUCCESS_Controller_method_operation
    
    */
   
    
    //const ERROR_ADMIN_NEWCATEGORY_EXISTS = "El nombre de la categoría ya existe, intenta otra";
    const PRUEBA_ERROR        = "1f8f0ae8963b16403c3ec9ebb851f156";
    

    private $errorsList = [];

    public function __construct()
    {
        $this->errorsList = [
            ErrorsMessages::PRUEBA_ERROR => 'ESTE ES UN MENSAJE DE PRUEBA DE ERROR',
        ];
    }

    function get($hash){
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}
