<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   	
	  $Id = $_POST['folio'];
	  

	 mysql_query("update cotizacion set Status = 'Anulada' WHERE Folio = '$Id' ", $conexion);
	 
	 header ("Location: VistaGral.php");	
	 
	 }
?>	