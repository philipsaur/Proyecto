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
            <a href="Donaciones.html">Regresar</a>
            <a href="excel4.php" class="BtnLogin">Descargar Excel</a>
            <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
        </nav>
    </header>

    <h1>Registro de Donaciones</h1>
    <h4>Se han registrado las siguientes donaciones:</h4>

    <?php
    include_once("registrar.php");
    $sql = "SELECT * FROM donacion";
    echo '<table>
            <tr>
                <th>Id Donación</th>
                <th>Fecha Donación</th>
                <th>Cantidad</th>
                <th>Tipo de Donación</th>
                <th>Nombre Persona</th>
                <th>Nombre Empresa</th>
                <th class="acciones">Acciones</th>
            </tr>';
    if ($rta = $conn->query($sql)) {
        while ($r = $rta->fetch_assoc()) {
            $Id_donacion = $r["Id_donacion"];
            $Fecha_donacion = $r["Fecha_donacion"];
            $Cantidad = $r["cantidad"];
            $Tipo_donacion = $r["Tipo_donacion"];
            $Nombre_per = $r["Nombre_persona_donante"];
            $Nombre_emp = $r["Nombre_empresa_donante"];

            echo "<tr>
                    <td>$Id_donacion</td>
                    <td>$Fecha_donacion</td>
                    <td>$Cantidad</td>
                    <td>$Tipo_donacion</td>
                    <td>$Nombre_per</td>
                    <td>$Nombre_emp</td>
                    <td class='acciones'>
                    <a href='editardon.php?id=$Id_donacion'>Editar</a>
                    <a href='eliminardon.php?id=$Id_donacion'>Eliminar</a>
                  </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>
</body>
</html>