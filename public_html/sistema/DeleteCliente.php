<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
      $Nombre = $_POST['nombre'];
	  $Direccion = $_POST['direccion'];
      $Rut = $_POST['rut'];
	  $Giro = $_POST['giro'];
      $Obra = $_POST['obra'];
	  $Contacto = $_POST['contacto'];
	  $Correo = $_POST['correo'];
	  $Fono = $_POST['fono'];	
	  $Id = $_POST['id'];		  
	 
	 mysql_query("delete from cliente WHERE IDCLIENTE = '$Id' ", $conexion);
	 
	 header ("Location: VistaGral.php");	
	 
	 }
?>	