<?php
/*CLASE USUARIO*/
class UsuarioModel{
    
    private $id;
    private $curp;
    private $correo;
    private $contrasenia;
    private $estado_cuenta;

    function __construct(){
       $this->$id=0;
       $this->curp='';
       $this->correo='';
       $this->contrasenia='';
       $this->estado_cuenta='';
    }

    /**Validar si existe un usuario
         * @param: correo correo electronico.
         */
        public function user_exists($correo){
            try{
                $query = $this->prepare('SELECT correo FROM (SELECT alum_correo AS correo FROM tbl_alumno UNION SELECT revisor_correo AS correo FROM tbl_revisor) AS usuarios WHERE correo = :correo');
                $query->execute( ['correo' => $correo]);
                
                if($query->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return false;
            }
        }

        /**COMPARAR LA CONTRASEÑA SOLICITADA CON LA DE LA BASE DE DATOS*/
        function comparePasswords($current, $userid){
            try{
                
                $query = $this->db->connect()->prepare('SELECT id, contrasenia FROM (SELECT alum_id AS id, alum_contrasenia AS contrasenia FROM tbl_alumno UNION SELECT revisor_id AS id, revisor_contrasenia AS contrsenia FROM tbl_revisor) AS usuarios WHERE correo = :id');
                $query->execute(['id' => $userid]);
                
                if($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['contrasenia']);
    
                return NULL;
            }catch(PDOException $e){
                return NULL;
            }
        }


        /**Encriptar contraseña del usuario */
        public  function getHashedPassword($password){
            return password_hash($password,PASSWORD_DEFAULT,['cost'=>10]);
        }

        /***Setters*/
        public function setCurp($curp){$this->$curp=$curp;}    
        public function setCorreo($correo){$this->$correo=$correo;}
        public function setContrasenia($contrasenia){$this->$contrasenia=$this->getHashedPassword($contrasenia);}
        public function setEstadoCuenta($estado_cuenta){$this->$estado_cuenta=$estado_cuenta;}

        /***Getters*/
        public function getId(){return $this->$id;}
        public function getCurp(){return $this->$curp;}
        public function getCorreo(){return $this->$correo;}
        public function getContrasenia(){return $this->$contrasenia;}
        public function getEstado_Cuenta(){return $this->$estado_cuenta;}
}