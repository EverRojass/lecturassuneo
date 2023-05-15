<?php
class conexion{
	private $Servidor="localhost";
	private $Usuario="root";
	private $Clave="";
	private $BD="lecturas_suneo";
	
    function conectar(){
		$link = mysqli_connect($this->Servidor, $this->Usuario, $this->Clave, $this->BD);
		mysqli_set_charset($link,'utf8');
		if (!$link){
			die('No se pudo conectar a la BD: ');
		}
        return $link;
	}
	function desconectar(){
		mysqli_close();
	}	
	function consulta($resultado){
		return mysqli_query($resultado);
	}
	function rows($resultado){
		return mysqli_num_rows($resultado);
	}
	function resultados($resultado){
		return mysqli_fetch_array($resultado, MYSQLI_ASSOC);
	}
	function getDatos($consulta){
		// Conectar con la base de datos
		$this->conectar();
		// Ejecutar la consulta SQL
		$resultado = $this->consulta($consulta);
		// Crear el array de elementos para la capa de la vista
		$datos = array();
		if($this->rows($resultado)>0){
			while($fila = $this->resultados($resultado)){
				$datos[] = $fila;
			}
		}
		return $datos;
	}
	public function getSQL($SQL){
		try {
			$this->SQL = mysqli_query($this->conectar(),$SQL);
			if(!$this->SQL){
				throw new Exception("No se pudo ejecutar la consulta");
			}else{
				return $this->SQL;
			}	
			$this->desconectar();	
		} catch (Exception $e) {
			echo "No se pudo completar la tarea";
		}
					
	}
}
?>