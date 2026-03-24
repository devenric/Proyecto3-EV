<?php
class UsuarioController{
    private $gestor;

    function __construct($gestor){
        $this->gestor = $gestor;
    }

    function registro(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $passwordPlana = $_POST['password'];
            $passwordHash = password_hash($passwordPlana, PASSWORD_DEFAULT);
            $nuevoUsuario = new Usuario($email, $passwordHash);
            $this->gestor->registrarUsuario($nuevoUsuario);
            header("Location: index.php?accion=login");
            exit;
        }
        include "views/registro.php";
    }
function login(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $passwordPlana = $_POST['password'];
    
        $usuario = $this->gestor->buscarUsuarioPorEmail($email);
        if ($usuario && password_verify($passwordPlana, $usuario->getPassword())) {
            $_SESSION['usuarioId'] = $usuario->getId();
            $_SESSION['usuarioEmail'] = $usuario->getEmail();
            header("Location: index.php");
            exit;
        }else{
            $error = "Credenciales Incorrectas";
        }
    }
    include "views/login.php";
}
    function logout(){}
}