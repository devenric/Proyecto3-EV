<?php
class Coche extends Vehiculo{
    private $numeroPuertas;
    private $tipoCombustible;

    function __construct($marca, $modelo, $matricula, $precioDia, $id, $numeroPuertas, $tipoCombustible){
        parent::construct($marca, $modelo, $matricula, $precioDia, $id);
        $this->numPuertas = $numeroPuertas;
        $this->tipoCombustible = $tipoCombustible;
    }
    function calcularAlquiler($dias){return ($this->getPrecioDia * $dias)*1.05;}
}