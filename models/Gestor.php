<?php
class Gestor extends Connection{
    function __construct(){
        parent::__construct();
    }

    function listar(){
        $listado = []; //crear array para hacer el asociativo 
        $sql = 'SELECT * from vehiculo';
        $resultado = $this->conexion->query($sql);
        while($value = $resultado->fetch(PDO::FETCH_ASSOC)){
            if ($_POST['numPuertas'] === null && $_POST['tipoCombustible'] === null) {
                $vehiculo = new Motocicleta($value['marca'], $value['modelo'],$value['matricula'], $value['precioDia'], $value['cilindrada'], $value['incluyeCasco']);
            }
            elseif ($_POST['cilindrada'] && $_POST['incluyeCasco'] === null) {
                $vehiculo = new Coche($value['marca'], $value['modelo'],$value['matricula'], $value['precioDia'],$value['numPuertas'], $value['tipoCombustible']);
            }
        }
        $listado[] = $vehiculo;
        return $listado;
    }
    function crear($vehiculo){
        $sql = "INSERT INTO vehiculo (marca, modelo, matricula, precioDia) VALUES (:marca, :modelo, :matricula, :precioDia)";
        $resultado = $this->conexion->prepare($sql);
        $resultado->bindValue(':marca', $vehiculo->getMarca());
    }
    function buscar(){}
    function editar(){}
    function eliminar(){}
    function registrarUsuario(Usuario $usuario){
        try{
        $sql = "INSERT INTO usuario(email, password) VALUES (:email, :password)";
        $resultado = $this->conexion->prepare($sql);

        $resultado->bindValue(':email', $usuario->getEmail());
        $resultado->bindValue(':password', $usuario->getPassword());
        return $resultado->execute();
        }
        catch(PDOException $e){
            return false;
        }
    }
    function buscarUsuarioPorEmail($email){
        $sql = "SELECT * from usuario where email = :email limit 1";
        $resultado = $this->conexion->prepare($sql);

        $resultado->bindValue(':email', $email);
        $resultado->execute();
        $value = $resultado->fetch(PDO::FETCH_ASSOC);

        if ($value) {
            return new Usuario($value['email'], $value['password'], $value['id']);
        }
        return false;
    }
}