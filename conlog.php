<?php

include_once "registrar.php";

$Num_doc = $_POST["numdoc"];
$Nombre = $_POST["nombre"]; 
$Apellidos = $_POST["apellido"];
$Nacionalidad = $_POST["nacion"];
$Tipo_doc = $_POST["tipodoc"];
$Fecha_na = $_POST["fdn"];
$Tel = $_POST["tel"];
$Correo = $_POST["crr"];

$sql = "INSERT INTO Inscripcion (Numero_documento, Nombre, Apellidos, Nacionalidad, Tipo_documento, Fecha_nacimiento, Email, Contacto_telefonico) VALUES ('$Num_doc', '$Nombre', '$Apellidos', '$Nacionalidad', '$Tipo_doc', '$Fecha_na','$Correo','$Tel');";

if ($conn->query($sql)) {
    echo "Registro creado";
    include_once "LoginOwlSystem.html";
} else {
    echo "Error, no se registró";
}

?>
