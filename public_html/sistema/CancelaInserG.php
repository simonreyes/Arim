<?php
{
			  
	$Folio = $_POST['busqueda']; 
	 
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
	mysql_query("delete from Guia_temp WHERE Folio = '$Folio'", $conexion);
	 
	header ("Location: VistaGral.php");	
	 
	 }
?>	