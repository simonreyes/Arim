<?php
{
	$idCoti = $_GET['id'];		  
	$Folio = $_GET['folio']; 
	$idCliente = $_GET['cliente'];
	 
	$host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
	 
	mysql_query("delete from cotizacion WHERE id_user = '$idCoti' ", $conexion);
	 
	header ("Location: http://www.aridosmoreno.cl/sistema/EditaCotizacion2.php?Vidcli=$idCliente&Vfolio=$Folio");	
	 
	 }
?>	