<?php
class Usuario extends conexion{
    
    private $usuario;
    private $contrasena;

    public function __construct($usuario, $contrasena) {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }
    public function getUsuario() {
        return $this->usuario;
    }
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }
    
    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
    
    public function validar() {
        // aquí se realizaría la validación del usuario y contraseña en la base de datos
        // por simplicidad, aquí solo se compara el usuario y contraseña con valores fijos
        if ($this->usuario == 'usuario' && $this->contrasena == 'contrasena') {
            return true;
        } else {
            return false;
        }
    }
}

?>
