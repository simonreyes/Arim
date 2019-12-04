<?php
{
	$host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
	 
	 mysql_query("delete from cotizacion WHERE Status = 'Creada' ", $conexion);
	 
	 header ("Location: VistaGral.php");	
	 
	 }
?>	