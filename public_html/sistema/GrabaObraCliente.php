<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
    $Nombre = Trim($_POST['cliente']);
	  
	$Obra1 = $_POST['obra1'];
	$Obra2 = $_POST['obra2'];
	$Obra3 = $_POST['obra3'];
	$Obra4 = $_POST['obra4'];
	$Obra5 = $_POST['obra5'];
	$Obra6 = $_POST['obra6'];
	
	$dir1 = $_POST['dir1'];
	$dir2 = $_POST['dir2'];
	$dir3 = $_POST['dir3'];
	$dir4 = $_POST['dir4'];
	$dir5 = $_POST['dir5'];
	$dir6 = $_POST['dir6'];
	 
	$cont1 = $_POST['cont1'];
	$cont2 = $_POST['cont2'];
	$cont3 = $_POST['cont3'];
	$cont4 = $_POST['cont4'];
	$cont5 = $_POST['cont5'];
	$cont6 = $_POST['cont6'];
	
	$fono1 = $_POST['fono1'];
	$fono2 = $_POST['fono2'];
	$fono3 = $_POST['fono3'];
	$fono4 = $_POST['fono4'];
	$fono5 = $_POST['fono5'];
	$fono6 = $_POST['fono6'];
	
	$email1 = $_POST['email1'];
	$email2 = $_POST['email2'];
	$email3 = $_POST['email3'];
	$email4 = $_POST['email4'];
	$email5 = $_POST['email5'];
	$email6 = $_POST['email6'];
					
	IF($Obra1 <> "") {			
	mysql_query("insert into clienteobras(nombrecliente, nombreobra, dirobra, contacto, fono, email)
	VALUES ('$Nombre', '$Obra1', '$dir1', '$cont1', '$fono1', '$email1')", $conexion);
	}
	IF($Obra2 <> "") {
	mysql_query("insert into clienteobras(nombrecliente, nombreobra, dirobra, contacto, fono, email)
	VALUES ('$Nombre', '$Obra2', '$dir2', '$cont2', '$fono2', '$email2')", $conexion);
	}
	IF($Obra3 <> "") {
	mysql_query("insert into clienteobras(nombrecliente, nombreobra, dirobra, contacto, fono, email)
	VALUES ('$Nombre', '$Obra3', '$dir3', '$cont3', '$fono3', '$email3')", $conexion);
	}
	IF($Obra4 <> "") {
	mysql_query("insert into clienteobras(nombrecliente, nombreobra, dirobra, contacto, fono, email)
	VALUES ('$Nombre', '$Obra4', '$dir4', '$cont4', '$fono4', '$email4')", $conexion);
	}
	IF($Obra5 <> "") {
	mysql_query("insert into clienteobras(nombrecliente, nombreobra, dirobra, contacto, fono, email)
	VALUES ('$Nombre', '$Obra5', '$dir5', '$cont5', '$fono5', '$email5')", $conexion);
	}
	IF($Obra6 <> "") {
	mysql_query("insert into clienteobras(nombrecliente, nombreobra, dirobra, contacto, fono, email)
	VALUES ('$Nombre', '$Obra6', '$dir6', '$cont6', '$fono6', '$email6')", $conexion);
	}
	header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");	
	 
	}
?>	