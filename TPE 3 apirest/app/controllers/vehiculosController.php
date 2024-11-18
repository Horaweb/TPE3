<?php
require_once 'app/models/vehiculosModel.php';
require_once 'app/views/jsonView.php';

class VehiculosController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new vehiculosModel(); 
        $this->view = new JSONView();
    }

    
    public function getVehiculos($req, $res) {
        
        $orderBy = null;
        $orderDirection = null;
        $filter_marca = null;
        $filter_modelo = null;
        $filter_año = null;
        $filter_precio = null;
        $filter_tipo = null;
        $page = null;
        $limit = null;

        if(!$res->user) {
            return $this->view->response("Estimado/a, no esta acreditado/a, inicie sesion", 401);
        }
        
        if (isset($req->query->orderBy)) {
            $orderBy = $req->query->orderBy;
        }
        if (isset($req->query->orderDirection)) {
            $orderDirection = $req->query->orderDirection;
        }
        if (isset($req->query->filter_marca)) {
            $filter_marca = $req->query->filter_marca;
        }
        if (isset($req->query->filter_modelo)) {
            $filter_modelo = $req->query->filter_modelo;
        }
        if (isset($req->query->filter_año)) {
            $filter_año = $req->query->filter_año;
        }
        if (isset($req->query->filter_precio)) {
            $filter_precio = $req->query->filter_precio;
        }
        if (isset($req->query->filter_tipo)) {
            $filter_tipo = $req->query->filter_tipo;
        }
        
        if (isset($req->query->page) && is_numeric($req->query->page)) {
            $page = $req->query->page;
        }
        if (isset($req->query->limit) && is_numeric($req->query->limit)) {
            $limit = $req->query->limit;
        }

        
        $vehiculos = $this->model->getAll($orderBy, $orderDirection, $filter_marca, $filter_modelo, $filter_año, $filter_precio, $filter_tipo, $filter_año, $page, $limit);

        
        if (!$vehiculos) {
            return $this->view->response('No hay vehículos disponibles', 404);
        }

        
        return $this->view->response($vehiculos, 200);
    }


    public function getVehiculoById($req, $res) {
        $id = $req->params->id; 

       
        $vehiculo = $this->model->getVehiculoById($id);

       
        if (!$vehiculo) {
            return $this->view->response("El vehículo con el id=$id no existe", 404);
        }

        
        return $this->view->response($vehiculo, 200);
    }


    public function getVehiculoByTipo($req, $res) {
        $tipo = $req->params->tipo; 

       
        $vehiculos = $this->model->getVehiculosxTipo($tipo);

       
        if (!$vehiculos) {
            return $this->view->response("El vehículo con el tipo buscado no existe", 404);
        }

        
        return $this->view->response($vehiculos, 200);
    }


    
    public function createVehiculo($req, $res) {
        if (empty($req->body->marca) || empty($req->body->modelo) || empty($req->body->año) || empty($req->body->precio) || empty($req->body->tipo)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        $marca = $req->body->marca;
        $modelo = $req->body->modelo;
        $año = $req->body->año;
        $precio = $req->body->precio;
        $tipo = $req->body->tipo;

        $id = $this->model->insertVehiculo($marca, $modelo, $año, $tipo, $precio);

        if (!$id) {
            return $this->view->response("Error al insertar vehículo", 500);
        }

        return $this->view->response(201);
    }

    public function updateVehiculo($req, $res) {
        $id = $req->params->id; 

        $vehiculo = $this->model->getVehiculoById($id);
        if (!$vehiculo) {
            return $this->view->response("El vehículo con el id=$id no existe", 404);
        }

        if (empty($req->body->marca) || empty($req->body->modelo) || empty($req->body->año)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        $marca = $req->body->marca;
        $modelo = $req->body->modelo;
        $año = $req->body->año;
        $precio = $req->body->precio;
        $tipo = $req->body->tipo;

        $this->model->editarVehiculo($id, $marca, $modelo, $año, $precio, $tipo);

        $vehiculo = $this->model->getVehiculoById($id);
        return $this->view->response($vehiculo, 200);
    }

    public function deleteVehiculo($req, $res) {
        $id = $req->params->id; 

        
        $vehiculo = $this->model->getVehiculoById($id);
        if (!$vehiculo) {
            return $this->view->response("El vehículo con el id=$id no existe", 404);
        }

        $this->model->deleteVehiculoById($id);
        return $this->view->response("El vehículo con el id=$id se eliminó con éxito", 200);
    }
}

