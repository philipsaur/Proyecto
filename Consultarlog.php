<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link rel="stylesheet" href="styleviajes.css">
</head>
<body>

<header>
  <div class="logo">
    <img src="PSG.png" alt="Logo PSG">
  </div>
    <style>
/* Estilos para la tabla */
table {
  width: 100%;
  border-collapse: collapse;
}

/* Estilos para el encabezado de la tabla */
th {
  background-color: #f2f2f2;
  color: #333;
  font-weight: bold;
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ccc;
}

/* Estilos para las celdas de la tabla */
td {
  padding: 10px;
  border-bottom: 1px solid #ccc;
}

/* Estilos para las filas impares de la tabla */
tr:nth-child(odd) {
  background-color: #f9f9f9;
}
input[type="submit"] {
  padding: 10px 20px;
  background-color: red;
  color: yellow;
  border: none;
  border-radius: 15px;
  cursor: pointer;
}

        </style>
</head>
<body>
    <h1>Registro Directorio</h1>
    <h4>Se ha registrado lo siguiente: </h4>
    <div>
</div>
    <?php
    include_once ("registrar.php");
    $sql = "SELECT * FROM Inscripcion";
    echo '<table>
            <tr>
            <th> Numero de documento </th>
            <th> Nombre </th>
            <th> Apellidos </th>
            <th> Nacionalidad </th>
            <th> Tipo de documanto </th>
            <th> Fecha de nacimiento </th>
            <th> Telefono </th>
            <th> Correo </th>
    
    </tr>';
    if($rta = $conn -> query($sql)){
        while($r = $rta -> fetch_assoc()){
            $Numdoc = $r["Numero_documento"];
            $Nombre = $r["Nombre"];
            $Apellido = $r["Apellidos"];
            $Nacionalidad = $r["Nacionalidad"];
            $Tipodoc = $r["Tipo_documento"];
            $Fecha_nac = $r["Fecha_nacimiento"];
            $Telefono = $r["Contacto_telefonico"];
            $Correo = $r["Email"];
            

        echo "<tr>
            <td> $Numdoc</td>
            <td> $Nombre</td>
            <td> $Apellido</td>
            <td> $Nacionalidad</td>
            <td> $Tipodoc</td>
            <td> $Fecha_nac</td>
            <td> $Telefono</td>
            <td> $Correo</td>
            </tr>";
        }
        $rta -> free();
    }
    ?>
    
</body>
</html>