<?php
abstract Class Vehiculo{
    protected $id;
    protected $marca;
    protected $modelo;
    protected $matricula;
    protected $precioDia;

    function __construct($marca, $modelo, $matricula, $precioDia, $id){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->matricula = $matricula;
        $this->precioDia = $precioDia;
        $this->id = $id;
    }
    function getId(){return $this->id;}
    function getMarca(){return $this->marca;}
    function getModelo(){return $this->modelo;}
    function getMatricula(){return $this->matricula;}
    function getPrecioDia(){return $this->precioDia;}

    function calcularAlquiler($dias){return $this->getPrecioDia * $dias;}
    public function toArray() {
        return [
            "id" => $this->id,
            "marca" => $this->marca,
            "modelo" => $this->modelo,
            "matricula" => $this->matricula,
            "precioDia" => $this->precioDia,
        ];
    }
}