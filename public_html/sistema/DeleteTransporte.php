<?php
{
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
	
	$empresa = $_POST['busqueda'];
	$patente = $_POST['busqueda2'];
	 
	 echo $empresa;
	 echo $patente;
	 	
	mysql_query("delete from transchofer WHERE NOMBRETRANS = '$empresa' and PATENTE = '$patente'", $conexion); 
										
										
	header ("Location: VistaGral.php");											
	
	 }
?>	