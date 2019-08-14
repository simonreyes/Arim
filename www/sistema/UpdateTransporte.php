<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
      $mt3 = $_POST['mt3'];
	  $chofer = $_POST['chofer'];
      $rut = $_POST['rut'];
	  $fono = $_POST['fono'];
	  
	  $empresa = $_POST['busqueda'];
	  $patente = $_POST['busqueda2'];
	 
	 	
	 
	 mysql_query("update transchofer Set MT3 = '$mt3', 
					 					 CHOFER = '$chofer', 
										 RUT = '$rut',
										 FONO = '$fono'
									     WHERE NOMBRETRANS = '$empresa' and PATENTE = '$patente'", $conexion);
										
	
									
										
	header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");											
	
	 }
?>	