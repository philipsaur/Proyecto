<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "owl";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST["guardar"])) {
    $id = $_POST["id"];
    $numdoc = $_POST["N_documento"];
    $contrasena = $_POST["Contraseña"];
    $username = $_POST["Nombre_de_usuario"];
    $primerNombre = $_POST["primer_nombre"];
    $segundoNombre = $_POST["segundo_nombre"];
    $codigoCiudad = $_POST["codigo_ciudad"];
    $edad = $_POST["edad"];

    $sql = "UPDATE registrar_usuarios SET N_documento='$numdoc', Contraseña='$contrasena', Nombre_de_usuario='$username', Primer_nombre='$primerNombre', Segundo_nombre='$segundoNombre', Codigo_ciudad='$codigoCiudad', Edad='$edad' WHERE N_documento='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: Consultarusu.php");
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conn->error;
    }
} else {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM registrar_usuarios WHERE N_documento='$id'";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows == 1) {
            $row = $resultado->fetch_assoc();
            $numdoc = $row["N_documento"];
            $contrasena = $row["Contraseña"];
            $username = $row["Nombre_de_usuario"];
            $primerNombre = $row["Primer_nombre"];
            $segundoNombre = $row["Segundo_nombre"];
            $codigoCiudad = $row["Codigo_ciudad"];
            $edad = $row["Edad"];
        } else {
            echo "Registro no encontrado.";
            exit();
        }
    } else {
        echo "ID no proporcionado.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="styleviajes.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="PSG.png" alt="Logo PSG">
        </div>
        <nav class="navi">
            <a href="consultarusu.php">Regresar</a>
            <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
    </header>

    <h1>Editar Usuario</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" placeholder="Número de Documento" name="N_documento" value="<?php echo $numdoc; ?>">
        <input type="password" placeholder="Contraseña" name="Contraseña" value="<?php echo $contrasena; ?>">
        <input type="text" placeholder="Nombre de Usuario" name="Nombre_de_usuario" value="<?php echo $username; ?>">
        <input type="text" placeholder="Primer Nombre" name="primer_nombre" value="<?php echo $primerNombre; ?>">
        <input type="text" placeholder="Segundo Nombre" name="segundo_nombre" value="<?php echo $segundoNombre; ?>">
        <input type="text" placeholder="Código de Ciudad" name="codigo_ciudad" value="<?php echo $codigoCiudad; ?>">
        <input type="number" placeholder="Edad" name="edad" value="<?php echo $edad; ?>">
        <input type="submit" name="guardar" value="Guardar cambios">
    </form>
</body>
</html>
