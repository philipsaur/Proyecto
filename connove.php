<?php

include_once "registrar.php";

$Fecha_novedad = $_POST["FN"];
$Id_empleado = $_POST["IDE"]; 
$Tipo_novedad = $_POST["TN"];
$Comentarios = $_POST["Comen"];

$sql = "INSERT INTO novedades (FechaN, Id_empleado, Tipo_novedad, Comentarios) VALUES ('$Fecha_novedad', '$Id_empleado', '$Tipo_novedad', '$Comentarios');";
if($conn -> query($sql)){
    echo "Registro creado";
    include_once "Novedades.html";
}
else{
    echo "Error, no se registró";
}



?>
