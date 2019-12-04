<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
	$num_guia = "";
	$num_cot = "";  
    $num_guia = $_POST['busqueda'];
	$num_cot = $_POST['folio'];
		  
	echo 	$num_guia;
	echo 	$num_cot;	
		  
	mysql_query("update Guia Set Status = 'Anulada', id_user = '0', Folio = '0'
										WHERE Num_Guia = '$num_guia' ", $conexion);
										
	mysql_query("update cotizacion Set Status = 'Abierta'
										WHERE Folio = '$num_cot' ", $conexion);
										
	header ("Location: VistaGral.php");										
	 
	 }
?>	