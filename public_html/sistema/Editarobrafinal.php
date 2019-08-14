<?php
	{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
    $idobra = trim($_POST['idobra']);
	$idcliente = $_POST['id'];
	
    $dirobra = $_POST['dirobra'];
    $contacto = $_POST['contacto'];
	$fono = trim($_POST['fono']);
	$email = trim($_POST['email']);
	
	echo "<BR>";
	echo $idobra;
	echo "<BR>";
	echo $idcliente;
	echo "<BR>";
	echo $dirobra;
	echo "<BR>";
	echo $contacto;
	echo "<BR>";
	echo $fono;
	echo "<BR>";
	echo $email;
	
	
	$submitted =  trim($_POST['guardar']);
	$submitted2 = trim($_POST['eliminar']);
	
	Echo $submitted;
	Echo $submitted2;
	
	if ($submitted == 'Actualizar') 
	 {
	mysql_query("update clienteobras Set DIROBRA = '$dirobra', CONTACTO = '$contacto', FONO = '$fono', EMAIL = '$email'
				WHERE NOMBRECLIENTE = '$idcliente' AND IDOBRA = '$idobra' ", $conexion);
	 }
									
	if ($submitted2 == 'Eliminar')
	{
	mysql_query("delete from clienteobras WHERE NOMBRECLIENTE = '$idcliente' AND IDOBRA = '$idobra' ", $conexion);
	}									
	
	header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");				
	 
	 }
?>