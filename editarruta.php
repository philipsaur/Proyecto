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
    $Id_conductor = $_POST["Id_conductor"];
    $Fecha_viajes = $_POST["Fecha_viajes"];
    $Id_transporte = $_POST["Id_transporte"];
    $Cantidad_bene = $_POST["Cantidad_bene"];
    $Destino = $_POST["Destino"];
    $Nombre_conductor = $_POST["Nombre_conductor"];

    $sql = "UPDATE transporte SET Fecha_viajes='$Fecha_viajes', Id_transporte='$Id_transporte', Cantidad_ben='$Cantidad_bene', Destino='$Destino', Nombre_cond='$Nombre_conductor' WHERE Id_conductor='$Id_conductor'";

    if ($conn->query($sql) === TRUE) {
        header("Location: consultartrans.php");
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conn->error;
    }
} else {
    $Id_conductor = $_GET["id"];
    $sql = "SELECT * FROM transporte WHERE Id_conductor='$Id_conductor'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
        $Fecha_viajes = $row["Fecha_viajes"];
        $Id_transporte = $row["Id_transporte"];
        $Cantidad_bene = $row["Cantidad_ben"];
        $Destino = $row["Destino"];
        $Nombre_conductor = $row["Nombre_cond"];
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
        <input type="hidden" name="Id_conductor" value="<?php echo $Id_conductor; ?>">
        <label for="Fecha_viajes">Fecha de Viajes:</label><br>
        <input type="date" id="Fecha_viajes" name="Fecha_viajes" value="<?php echo $Fecha_viajes; ?>">
        <label for="Id_transporte">ID de Transporte:</label><br>
        <input type="text" id="Id_transporte" name="Id_transporte" value="<?php echo $Id_transporte; ?>">
        <label for="Cantidad_bene">Cantidad de Beneficiarios:</label><br>
        <input type="text" id="Cantidad_bene" name="Cantidad_bene" value="<?php echo $Cantidad_bene; ?>">
        <label for="Destino">Destino:</label><br>
        <input type="text" id="Destino" name="Destino" value="<?php echo $Destino; ?>"><br>
        <label for="Nombre_conductor">Nombre del Conductor:</label><br>
        <input type="text" id="Nombre_conductor" name="Nombre_conductor" value="<?php echo $Nombre_conductor; ?>">
        <input type="submit" name="guardar" value="Guardar cambios">
    </form>
</body>
</html>
