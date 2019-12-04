<?php
{
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   	
	  $Id = $_POST['folio'];
	  

	 mysql_query("update cotizacion set Status = 'Anulada' WHERE Folio = '$Id' ", $conexion);
	 
	 header ("Location: VistaGral.php");	
	 
	 }
?>	