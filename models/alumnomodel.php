<?php
    class AlumnoModel extends UsuarioModel{
        
        private $model;
        private $matricula;
        private $nombre;
        private $apellido_paterno;
        private $apellido_materno;
        private $carr_numero;

        public function __construct(){
            parent::__construct();
            $this->matricula='';
            $this->nombre='';
            $this->apellido_paterno='';
            $this->apellido_paterno='';
            $this->carr_numero=0;
            $this->model = new Model();
        }
        
    
        /***Setters*/
        public function setMatricula($matricula){$this->$matricula=$matricula;}
        public function setNombre($nombre){$this->$nombre=$nombre;}
        public function setApellidoPaterno($apellido_paterno){$this->$apellido_paterno=$apellido_paterno;}
        public function setApellidoMaterno($apellido_materno){$this->$apellido_materno=$apellido_materno;}
        public function setCarrNumero($carr_numero){$this->$carr_numero=$carr_numero;}

        /***Getters*/
        public function getMatricula(){return $this->$matricula;}
        public function getNombre(){return $this->$nombre;}
        public function getApellido_Paterno(){return $this->$apellido_paterno;}
        public function getApellidoMaterno(){return $this->$apellido_paterno;}
        public function getCarrNumero(){return $this->$carr_numero;}

        /**MÉTODO INSERT GENÉRICO PARA INSERTAR UN REGISTRO A CUALQUIER TABLA
     * @PARAM: $data: Arreglo asociativo, las claves representan las columas y los valores los datos a insertar en el registro.
    */
    public function insert($table,$data) {
        $this->model->insert($table,$data);
    }

    /**MÉTODO GETALL GENÉRICO PARA OBTENER TODOS LOS REGISTROS DE CUALQUIER TABLA */
    public function getAll($table) {
        $this->model->getAll($table);
    }

    /**MÉTODO GET GENÉRICO PARA BUSCAR Y OBTENER UN ELEMENTO DE UNA TABLA
     * @PARAM: $columId Nombre de la columna del id de la tabla.
     * @PARAM: $id      Id del registro a buscar.
    */
    public function get($columId,$id) {
        $this->model->get($columId,$id);
    }

    /**
     * MÉTODO UPDATE PARA ACTUALIZAR UN REGISTRO
     * @PARAM: $columId Nombre de la columna del id de la tabla.
     * @PARAM: $id      Id del registro a actualizar.
     * @PARAM: $data    Arreglo que trae los datos nuevos del registro.
     */
    public function update($table, $columTd, $id, $data) {
        $this->model->update($table, $columTd, $id, $data);
    }

    /**
     * @PARAM: $columId Nombre de la columna del id de la tabla.
     * @PARAM: $id      Id del registro a eliminar.
     */
    public function delete($table,$columId,$id) {
        $this->model->delete($table,$columId,$id);
    }

    }
?>