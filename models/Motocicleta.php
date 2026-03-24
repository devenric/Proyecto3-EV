<?php
class Motocicleta extends Vehiculo{
    private $cilindrada;
    private $incluyeCasco;
function __construct($marca, $modelo, $matricula, $precioDia,$cilindrada, $incluyeCasco, $id){
        parent::__construct($marca, $modelo, $matricula, $precioDia, $id);
        $this->cilindrada = $cilindrada;
        $this->incluyeCasco = $incluyeCasco;
}
function calcularAlquiler($dias){
    if ($this->incluyeCasco == true)
    {return ($this->getPrecioDia * $dias) +10;}
}
}