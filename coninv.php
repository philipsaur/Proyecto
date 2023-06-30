<?php

include_once "registrar.php";

$Id_inventario = $_POST["IDI"];
$Fecha_registro = $_POST["FD"]; 
$Cantidad = $_POST["Cantidad"];
$Id_donacion = $_POST["IDD"];
$Archivados = $_POST["Archivados"];
$Estado = $_POST["EM"];

$sql = "INSERT INTO inventarios (Id_inventario, Fecha_registro, Cantidad, Id_donacion, Archivado, Estado_material) VALUES ('$Id_inventario', '$Fecha_registro', '$Cantidad', '$Id_donacion', '$Archivados', '$Estado');";
if($conn -> query($sql)){
    echo "Registro creado";
    include_once "Registrarproducto.html";
}
else{
    echo "Error, no se registró";
}



?>
