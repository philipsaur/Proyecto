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
    $Fecha_novedad = $_POST["FN"];
    $Id_empleado = $_POST["IDE"]; 
    $Tipo_novedad = $_POST["TN"];
    $Comentarios = $_POST["Comen"];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE novedades SET FechaN='$Fecha_novedad', Id_empleado='$Id_empleado', Tipo_novedad='$Tipo_novedad', Comentarios='$Comentarios' WHERE Id_empleado='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de consultarlog.php después de guardar los cambios
        header("Location: consultarnov.php");
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conn->error;
    }
} else {
    // Obtener el ID del registro a editar
    $id = $_GET["id"];

    // Obtener los datos del registro de la base de datos
    $sql = "SELECT * FROM novedades WHERE Id_empleado='$id'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
        $Fecha_novedad = $row["FechaN"];
        $Id_empleado = $row["Id_empleado"]; 
        $Tipo_novedad = $row["Tipo_novedad"];
        $Comentarios = $row["Comentarios"];
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
          <a href="Consultarnov.php">Regresar</a>
          <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
      </header>
    </header>

    <h1>Editar Registro</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="date" name="FN" placeholder="Fecha Novedad" value="<?php echo $Fecha_novedad; ?>">
        <input type="number" name="IDE" placeholder="Id empleado" value="<?php echo $Id_empleado; ?>">
        <input type="text"  name="TN" placeholder="Tipo de Novedad" value="<?php echo $Tipo_novedad; ?>">
        <input type="text" name="Comen" placeholder="Comentarios" value="<?php echo $Comentarios; ?>">
        <input type="submit" name="guardar" value="Guardar cambios">
    </form>
</body>
</html>
