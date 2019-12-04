<?php 

$Vusuario = $_POST['usuario'];
$Vcontraseña = $_POST['contrasena'];
$contador = 0;

// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'aridosem_tems', 'aritrans2020')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('aridosem_bd') or die('No se pudo seleccionar la base de datos');

$queryDATOS3 = 'SELECT * 
				FROM usuario
				Where usuario = "'.$Vusuario.'" and contrasena = "'.$Vcontraseña.'"';
$resultDATOS3 = mysql_query($queryDATOS3) or die('Consulta fallida: ' . mysql_error());

while ($row3 = mysql_fetch_array($resultDATOS3, MYSQL_ASSOC)) {
$NombreCliente = $row3['nombre'];
$Perfil = $row3['perfil'];
$contador = $contador + 1; 
}			

 if ($contador == 1 ){
 header ("Location: VistaGral.php?VPerfil=".$Perfil."");
 }else{
 header ("Location: Home.php");	
 }

?>