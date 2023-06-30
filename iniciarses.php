<?php
session_start(); // Inicia la sesión

include_once "registrar.php";

$Num_doc = $_POST["N_documento"];
$Contraseña = $_POST["Contraseña"];
$sql = "SELECT * FROM registrar_usuarios WHERE N_documento = '$Num_doc';";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $storedPassword = $row["Contraseña"];

    if ($Contraseña == $storedPassword) {
        header("Location: IC.html");
        exit();
    } else {
        $_SESSION["mensaje"] = "Contraseña incorrecta"; // Guarda el mensaje en la variable de sesión
        header("Location: index.html"); // Redirige a la página principal
        exit();
    }
} else {
    $_SESSION["mensaje"] = "Usuario no encontrado"; // Guarda el mensaje en la variable de sesión
    header("Location: index.html"); // Redirige a la página principal
    exit();
}

$conn->close();
?>

