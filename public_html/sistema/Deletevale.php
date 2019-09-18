<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   	
	  $eliminar = $_POST['foliob'];
	  
	 mysql_query("DELETE FROM vale WHERE folio = '$eliminar'", $conexion);
	 
	 header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");	
	 
	 }
?>	