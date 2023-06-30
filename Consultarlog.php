<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link rel="stylesheet" href="styleviajes.css">
    <style>
        /* Estilos para la tabla y las acciones */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .acciones {
            text-align: center;
        }

        .acciones a {
            margin-right: 5px;
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
    <header>
    <div class="logo">
          <img src="PSG.png" alt="Logo PSG">
        </div>
        <nav class="navi">
          <a href="LoginOwlSystem.html">Regresar</a>
          <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
      </header>
    </header>

    <h1>Registro Inscripcion</h1>
    <h4>Se ha registrado lo siguiente:</h4>

    <?php
    include_once("registrar.php");
    $sql = "SELECT * FROM Inscripcion";
    echo '<table>
            <tr>
                <th>Numero de documento</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Nacionalidad</th>
                <th>Tipo de documento</th>
                <th>Fecha de nacimiento</th>
                <th class="acciones">Acciones</th>
            </tr>';
    if ($rta = $conn->query($sql)) {
        while ($r = $rta->fetch_assoc()) {
            $Numdoc = $r["Numero_documento"];
            $Nombre = $r["Nombre"];
            $Apellido = $r["Apellidos"];
            $Nacionalidad = $r["Nacionalidad"];
            $Tipodoc = $r["Tipo_documento"];
            $Fecha_nac = $r["Fecha_nacimiento"];

            echo "<tr>
                    <td>$Numdoc</td>
                    <td>$Nombre</td>
                    <td>$Apellido</td>
                    <td>$Nacionalidad</td>
                    <td>$Tipodoc</td>
                    <td>$Fecha_nac</td>
                    <td class='acciones'>
                        <a href='editarregistro.php?id=$Numdoc'>Editar</a>
                        <a href='eliminarregis.php?id=$Numdoc'>Eliminar</a>
                    </td>
                  </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>
</body>
</html>
