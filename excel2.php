<?php
require_once("registrar.php");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ReporteInventarios.xls");

$sql = "SELECT * FROM inventarios";
    echo '<table>
            <tr>
                <th>Id inventario</th>
                <th>Fecha registro</th>
                <th>Cantidad</th>
                <th>Id donacion</th>
                <th>Archivado</th>
                <th>Estado</th>
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
                </td>
                
                  </tr>";
        }
        $rta->free();
    }
    echo '</table>';
    ?>