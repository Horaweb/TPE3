<?php
class UserModel {
    protected $db;

    function __construct(){
        $this->db = new PDO('mysql:host='.MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }

    public function getUserByName($username){
        // hago la consulta
        $query = $this->db->prepare('SELECT * FROM usuario WHERE username = ?');
        $query->execute([$username]);

        // obtengo la rta
        $usuario = $query->fetch(PDO::FETCH_OBJ);

        // retorno el usuario
        return $usuario; 

    }
}