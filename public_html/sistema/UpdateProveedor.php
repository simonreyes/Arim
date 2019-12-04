<?php
{
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
      $Nombre = $_POST['nombre'];
	  $Forma = $_POST['forma'];
      $Factura = $_POST['factura'];
	  $Documento = $_POST['documento'];
	  $Id = $_POST['id'];
	  $Sucursal = $_POST['sucursal'];	  
	 
	 mysql_query("update proveedores Set PROVEEDOR = '$Nombre', 
										 FORMAPAGO = '$Forma',
										 GLOSAFACTURA = '$Factura', 
										 GLOSADOCUMENTO = '$Documento',
										 SUCURSAL = '$Sucursal'
									     WHERE IDPROVEEDOR = '$Id' ", $conexion);
										
	$IdContacto = $_POST['idc'];
	$nombreContacto = $_POST['contacto'];
	$fono = $_POST['fono'];
	$correo = $_POST['correo'];	  

										
	mysql_query("update proveedorcontacto Set NOMBRECONTACTO = '$nombreContacto', 
											  FONO = '$fono',
										      CORREO = '$correo'
										      WHERE IDPROVEEDOR = '$Id' AND IDCONTACTO = '$IdContacto' ", $conexion);										
										
	header ("Location: VistaGral.php");											
	
	 }
?>	