<?php
require_once("registrar.php");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ReporteDonaciones.xls");

$sql = "SELECT * FROM donacion";
    echo '<table>
            <tr>
                <th>Id Donación</th>
                <th>Fecha Donación</th>
                <th>Cantidad</th>
                <th>Tipo de Donación</th>
                <th>Nombre Persona Donante</th>
                <th>Nombre Empresa Donante</th>
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
                    </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>
</body>
</html>