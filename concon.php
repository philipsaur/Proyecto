<?php

include_once "registrar.php";

$Nombre = $_POST["name"];
$Telefono = $_POST["phone"]; 
$Correo = $_POST["email"];
$Mensaje = $_POST["Message"];

$sql = "INSERT INTO contacto (Nombre, Telefono, Correo, Mensaje) VALUES ('$Nombre', '$Telefono', '$Correo', '$Mensaje');";
if($conn -> query($sql)){
    echo "Registro creado";
    include_once "Blog.html";
}
else{
    echo "Error, no se registró";
}



?>
