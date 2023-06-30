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
          <a href="Inventarios.html">Regresar</a>
          <a href="excel2.php" class="BtnLogin">Descargar Excel</a>
          <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
      </header>
    </header>

    <h1>Registro inventario</h1>
    <h4>Se han registrado lo siguiente en los inventarios :</h4>

    <?php
    include_once("registrar.php");
    $sql = "SELECT * FROM inventarios";
    echo '<table>
            <tr>
                <th>Id inventario</th>
                <th>Fecha registro</th>
                <th>Cantidad</th>
                <th>Id donacion</th>
                <th>Archivado</th>
                <th>Estado</th>
                <th class="acciones">Acciones</th>
            </tr>';
    if ($rta = $conn->query($sql)) {
        while ($r = $rta->fetch_assoc()) {
            $Id_inventario = $r["Id_inventario"];
            $Fecha_registro = $r["Fecha_registro"]; 
            $Cantidad = $r["Cantidad"];
            $Id_donacion = $r["Id_donacion"];
            $Archivados = $r["Archivado"];
            $Estado = $r["Estado_material"];

            echo "<tr>
                    <td>$Id_inventario</td>
                    <td>$Fecha_registro</td>
                    <td>$Cantidad</td>
                    <td>$Id_donacion</td>
                    <td>$Archivados</td>
                    <td>$Estado</td>
                    <td class='acciones'>
                    <a href='editarinv.php?id=$Id_inventario'>Editar</a>
                    <a href='eliminarinv.php?id=$Id_inventario'>Eliminar</a>
                </td>
                
                  </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>
</body>
</html>