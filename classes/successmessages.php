<?php

/*CLASE PARA DEFINIR MENSAJES DE ÉXITO*/

class SuccessMessages{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    
    const PRUEBA_SUCCESS     = "f52228665c4f14c8695b194f670b0ef1";
    
    
    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            SuccessMessages::PRUEBA_SUCCESS => "ESTE ES UN MENSAJE DE PRUEBA DE SUCCESS",
           
        ];
    }

    function get($hash){
        return $this->successList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }

}