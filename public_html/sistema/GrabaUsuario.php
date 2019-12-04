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
	 
	 mysql_query("insert into usuario (	USUARIO, 
										CONTRASENA, 
										NOMBRE,
										RUT,										
										FECHA,
										PERFIL, 
										GLOSAPERFIL)
	 VALUES ( 	'$Usuario',
				'$Contra',
				'$Nombre',
				'$Rut',
				'$Fecha',
				'$Perfil',
				'$Glosa')", $conexion);
				
	header ("Location: VistaMante.php");	

	 }
?>	