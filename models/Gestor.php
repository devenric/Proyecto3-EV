<?php
class Gestor extends Connection{

    function __contruct(){
        parent::construct();
    }

    function listar(){
        $listado = []; //crear array para hacer el asociativo 
        $sql = 'SELECT * from vehiculo';
        $resultado = $this->conexion->query($sql);
        while($value = $resultado->fetch(PDO::ASSOC)){
            if (!$_POST['numPuertas'] && !$_POST['tipoCombustible']) {
                $moto = new Motocicleta($value['marca'], $value['modelo'],$value['matricula'], $value['precioDia'], $value['cilindrada'], $value['incluyeCasco']);
            }
            elseif (!$_POST[''] && !) {
                # code...
            }
        }
    }
    function crear(){}
    function buscar(){}
    function editar(){}
    function eliminar(){}
}