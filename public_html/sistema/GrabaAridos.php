<?php
{
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
      $Nombre = $_POST['nombre'];
	  $Valor = $_POST['valor'];
      $Proveedor = $_POST['proveedor']; 
	  $Sucursal = $_POST['sucursal']; 
	 
	 mysql_query("insert into aridos (	idProveedor, glosa, valor, sucursal)
            	 VALUES ('$Proveedor', '$Nombre', '$Valor', '$Sucursal')", $conexion);
				
	header ("Location: VistaGral.php");	
	 
	 }
?>	