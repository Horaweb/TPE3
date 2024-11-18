<?php
require_once 'app/models/config.php';

class VehiculosModel{
    protected $db;

    function __construct(){
        $this->db = new PDO('mysql:host='.MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }

    public function getAll(){
        // hago la consulta
        $query = $this->db->prepare('SELECT * FROM vehiculos');
        $query->execute();
        // obtengo la rta
        $vehiculos = $query->fetchAll(PDO::FETCH_OBJ);
        // retorno los vehiculos
        return $vehiculos; 
    }

    public function getVehiculosxTipo($tipo){
        // hago la consulta
        $query = $this->db->prepare('SELECT * FROM vehiculos WHERE tipo = ?');
        $query->execute([$tipo]);
        // obtengo la rta
        $vehiculos = $query->fetchAll(PDO::FETCH_OBJ);
        // retorno los vehiculos
        return $vehiculos; 
    }

    public function getVehiculosxMarca($marca){
        // hago la consulta
        $query = $this->db->prepare('SELECT * FROM vehiculos WHERE marca = ?');
        $query->execute([$marca]);
        // obtengo la rta
        $vehiculos = $query->fetchAll(PDO::FETCH_OBJ);
        // retorno los vehiculos 
        return $vehiculos;
    }

    public function insertVehiculo($marca, $modelo, $año, $tipo, $precio) {
        $query = $this->db->prepare("INSERT INTO vehiculos (marca, modelo, año, tipo, precio) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$marca, $modelo, $año, $tipo, $precio]);

        return $this->db->lastInsertId();
    }

    public function getVehiculoById($id){
        $query = $this->db->prepare('SELECT * FROM vehiculos WHERE id = ?');
        $query->execute([$id]);
        $vehiculo = $query->fetch(PDO::FETCH_OBJ);

        return $vehiculo;
    }

    public function editarVehiculo($id, $tipo, $marca, $modelo, $año, $precio) {
        $query = $this->db->prepare("UPDATE vehiculos SET tipo = ?,marca = ?,modelo=?,año=?,precio=? WHERE vehiculos.id = ?");
        $query->execute([ $tipo, $marca, $modelo, $año, $precio, $id]);
    }

    /*
      Elimina una tarea dado su id.
     */
    public function deleteVehiculoById($id) {
        $query = $this->db->prepare('DELETE FROM vehiculos WHERE id = ?');
        $query->execute([$id]);
    }

}