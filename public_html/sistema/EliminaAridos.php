<?php
{
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

  
	$Aridos = $_POST['estado'];
    $Proveedor = $_POST['pais']; 
	
		
	$conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
	
	
	mysql_query("delete from aridos WHERE idProveedor = '$Proveedor' and idAridos = '$Aridos' ", $conexion);
	
		
	header ("Location: VistaGral.php");
	 
	 }
?>	