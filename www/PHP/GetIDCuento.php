<?php

include "conexion.php";
mysql_set_charset('utf8'); 

$nombre = $_GET["Nombre"];
$sql = "SELECT ID_Cuentos FROM Cuentos WHERE NombreCuento = '$nombre'";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());

$fila = mysql_num_rows($result);

while($row = mysql_fetch_assoc($result)) {
	$records[] = array_map('utf8_encode',$row);
	
}

echo $_GET['jsoncallback'] . '(' . json_encode( $records) . ');';
mysql_close($con);

?>