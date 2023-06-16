<?php

include_once "registrar.php";

$Id_donacion = $_POST["IDD"];
$Fecha_don = $_POST["FD"];
$Cantidad = $_POST["Cantidad"]; 
$Per_don = $_POST["PD"];
$Id_empresa = $_POST["IDE"];

$sql = "INSERT INTO persona (Id_donacion, Fecha_don, Cantidad, Persona_donante, Id_empresa) VALUES ('$Id_donacion', '$Fecha_don', '$Cantidad', '$Per_don', '$Id_empresa');";
if($conn -> query($sql)){
    echo "Registro creado";
    include_once "Donaciones.html";
}
else{
    echo "Error, no se registró";
}



?>
