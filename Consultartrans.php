<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link rel="stylesheet" href="styleviajes.css">
    <style>
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
          <a href="Transporte.html">Regresar</a>
          <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
      </header>
    </header>

    <h1>Registro Rutas</h1>
    <h4>Se han registrado las siguientes rutas:</h4>

    <?php
    include_once("registrar.php");
    $sql = "SELECT * FROM transporte";
    echo '<table>
            <tr>
                <th>Fecha Viajes</th>
                <th>Id conductor</th>
                <th>Id transporte</th>
                <th>Cantidad beneficiarios</th>
                <th>Destino</th>
                <th>Conductor</th>
                <th class="acciones">Acciones</th>
            </tr>';
    if ($rta = $conn->query($sql)) {
        while ($r = $rta->fetch_assoc()) {
            $Fecha_viajes = $r["Fecha_viajes"];
            $Id_conductor = $r["Id_conductor"];
            $Id_transporte = $r["Id_transporte"];
            $Cantidad_bene = $r["Cantidad_ben"];
            $Destino = $r["Destino"];
            $Nombre_conductor = $r["Nombre_cond"];

            echo "<tr>
                    <td>$Fecha_viajes</td>
                    <td>$Id_conductor</td>
                    <td>$Id_transporte</td>
                    <td>$Cantidad_bene</td>
                    <td>$Destino</td>
                    <td>$Nombre_conductor</td>
                    <td class='acciones'>
                    <a href='editarruta.php?id=$Id_conductor'>Editar</a>
                    <a href='eliminarruta.php?id=$Id_transporte'>Eliminar</a>
                </td>
                
                  </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>
</body>
</html>