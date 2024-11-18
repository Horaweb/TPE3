<?php
require_once 'app/models/userModel.php';
require_once 'app/views/adminView.php';

class AdminController {
    private $view;
    private $model;
    
    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AdminView();
    }

    public function showLogin(){
        $this->view->showForm();
    }

    public function login() {
        if(!isset($_POST['username']) || empty($_POST['username'])){
            return $this->view->showError("falta completar el nombre");
        }

        if(!isset($_POST['password']) || empty($_POST['password'])){
            return $this->view->showError("falta completar la contraseña");
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        //verificamos que el usuario este en la base de datos
        $userFromDB = $this->model->getUserByName($username);

        if($userFromDB && password_verify($password, $userFromDB->password)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['NAME_USER'] = $userFromDB->username;
            $_SESSION['LAST_ACTIVITY'] = time();
            // Redirijo al home
            header('Location: ' . BASE_URL .  'home');
        } else {
            return $this->view->showError('Credenciales incorrectas...');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . 'home');
    }
}


