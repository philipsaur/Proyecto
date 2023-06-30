<?php

include_once "registrar.php";

$FechaIn = $_POST["FI"];
$TipoEx = $_POST["TE"]; 
$NoRadicado = $_POST["NDR"];
$Entidad = $_POST["EGI"];
$NumeroCon = $_POST["NDC"];

$sql = "INSERT INTO incapacidad (Fecha_incapacidad, Tipo_excusa, No_radicado, Entidad_gen_incap, No_contacto) VALUES ('$FechaIn', '$TipoEx', '$NoRadicado', '$Entidad', '$NumeroCon');";
if($conn -> query($sql)){
    echo "Registro creado";
    include_once "registrarincap.html";
}
else{
    echo "Error, no se registró";
}



?>