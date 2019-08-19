<?php
{
	$idGuia = $_GET['id'];		  
	$Folio = $_GET['folio']; 
	 
	$host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
	 
	mysql_query("delete from Guia_temp WHERE id_user = '$idGuia' and Folio = '$Folio'", $conexion);
	 
	header ("Location: http://www.localhost/arim/public_html/sistema/GuiaDespacho2.php?Vfolio=$Folio");	
	 
	 }
?>	