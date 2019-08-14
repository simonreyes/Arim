<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
      $Nombre = $_POST['nombre'];
	  $Rut = $_POST['rut'];
	  $Usuario = $_POST['usuario'];
      $Contra = $_POST['contrasena'];
	  $Perfil = $_POST['perfil'];		
	  $Fecha = date('Y-m-d');
	  $Glosa = ' ';	  
	  $Id = $_POST['id'];	
	  
	 mysql_query("update usuario Set 	USUARIO = '$Usuario', 
										CONTRASENA = '$Contra', 
										NOMBRE = '$Nombre',
										RUT = '$Rut',										
										PERFIL = '$Perfil'
										WHERE idUser = '$Id' ", $conexion);
										
	header ("Location: http://www.aridosmoreno.cl/sistema/VistaMante.php");										
	 
	 }
?>	