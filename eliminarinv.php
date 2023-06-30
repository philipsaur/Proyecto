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

// Verificar si se ha enviado el formulario y se ha hecho clic en el botón "Eliminar"
if (isset($_POST["eliminar"])) {
    // Obtener el ID del registro a eliminar
    $id = $_POST["id"];

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM inventarios WHERE Id_inventario='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página consultartrans.php después de eliminar el registro
        header("Location: consultarinv.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

// Obtener el ID del registro a eliminar
$id = $_GET["id"];

// Obtener los datos del registro de la base de datos
$sql = "SELECT * FROM inventarios WHERE Id_inventario='$id'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    $row = $resultado->fetch_assoc();
    $Id_inventario = $row["Id_inventario"];
    $Fecha_registro = $row["Fecha_registro"];
    $Cantidad = $row["Cantidad"];
    $Id_donacion = $row["Id_donacion"];
    $Archivados = $row["Archivado"];
    $Estado = $row["Estado_material"];
} else {
    echo "Registro no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro</title>
    <link rel="stylesheet" href="styleviajes.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="PSG.png" alt="Logo PSG">
        </div>
        <nav class="navi">
            <a href="consultarinv.php">Regresar</a>
            <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
    </header>

    <h1>Eliminar Registro</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $Id_inventario; ?>">
        <p>¿Estás seguro de que deseas eliminar el siguiente registro?</p>
        <p>Id inventario: <?php echo $Id_inventario; ?></p>
        <p>Fecha de registro: <?php echo $Fecha_registro; ?></p>
        <p>Cantidad: <?php echo $Cantidad; ?></p>
        <p>Id donacion: <?php echo $Id_donacion; ?></p>
        <p>Archivados: <?php echo $Archivados; ?></p>
        <p>Estado: <?php echo $Estado; ?></p>
        <input type="submit" name="eliminar" value="Eliminar">
    </form>
</body>
</html>