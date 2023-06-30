<?php
include_once "registrar.php";

$Num_doc = $_POST["N_documento"];
$Contraseña = $_POST["Contraseña"];
$Nombre_usuario = $_POST["Nombre_de_usuario"];
$Primer_nombre = $_POST["primer_nombre"];
$Segundo_nombre = $_POST["segundo_nombre"];
$Codigo_ciudad = $_POST["codigo_ciudad"];
$Edad = $_POST["edad"];

$sql = "INSERT INTO registrar_usuarios (N_documento, Contraseña, Nombre_de_usuario, Primer_nombre, Segundo_nombre, Codigo_ciudad, Edad) VALUES ('$Num_doc', '$Contraseña', '$Nombre_usuario', '$Primer_nombre', '$Segundo_nombre', '$Codigo_ciudad', '$Edad');";

if ($conn->query($sql)) {
    echo "Registro creado";
    include_once "index.html";
} else {
    echo "Error, no se registró";
}
?>
