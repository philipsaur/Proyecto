<?php

include_once "registrar.php";

$Id_inventario = $_POST["IDI"];
$Fecha_registro = $_POST["FD"]; 
$Cantidad = $_POST["Cantidad"];
$Id_donacion = $_POST["IDD"];
$Archivados = $_POST["Archivados"];

$sql = "INSERT INTO inventarios (Id_inventario, Fecha_registro, Cantidad, Id_donacion, Archivados) VALUES ('$Id_inventario', '$Fecha_registro', '$Cantidad', '$Id_donacion', '$Archivados');";
if($conn -> query($sql)){
    echo "Registro creado";
    include_once "formulario.html";
}
else{
    echo "Error, no se registró";
}



?>
