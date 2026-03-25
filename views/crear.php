<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
    <style>
        .coche, .moto{
            display:none;
        }
        form:has(option[value="coche"]:checked) .coche{
            display:block;
        }
        form:has(option[value="moto"]:checked) .moto{
            display:block;
        }
    </style>
</head>
<body>
    <h1>Crear Producto</h1>

    <form method="POST">
        <br>
        <input type="text" name="marca" required placeholder="marca"><br><br>

        <br>
        <input type="text" name="modelo" required placeholder="modelo"><br><br>
        <br>
        <input type="text" name="matricula" required placeholder="matricula"><br><br>
        <br>
        <input type="text" name="precioDia" required placeholder="precio al día"><br><br>
       ¿Qué vehículo es?:
            <select name="tipoVehiculo" id="tipoVehiculo" class="option">
                <option value="coche">Coche</option>
                <option value="moto">Moto</option>
            </select>
    <br><br>
    <div class="coche">
        <input type="number" name="numPuertas" class="numero-puertas" placeholder="Número de Puertas"><br>
        <input type="text" name="tipoCombustible" class="combustible" placeholder="Tipo de Combustible">
    </div>
    <div class="moto">
        <input type="number" name="cilindrada" class="cilindrada" placeholder="Cilindrada"><br>
        <input type="text" name="incluyeCasco" class="incluye-casco" placeholder="¿Incluye Casco?">
    </div>
        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="index.php">Volver</a>
</body>
</html>
