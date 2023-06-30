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
            <a href="LoginOwlSystem.html">Regresar</a>
            <a href="descargar_excel.php" class="BtnLogin">Descargar Excel</a>
            <a href="index.html"><button class="BtnLogin">Cerrar sesión</button></a>
            

        </nav>
    </header>

    <h1>Directorio Usuarios</h1>
    <h4>Se ha registrado lo siguiente:</h4>

    <?php
    include_once("registrar.php");
    $sql = "SELECT * FROM registrar_usuarios";
    echo '<table>
            <tr>
                <th>Numero de documento</th>
                <th>Contraseña</th>
                <th>Nombre de usuario</th>
                <th>Primer nombre</th>
                <th>Segundo nombre</th>
                <th>Codigo ciudad</th>
                <th>Edad</th>
                <th class="acciones">Acciones</th>
            </tr>';
    if ($rta = $conn->query($sql)) {
        while ($r = $rta->fetch_assoc()) {
            $Num_doc = $r["N_documento"];
            $Contraseña = $r["Contraseña"];
            $Nombre_usuario = $r["Nombre_de_usuario"];
            $Primer_nombre = $r["Primer_nombre"];
            $Segundo_nombre = $r["Segundo_nombre"];
            $Codigo_ciudad = $r["Codigo_ciudad"];
            $Edad = $r["Edad"];

            echo "<tr>
                    <td>$Num_doc</td>
                    <td>$Contraseña</td>
                    <td>$Nombre_usuario</td>
                    <td>$Primer_nombre</td>
                    <td>$Segundo_nombre</td>
                    <td>$Codigo_ciudad</td>
                    <td>$Edad</td>
                    <td class='acciones'>
                        <a href='editarusu.php?id=$Num_doc'>Editar</a>
                        <a href='eliminarusu.php?id=$Num_doc'>Eliminar</a>
                    </td>
                  </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>
</body>

</html>
