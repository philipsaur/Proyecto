<?php
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
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>
