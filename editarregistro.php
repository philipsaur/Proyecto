<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "owl";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario y se ha hecho clic en el botón "Guardar cambios"
if (isset($_POST["guardar"])) {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nacionalidad = $_POST["nacionalidad"];
    $tipodoc = $_POST["tipodoc"];
    $fdn = $_POST["fdn"];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE Inscripcion SET Nombre='$nombre', Apellidos='$apellido', Nacionalidad='$nacionalidad', Tipo_documento='$tipodoc', Fecha_nacimiento='$fdn' WHERE Numero_documento='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de consultarlog.php después de guardar los cambios
        header("Location: consultarlog.php");
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conn->error;
    }
} else {
    // Obtener el ID del registro a editar
    $id = $_GET["id"];

    // Obtener los datos del registro de la base de datos
    $sql = "SELECT * FROM Inscripcion WHERE Numero_documento='$id'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
        $nombre = $row["Nombre"];
        $apellido = $row["Apellidos"];
        $nacionalidad = $row["Nacionalidad"];
        $tipodoc = $row["Tipo_documento"];
        $fdn = $row["Fecha_nacimiento"];
    } else {
        echo "Registro no encontrado.";
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
    <title>Editar Registro</title>
    <link rel="stylesheet" href="styleviajes.css">
</head>
<body>
    <header>
        <div class="logo">
          <img src="PSG.png" alt="Logo PSG">
        </div>
        <nav class="navi">
          <a href="Consultarlog.php">Regresar</a>
          <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
      </header>
    </header>

    <h1>Editar Registro</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>">
        <input type="text" placeholder="Apellidos" name="apellido" value="<?php echo $apellido; ?>">
        <input type="text" placeholder="Nacionalidad" name="nacionalidad" value="<?php echo $nacionalidad; ?>">
        <input type="text" placeholder="Tipo de documento" name="tipodoc" value="<?php echo $tipodoc; ?>">
        <input type="text" placeholder="Fecha de nacimiento" name="fdn" value="<?php echo $fdn; ?>">
        <input type="submit" name="guardar" value="Guardar cambios">
    </form>
</body>
</html>
