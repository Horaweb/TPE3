<?php
    require_once 'libs/router.php';

    $router= new Router();


    $router->addRoute('api/vehiculos', 'GET', 'VehiculosApiController', 'getVehiculos');
    $router->addRoute('api/vehiculos/:id', 'GET', 'VehiculosApiController', 'getVehiculoById');
    $router->addRoute('api/vehiculos/tipo/:tipo', 'GET', 'VehiculosApiController', 'getVehiculosByTipo');
    $router->addRoute('api/vehiculos', 'POST', 'VehiculosApiController', 'addVehiculo');
    $router->addRoute('api/vehiculos/:id', 'PUT', 'VehiculosApiController', 'updateVehiculo');
    $router->addRoute('api/vehiculos/:id', 'DELETE', 'VehiculosApiController', 'deleteVehiculo');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
 