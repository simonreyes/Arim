<?php
{
	$host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
      $mt3 = $_POST['mt3'];
	  $chofer = $_POST['chofer'];
      $rut = $_POST['rut'];
	  $fono = $_POST['fono'];
	  
	  $empresa = $_POST['busqueda'];
	  $patente = $_POST['busqueda2'];
	 
	 	
	 
	 mysql_query("insert into transchofer(NOMBRETRANS, MT3, PATENTE, CHOFER, RUT, FONO)
	VALUES ( '$empresa', '$mt3', '$patente', '$chofer', '$rut', '$fono')",$conexion) or die (mysql_error() . "error insert into transchofer ('nombretrans','mt3','patente','chofer','rut','fono') values 
	 									  ('$empresa', '".$patente."', '".$chofer."', '".$rut."', '".$fono."')");	

	header ("Location: VistaGral.php");	
	
	 }
?>	