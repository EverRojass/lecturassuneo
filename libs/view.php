<?php

class View{
    function __construct(){
        
    }

    /*Mandar a llamar la vista requerida
    @param: $nombre Nombre del archivo de la vista
    @param: $data Parámentros a mostrar en la vista.
    **/
    function render($nombre,$data=[]){
        $this->d=$data;

        $this->handleMessages();
        require 'views/'.$nombre.'.php';

    }

    /*MANEJAR Y VALIDAR SI EXISTEN MENSAJES*/
    private function handleMessages(){
        if(isset($_GET['success']) && isset($_GET['error'])){
            // no se muestra nada porque no puede haber un error y success al mismo tiempo
        }else if(isset($_GET['success'])){
            
            $this->handleSuccess();
        }else if(isset($_GET['error'])){
            $this->handleError();
        }
    }

/*MANEJAR Y DECIFRAR MENSAJES DE ERROR*/
    private function handleError(){
        if(isset($_GET['error'])){
            $hash = $_GET['error'];
            $errors = new ErrorsMessages();

            if($errors->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $errors->get($hash));
                $this->d['error'] = $errors->get($hash);
            }else{
                $this->d['error'] = NULL;
            }
        }
    }

/*MANEJAR Y DECIFRAR MENSAJES DE ÉXITO*/
    private function handleSuccess(){
        if(isset($_GET['success'])){
            $hash = $_GET['success'];
            $success = new SuccessMessages();

            if($success->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $success->existsKey($hash));
                $this->d['success'] = $success->get($hash);
            }else{
                $this->d['success'] = NULL;
            }
        }
    }

    /*MOSTRAR MENSAJES*/
    public function showMessages(){
        $this->showError();
        $this->showSuccess();
    }

    /*MOSTRAR MENSAJES DE ERROR*/
    public function showError(){
        if(array_key_exists('error', $this->d)){
            echo '<div class="error">'.$this->d['error'].'</div>';
        }
    }

    /**
     * MOSTRAR MENSAJES DE ÉXITO
     * 
     */
    public function showSuccess(){
        if(array_key_exists('success', $this->d)){
            echo '<div class="success">'.$this->d['success'].'</div>';
        }
    }
}