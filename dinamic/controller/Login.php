<?php
is_file("view/VistaLogin.php") ? include ("view/VistaLogin.php") : include ("../view/VistaLogin.php");
class Login{
        
	function __construct() {
        switch ($_GET["op"]){
            case 'iniciarSesion': 
                $this->iniciarSesion();
            break;
            case 'preregistro': 
                $this->preregistro();
            break;
            case 'recuperarContrasenia': 
                $this->recuperarContrasenia();
            break;
        }
	}

    function iniciarSesion(){
        $usuario = new VistaLogin();
        $usuario->iniciarSesion();
    }

    function preregistro(){
        $usuario = new VistaLogin();
        $usuario->preregistro();
    }

    function recuperarContrasenia(){
        $usuario = new VistaLogin();
        $usuario->recuperarContrasenia(); 
    }

}
new Login();
?>