<?php
var_dump($_POST);
{
	$host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 

	  $transporte = "";
	  $patente ="";
	  $chofer = "";
	  $folio = "";
	  $fecha = "";
	  $cantidad = "";
	  $detalle ="";
      $transporte = $_POST['transporte'];
	  $patente = $_POST['patente'];
	  $chofer = $_POST['chofer'];
	  $folio = $_POST['folio'];
	  $fechar = $_POST['fecha'];
	  $date = str_replace('/', '-', $fechar);
   	  $phpdate = strtotime($date);
   	  $fecha = date('Y-m-d', $phpdate);	        
      $cantidadv =$_POST['cantidadv'];
      $detalle = $_POST['detalle'];
	 
	 mysql_query("INSERT INTO vale(transporte, patente, chofer, folio, fecha, cantidad, detalle) VALUES
	  ('".$transporte."',
	  '".$patente."',
	  '".$chofer."',
	  '".$folio."',
	  '".$fecha."',
	  '".$cantidadv."',
	  '".$detalle."')", $conexion) or die ("INSERT INTO vale(transporte, patente, chofer, folio, fecha, cantidad, detalle) VALUES
	  ('".$transporte."',
	  '".$patente."',
	  '".$chofer."',
	  '".$folio."',
	  '".$fecha."',
	  '".$cantidadv."',
	  '".$detalle."')". mysql_error());
				
	header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");
	 }
?>	