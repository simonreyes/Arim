<?php
{
	$host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   	
	  $eliminar = $_POST['rangoeliminar'];
	  

	 mysql_query("DELETE FROM vale WHERE rangovale1 = '$eliminar'", $conexion);
	 
	 header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");	
	 
	 }
?>	