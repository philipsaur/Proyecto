<?php
include_once "registrar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id_donacion = $_POST["IDD"];
    $Fecha_donacion = $_POST["FD"];
    $Cantidad = $_POST["Cantidad"];
    $Tipo_donacion = $_POST["Tipo"];

    $sql = "INSERT INTO donacion (Id_donacion, Fecha_donacion, Cantidad, Tipo_donacion) VALUES ('$Id_donacion', '$Fecha_donacion', '$Cantidad', '$Tipo_donacion')";

if($conn -> query($sql)){
    echo "Registro creado";
    include_once "RegisDonacion.html";
}
else{
    echo "Error, no se registró";
}

}

?>
