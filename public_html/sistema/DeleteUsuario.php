<?php
{
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

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
	 
	 mysql_query("delete from usuario WHERE idUser = '$Id' ", $conexion);
	 
	 header ("Location: VIstaMante.php");		
	 
	 }
?>	