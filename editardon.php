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
    $Id_donacion = $_POST["id"];
    $Fecha_donacion = $_POST["fecha_donacion"];
    $Cantidad = $_POST["cantidad"];
    $Tipo_donacion = $_POST["Tipo_donacion"];
    
    $sql = "UPDATE donacion SET Fecha_donacion = '$Fecha_donacion', Cantidad = '$Cantidad', Tipo_donacion = '$Tipo_donacion' WHERE Id_donacion = '$Id_donacion'";


    if ($conn->query($sql) === TRUE) {
        header("Location: consultadon.php");
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conn->error;
    }
} else {
    $Id_donacion = $_GET["id"];
    $sql = "SELECT * FROM donacion WHERE Id_donacion = '$Id_donacion'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
        $Fecha_donacion = $row["Fecha_donacion"];
        $Cantidad = $row["cantidad"];
        $Tipo_donacion = $row["Tipo_donacion"];
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
          <a href="consultadon.php">Regresar</a>
          <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
    </header>

    <h1>Editar Registro</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $Id_donacion; ?>">
        <input type="text" placeholder="Fecha de Donación" name="fecha_donacion" value="<?php echo $Fecha_donacion; ?>">
        <input type="text" placeholder="Cantidad" name="cantidad" value="<?php echo $Cantidad; ?>">
        <select name="Tipo_donacion">
        <option value="">Tipo de Donacion</option>
        <option value="Monetaria">Monetaria</option>
        <option value="Material">Material</option>
      </select>
      <br><br>
        <input type="submit" name="guardar" value="Guardar cambios">
    </form>
</body>
</html>
