<?php

include_once "registrar.php";

$Fecha_viajes = $_POST["FV"];
$Id_conductor = $_POST["IDC"]; 
$Id_transporte = $_POST["IDT"];
$Cantidad_bene = $_POST["CB"];
$Destino = $_POST["DST"];
$Nombre_conductor = $_POST["NomC"];

$sql = "INSERT INTO transporte (Fecha_viajes, Id_conductor, Id_tranporte, Cantidad_ben, Destino, Nombre_cond) VALUES ('$Fecha_viajes', '$Id_conductor', '$Id_transporte', '$Cantidad_bene', '$Destino', '$Nombre_conductor');";
if($conn -> query($sql)){
    echo "Registro creado";
    include_once "Transporte.html";
}
else{
    echo "Error, no se registró";
}



?>
