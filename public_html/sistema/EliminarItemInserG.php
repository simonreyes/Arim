<?php
{
	$idGuia = $_GET['id'];		  
	$Folio = $_GET['folio']; 
	 
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
	 
	mysql_query("delete from Guia_temp WHERE id_user = '$idGuia' and Folio = '$Folio'", $conexion);
	 
	header ("Location: http://www.aridosmoreno.cl/sistema/GuiaDespacho2.php?Vfolio=$Folio");	
	 
	 }
?>	