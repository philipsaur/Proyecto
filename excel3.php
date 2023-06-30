<?php
require_once("registrar.php");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ReporteTransporte.xls");
$sql = "SELECT * FROM transporte";
    echo '<table>
            <tr>
                <th>Fecha Viajes</th>
                <th>Id conductor</th>
                <th>Id transporte</th>
                <th>Cantidad beneficiarios</th>
                <th>Destino</th>
                <th>Conductor</th>
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
                  </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>