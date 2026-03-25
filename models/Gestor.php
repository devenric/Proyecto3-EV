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
            $vehiculo = null;
            if ($value['numPuertas'] === null && $value['tipoCombustible'] === null) {
                $vehiculo = new Motocicleta($value['marca'], $value['modelo'],$value['matricula'], $value['precioDia'], $value['cilindrada'], $value['incluyeCasco']);
            }
            else{
                $vehiculo = new Coche($value['marca'], $value['modelo'],$value['matricula'], $value['precioDia'],$value['numPuertas'], $value['tipoCombustible']);
            }
            $objeto = $vehiculo;
            $listado[] = $objeto;
        }
        
        return $listado;
    }
    function crear($vehiculo){
        if ($vehiculo instanceof Coche) {
            $sql = "INSERT INTO vehiculo (marca, modelo, matricula, precioDia, numPuertas, tipoCombustible) VALUES (:marca, :modelo, :matricula, :precioDia, :numPuertas, :tipoCombustible)";
        }
        elseif ($vehiculo instanceof Motocicleta) {
            $sql = "INSERT INTO vehiculo (marca, modelo, matricula, precioDia, cilindrada, incluyeCasco) VALUES (:marca, :modelo, :matricula, :precioDia, :cilindrada, :incluyeCasco)";

        }
        $resultado = $this->conexion->prepare($sql);
        $resultado->bindValue(':marca', $vehiculo->getMarca());
        $resultado->bindValue(':modelo', $vehiculo->getModelo());
        $resultado->bindValue(':matricula', $vehiculo->getMatricula());
        $resultado->bindValue(':precioDia', $vehiculo->getprecioDia());
        if ($vehiculo instanceof Coche) {
        $resultado->bindValue(':numPuertas', $vehiculo->getNumPuertas());
        $resultado->bindValue(':tipoCombustible', $vehiculo->getTipoCombustible());
        }
        elseif ($vehiculo instanceof Motocicleta) {
        $resultado->bindValue(':cilindrada', $vehiculo->getCilindrada());
        $resultado->bindValue(':incluyeCasco', $vehiculo->getIncluyeCasco());
        }
        
        return $resultado->execute();
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