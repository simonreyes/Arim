<?php
{
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
    $Nombre = trim($_POST['nombre']);
	$mt3 = $_POST['mt3'];
    $chofer = $_POST['Chofer'];
	$rut = $_POST['Rut'];
    $fono = $_POST['fono'];
	$patente = trim($_POST['Patente']);
		
	if ($mt3 <> "" and $patente <> "" and $chofer <> ""){
	mysql_query("insert into transchofer(NOMBRETRANS, MT3, PATENTE, CHOFER, RUT, FONO)
	VALUES ( '$Nombre', '$mt3', '$patente', '$chofer', '$rut', '$fono')", $conexion);
	}
	
		header ("Location: VistaGral.php");				
	 
	 }
?>	