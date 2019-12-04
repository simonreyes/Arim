<?php
{
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
      $Nombre = $_POST['nombre'];
	  $Direccion = $_POST['direccion'];
      $Rut = $_POST['rut'];
	  $Giro = $_POST['giro'];
      $Contacto = $_POST['contacto'];
	  $Correo = $_POST['correo'];
	  $Fono = $_POST['fono'];	
	  $Id = $_POST['id'];
	  $Ciudad = $_POST['ciudad'];	  
	 
	 mysql_query("update cliente Set NOMBRE_CLIENTE = '$Nombre', 
										DIRECCION = '$Direccion',
										RUT = '$Rut', 
										CIUDAD = '$Ciudad', 
										GIRO = '$Giro',
										CONTACTO = '$Contacto', 
										CORREO = '$Correo', 
										FONO = '$Fono'
										WHERE IDCLIENTE = '$Id' ", $conexion);
										
	header ("Location: VistaGral.php");										
	 
	 }
?>	