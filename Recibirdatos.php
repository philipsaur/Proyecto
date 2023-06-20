<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directorio";

$conn = new mysqli($servername, $username, $password, $dbname);

 echo "Digite su Nombre: ";
 fscanf (STDIN, "%s", $nombrePer );
 
 echo "Digite su Apellido: ";
 fscanf (STDIN, "%s", $apellidoPer );

 echo "Digite su Email: ";
 fscanf (STDIN, "%s", $emailPer );

 echo "Digite su Telefono: ";
 fscanf (STDIN, "%s", $telefonoPer );

 echo "Digite su Cedula: ";
 fscanf (STDIN, "%s", $cedulaPer );

 echo "Digite su Fecha de nacimiento: ";
 fscanf (STDIN, "%s", $FNPer );

 echo "Digite su Estado civil: ";
 fscanf (STDIN, "%s", $ECPer );

 echo "Digite su Cantidad de hijos: ";
 fscanf (STDIN, "%s", $CIPer );

 echo "Digite su Ciudad: ";
 fscanf (STDIN, "%s", $ciudadPer );

 echo "Digite su Direccion: ";
 fscanf (STDIN, "%s", $direccionPer );


$sql = "INSERT INTO directorio ($nombrePer, $apellidoPer, $emailPer, $telefonoPer, $cedulaPer, $FNPer,$ECPer,$CIPer,$ciudadPer,$direccionPer)";
$sql = "INSERT INTO directorio ()"; 



 if (mysqli_query($conn, $sql)){



 echo "Creado satisfactoriamente ";

} else {

echo "Error: ". $sql . "<br>", mysqli_error($conn);

} mysqli_close($conn); 

?>