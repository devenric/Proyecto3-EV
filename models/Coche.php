<?php
class Coche extends Vehiculo{
    private $numeroPuertas;
    private $tipoCombustible;

    function __construct($marca, $modelo, $matricula, $precioDia, $numeroPuertas, $tipoCombustible){
        parent::__construct($marca, $modelo, $matricula, $precioDia);
        $this->numPuertas = $numeroPuertas;
        $this->tipoCombustible = $tipoCombustible;
    }
    function calcularAlquiler($dias){return ($this->getPrecioDia * $dias)*1.05;}
    function getNumPuertas(){return $this->numeroPuertas;}
    function getTipoCombustible(){return $this->tipoCombustible;}
}