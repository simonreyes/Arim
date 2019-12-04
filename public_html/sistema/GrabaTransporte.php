<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
    $Nombre = $_POST['nombre'];
	$fono1 = $_POST['fono1'];
    $fono2 = $_POST['fono2'];
	$correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
	$ciudad = $_POST['ciudad'];
	$Banco = $_POST['banco'];
	$deposito = $_POST['deposito'];
	$cuenta = $_POST['cuenta'];
	$obs = $_POST['obs'];	  
	 
	if ($Nombre <> "" ){
	 mysql_query("insert into transporte(NOMBRE, FONO1, FONO2, CORREO, DIRECCION, CIUDAD, BANCO, DEPOSITO, CUENTA, OBS )
	 VALUES ( '$Nombre', '$fono1', '$fono2', '$correo', '$direccion', '$ciudad', '$Banco', '$deposito', '$cuenta', '$obs')", $conexion);
	}	
	
	$link = mysql_connect('localhost', 'nikovald', 'arimoreno2016') or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('nikovald_aridos') or die('No se pudo seleccionar la base de datos');  
 
	$queryDATOS2 = 'SELECT idnombre FROM transporte WHERE nombre = "'.$Nombre.'"';
	$resultDATOS2 = mysql_query($queryDATOS2) or die('Consulta fallida: ' . mysql_error());
	while ($row2 = mysql_fetch_array($resultDATOS2, MYSQL_ASSOC)) 
	{  
	$idnombre = $row2['idnombre'];
	}
	
	$MT3 = $_POST['MT3'];
	$Patente = $_POST['Patente'];
	$Chofer = $_POST['Chofer'];
	$Rut = $_POST['Rut'];
	$fono = $_POST['fono'];	  
	
	if ($MT3 <> "" and $Patente <> "" and $Chofer <> ""){
	mysql_query("insert into transchofer(NOMBRETRANS, MT3, PATENTE, CHOFER, RUT, FONO)
	VALUES ( '$idnombre', '$MT3', '$Patente', '$Chofer', '$Rut', '$fono')", $conexion);
	}
	
	$MT32 = $_POST['MT32'];
	$Patente2 = $_POST['Patente2'];
	$Chofer2 = $_POST['Chofer2'];
	$Rut2 = $_POST['Rut2'];
	$fono2 = $_POST['fono2'];	  
	
	if ($MT32 <> "" and $Patente2 <> "" and $Chofer2 <> ""){
	mysql_query("insert into transchofer(NOMBRETRANS, MT3, PATENTE, CHOFER, RUT, FONO)
	VALUES ( '$idnombre', '$MT32', '$Patente2', '$Chofer2', '$Rut2', '$fono2')", $conexion);
	}
	$MT33 = $_POST['MT33'];
	$Patente3 = $_POST['Patente3'];
	$Chofer3 = $_POST['Chofer3'];
	$Rut3 = $_POST['Rut3'];
	$fono3 = $_POST['fono3'];	  
	
	if ($MT33 <> "" and $Patente3 <> "" and $Chofer3 <> ""){
	mysql_query("insert into transchofer(NOMBRETRANS, MT3, PATENTE, CHOFER, RUT, FONO)
	VALUES ( '$idnombre', '$MT33', '$Patente3', '$Chofer3', '$Rut3', '$fono3')", $conexion);
	}
	
	$MT34 = $_POST['MT34'];
	$Patente4 = $_POST['Patente4'];
	$Chofer4 = $_POST['Chofer4'];
	$Rut4 = $_POST['Rut4'];
	$fono4 = $_POST['fono4'];	  
	
	if ($MT34 <> "" and $Patente4 <> "" and $Chofer4 <> ""){
	mysql_query("insert into transchofer(NOMBRETRANS, MT3, PATENTE, CHOFER, RUT, FONO)
	VALUES ( '$idnombre', '$MT34', '$Patente4', '$Chofer4', '$Rut4', '$fono4')", $conexion);
	}
	
	$MT35 = $_POST['MT35'];
	$Patente5 = $_POST['Patente5'];
	$Chofer5 = $_POST['Chofer5'];
	$Rut5 = $_POST['Rut5'];
	$fono5 = $_POST['fono5'];	
	
	if ($MT35 <> "" and $Patente5 <> "" and $Chofer5 <> ""){
	mysql_query("insert into transchofer(NOMBRETRANS, MT3, PATENTE, CHOFER, RUT, FONO)
	VALUES ( '$idnombre', '$MT35', '$Patente5', '$Chofer5', '$Rut5', '$fono5')", $conexion);
	}
	$MT36 = $_POST['MT36'];
	$Patente6 = $_POST['Patente6'];
	$Chofer6 = $_POST['Chofer6'];
	$Rut6 = $_POST['Rut6'];
	$fono6 = $_POST['fono6'];	  
	
	if ($MT36 <> "" and $Patente6 <> "" and $Chofer6 <> ""){
	mysql_query("insert into transchofer(NOMBRETRANS, MT3, PATENTE, CHOFER, RUT, FONO)
	VALUES ( '$idnombre', '$MT36', '$Patente6', '$Chofer6', '$Rut6', '$fono6')", $conexion);
	}

	
	header ("Location: VistaGral.php");				
	 
	 
	 }
?>	