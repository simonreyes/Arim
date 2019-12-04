<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

  
	$Aridos = $_POST['estado'];
	$Valor = $_POST['nvalor'];
    $Proveedor = $_POST['pais']; 
	$Sucursal = $_POST['nsucursal']; 

	
		
	$conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
	
	mysql_query("update aridos Set valor = '$Valor', sucursal = '$Sucursal' WHERE idProveedor = '$Proveedor' and idAridos = '$Aridos' ", $conexion);				 
				 
	header ("Location: VistaGral.php");
	 
	 }
?>	