<?php
class ControllerCRUD{
    private $gestor;

    function __construct($gestor){
        $this->gestor = $gestor;
    }
    function index(){
        $flota = $this->gestor->listar();
        include "views/listar.php";
    }
    function crear(){
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = uniqid();
            $marca= $_POST['marca'];
            $modelo= $_POST['modelos'];
            $matricula= $_POST['matricula'];
            $precioDia= $_POST['precioDia'];
            $numPuertas= $_POST['numPuertas'];
            $tipoCombustible= $_POST['tipoCombustible'];
            $cilindrada= $_POST['cilincrada'];
            $incluyeCasco= $_POST['incluyeCasco'];
        }
            if ($cilindrada && $incluyeCasco instanceof Motocicleta) {
                $vehiculo = new Motocicleta($marca,$modelo,$matricula,$precioDia,$cilindrada,$incluyeCasco, $id=0);
            }
            elseif($numPuertas && $tipoCombustible){
                $vehiculo = new Coche($marca,$modelo,$matricula,$precioDia,$numPuertas,$tipoCombustible, $id=0);
            }
            $this->gestor->crear($vehiculo);
            
            header("Location: index.php");
            exit;
            
    include "views/crear.php";
        
    }
    function editar(){
        $matricula = $_GET['matricula'] ?? null;
        $vehiculo = $this->gestor->buscar($matricula);

        if (!$flota) {
            echo "Vehículo no encontrado";
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $flota = $this->gestor->editar($_POST['marca'], $_POST['modelo'],$_POST['matricula'], $_POST['precioDia'], $_POST['cilindrada'], $_POST['incluyeCasco']);
        header("Location: index.php");
        exit;
    }
    include "views/editar.php";
    }
    function eliminar(){
        $matricula = $_GET['matricula'] ?? null;
        $this->gestor->eliminar($matricula);
        header("Location: index.php");
        exit;
    }
}