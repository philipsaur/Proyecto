<?php

include_once "registrar.php";

$Id_donacion = $_POST["IDD"];
$Fecha_don = $_POST["FD"];
$Cantidad = $_POST["Cantidad"]; 
$Tipo_donacion = $_POST["Tipo"];
$Nombre_per = $_POST["NPD"];
$Nombre_emp = $_POST["NED"];

$sql = "INSERT INTO donacion (Id_donacion, Fecha_donacion, cantidad, Tipo_donacion, Nombre_persona_donante, Nombre_empresa_donante) VALUES ('$Id_donacion', '$Fecha_don', '$Cantidad', '$Tipo_donacion', '$Nombre_per', '$Nombre_emp');";
if($conn -> query($sql)){
    echo "Registro creado";
    include_once "RegisDonacion.html";
}
else{
    echo "Error, no se registró";
}



?>
