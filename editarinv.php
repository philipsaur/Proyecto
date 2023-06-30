<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "owl";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Id_inventario = $_POST["IDI"];
    $Fecha_registro = $_POST["FD"]; 
    $Cantidad = $_POST["Cantidad"];
    $Id_donacion = $_POST["IDD"];
    $Archivados = $_POST["Archivados"];
    $Estado = $_POST["EM"];

    $sql = "UPDATE inventarios SET Id_inventario='$Id_inventario', Fecha_registro='$Fecha_registro', Cantidad='$Cantidad', Id_donacion='$Id_donacion', Archivado='$Archivados', Estado_material='$Estado' WHERE Id_inventario='$Id_inventario'";

    if ($conn->query($sql) === TRUE) {
        header("Location: consultarinv.php");
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conn->error;
    }
} else {
    $Id_inventario = $_GET["id"];
    $sql = "SELECT * FROM inventarios WHERE Id_inventario='$Id_inventario'";
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
          <a href="Consultartrans.php">Regresar</a>
          <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
    </header>

    <h1>Editar Registro</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="IDI" value="<?php echo $Id_inventario; ?>">
        <input type="date" name="FD" placeholder="Fecha Novedad" value="<?php echo $Fecha_registro; ?>">
        <input type="number" name="Cantidad" placeholder="Id empleado" value="<?php echo $Cantidad; ?>">
        <input type="text"  name="IDD" placeholder="Tipo de Novedad" value="<?php echo $Id_donacion; ?>">
        <input type="text" name="Archivados" placeholder="Comentarios" value="<?php echo $Archivados; ?>">
        <select name="EM">
            <option>Estado de material</option>
            <option>Bueno</option>
            <option>Malo</option>
        <input type="submit" name="guardar" value="Guardar cambios">
    </form>
</body>
</html>