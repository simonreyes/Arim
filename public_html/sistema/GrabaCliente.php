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
	  $Ciudad = $_POST['ciudad'];	
	  
	mysql_query("insert into cliente (	NOMBRE_CLIENTE, 
										DIRECCION, 
										RUT, 
										CIUDAD,
										GIRO, 
										CONTACTO, 
										CORREO, 
										FONO )
	 VALUES ( 	'$Nombre',
				'$Direccion',
				'$Rut',
				'$Ciudad',
				'$Giro',
				'$Contacto',
				'$Correo',
				'$Fono')", $conexion);
			
	

	header ("Location: VistaGral.php");	
	 
	}
?>	