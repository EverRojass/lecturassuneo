<?php
/**
 * CLASE MODEL: ES UNA CLASE MODELO BASE QUE CONTIENE METODOS Y ATRIBUTOS QUE PUEDE HEREDAR CUALQUIER OTRA CLASE MODELO. 
 */

    //include_once 'libs/imodel.php';
    //include 'database.php';
class Model{
    
    private $db;

    /**
     * CONSTRUCTOR DE LA CLASE.
     * @PARAM: $table Nombre de la tabla donde para realizar las operaciones.
     */
    function __construct($table){
        $this->db=new Database();
    }

    /**
     * EJECUTAR UNA CONSULTA PARA MEJORAR EL RENDIMIENTO Y SEGURIRDAD.
     * @PARAM: $query Sentencia a ejecutar.
     */
    function query($query){
        return $this->db->connect()->query($query);
    }

    /**
     *  PREPARAR UNA CONSULTA PARA MEJORAR EL RENDIMIENTO Y SEGURIRDAD.
     * @PARAM: $query Sentencia a preparar.
     */
    function prepare($query){
        return $this->db->connect()->prepare($query);
    }

    /**MÉTODO INSERT GENÉRICO PARA INSERTAR UN REGISTRO A CUALQUIER TABLA
     * @PARAM: $data: Arreglo asociativo, las claves representan las columas y los valores los datos a insertar en el registro.
    */
    public function insert($table,$data) {
        $columns =  implode(', ', array_keys($data));
        $values =   ':'.implode(', :', array_values($data));
        try {
            $query=$this->prepare("INSERT INTO {$table} ({$columns}) VALUES ({$values})");
            $query=execute();
            return true;
        } catch (PDOException  $e) {
            error_log('MODEL:: create()->PDOEXECEPTION'.$e);
            return false;
        }
    }

    /**MÉTODO GETALL GENÉRICO PARA OBTENER TODOS LOS REGISTROS DE CUALQUIER TABLA */
    public function getAll($table) {
        try {
            $query =$this->query( "SELECT * FROM {$this->table}");
            $items = $this->execute($query);
            return $items->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('ALUMNOMODEL:: getALL()->PDOEXECEPTION'.$e);
            return null;
        }
    }

    /**MÉTODO GET GENÉRICO PARA BUSCAR Y OBTENER UN ELEMENTO DE UNA TABLA
     * @PARAM: $columId Nombre de la columna del id de la tabla.
     * @PARAM: $id      Id del registro a buscar.
    */
    public function get($columId,$id) {
        try {
            $query=$this->prepare("SELECT * FROM {$this->table} WHERE {$columId} = {$id}");
            $item = $this->execute($query);
        return $item->fetch();
        } catch (PDOException $e) {
            error_log('MODEL:: get()->PDOEXECEPTION'.$e);
            return null;
        }
    }

    /**
     * MÉTODO UPDATE PARA ACTUALIZAR UN REGISTRO
     * @PARAM: $columId Nombre de la columna del id de la tabla.
     * @PARAM: $id      Id del registro a actualizar.
     * @PARAM: $data    Arreglo que trae los datos nuevos del registro.
     */
    public function update($table,$columTd,$id, $data) {
        try {
            $set = '';
            foreach ($data as $key => $value) {  $set .= "{$key} = :{$key}, ";}
            $set = rtrim($set, ', ');
            $query = "UPDATE {$this->table} SET {$set} WHERE {$columTd} = :id";
            $data['id'] = $id;
            $stmt = $this->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            error_log('MODEL:: update()->PDOEXECEPTION'.$e);
            return null;
        }
    }

    /**
     * @PARAM: $columId Nombre de la columna del id de la tabla.
     * @PARAM: $id      Id del registro a eliminar.
     */
    public function delete($table,$columId,$id) {
        try {
            $query = $this->prepare("DELETE FROM {$table} WHERE {$columId} = {$id}");
            $query = excute();
            return true;
        } catch (PDOException $e) {
            error_log('MODEL:: update()->PDOEXECEPTION'.$e);
            return false;
        }
        
    }
}