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
        .btn {
            background-color: rgb(231, 141, 39);
            color: #fff;
            width: 76%;
            height: 35px;
            margin: 0 10%;
            margin-top: 22px;
            border: none;
            font-size: 16px;
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
          <a href="Novedades.html">Regresar</a>
          <a href="excel1.php" class="BtnLogin">Descargar Excel</a>
          <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
          
        </nav>
      </header>
    </header>

    <h1>Registro Novedades</h1>
    <h4>Se ha registrado lo siguiente:</h4>

    <?php
    include_once("registrar.php");
    $sql = "SELECT * FROM novedades";
    echo '<table>
            <tr>
                <th>Fecha Novedad</th>
                <th>Id empleado</th>
                <th>Tipo Novedad</th>
                <th>Comentarios</th>
                <th class="acciones">Acciones</th>
            </tr>';
    if ($rta = $conn->query($sql)) {
        while ($ro = $rta->fetch_assoc()) {
            $Fecha_novedad = $ro["FechaN"];
            $Id_empleado = $ro["Id_empleado"]; 
            $Tipo_novedad = $ro["Tipo_novedad"];
            $Comentarios = $ro["Comentarios"];

            echo "<tr>
                    <td>$Fecha_novedad</td>
                    <td>$Id_empleado</td>
                    <td>$Tipo_novedad</td>
                    <td>$Comentarios</td>
                    <td class='acciones'>
                        <a href='editarnovedad.php?id=$Id_empleado'>Editar</a>
                        <a href='eliminarnovedad.php?id=$Id_empleado'>Eliminar</a>
                    </td>
                  </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>
</body>
</html>