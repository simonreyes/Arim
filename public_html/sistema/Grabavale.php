<?php
{
	$host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 

	  $rfecha1 = "";
	  $rfecha2 = "";
	  $chofer = "";
	  $patente ="";   
      $nombre = $_POST['nombre'];
	  $rfecha1 = $_POST['rfecha1'];
	  $rfecha2 = $_POST['rfecha2'];
      $giro = $_POST['giro'];
      $rut = $_POST['rut'];
	  $direccion = $_POST['direccion'];
	  $rvale1 = $_POST['rvale1'];
	  $rvale2 = $_POST['rvale2'];
	  $cantidadv =$_POST['cantidadv'];
      $detalle = $_POST['detalle'];
      $transporte = $_POST['transporte'];
      $chofer = $_POST['chofer'];
      $patente = $_POST['patente'];
      $cotizacion = $_POST['busqueda'];

	 
	 mysql_query("INSERT INTO vale(nombre, rfecha1, rfecha2, giro, rut, direccion, rangovale1, rangovale2, cantidad, detalle, transporte, patente, chofer, cotizacion) VALUES
	  ('".$nombre."',
	  '".$rfecha1."',
	  '".$rfecha2."',
	  '".$giro."',
	  '".$rut."',
	  '".$direccion."',
	  '".$rvale1."',
	  '".$rvale2."',
	  '".$cantidadv."',
	  '".$detalle."',
	  '".$transporte."',
	  '".$patente."',
	  '".$chofer."',
	  '".$cotizacion."')", $conexion) or die ("INSERT INTO vale(nombre, rfecha1, rfecha2, giro, rut, direccion, rangovale1,rangovale2, cantidad, detalle, transporte, patente, chofer, cotizacion) VALUES
	  ('".$nombre."',
	  '".$rfecha1."',
	  '".$rfecha2."',
	  '".$giro."',
	  '".$rut."',
	  '".$direccion."',
	  '".$rvale1."',
	  '".$rvale2."',
	  '".$cantidadv."',
	  '".$detalle."',
	  '".$valor."',
	  '".$transporte."',
	  '".$patente."',
	  '".$chofer."',
	  '".$cotizacion."')". mysql_error());
				
	header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");
	 }
?>	