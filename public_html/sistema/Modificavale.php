<?php
var_dump($_POST);
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
	  $rfecha1 = date('Y-m-d H:i:s');
	  $rfecha2 = date('Y-m-d H:i:s');
      $giro = $_POST['giro'];
      $rut = $_POST['rut'];
	  $direccion = $_POST['direccion'];
	  $rangovale1 = $_POST['rangov1'];
	  $rangovale2 = $_POST['rangovale2'];
	  $cantidadv =$_POST['cantidadv'];
      $detalle = $_POST['detalle'];
      $transporte = $_POST['transporte'];
      $patente = $_POST['patente'];
      $chofer = $_POST['chofer'];
      $cotizacion = $_POST['busqueda'];
      $rbuscar = $_POST['rangobuscar'];

      if(empty($_POST['transporte']))
      {
      mysql_query ('UPDATE vale SET nombre="'. $nombre .'", rfecha1 = "'. $rfecha1.'", rfecha2= "'.$rfecha2.'", giro = "'. $giro.'", rut ="'.$rut.'", direccion = "'.$direccion.'" , rangovale1= "'.$rangovale1.'", rangovale2= "'.$rangovale2.'", cantidad= "'.$cantidadv.'", detalle= "'.$detalle.'", cotizacion= "'.$cotizacion.'" WHERE rangovale1 = "'.$rbuscar.'"') or die ( 'UPDATE vale SET nombre="'. $nombre .'", rfecha1 = "'. $rfecha1.'", rfecha2= "'.$rfecha2.'", giro = "'. $giro.'", rut ="'.$rut.'", direccion = "'.$direccion.'" , rangovale1= "'.$rangovale1.'", rangovale2= "'.$rangovale2.'", cantidad= 2'.$cantidadv.'", detalle= "'.$detalle.'", chofer= "'.$chofer.'", patente= "'.$patente.'", cotizacion= "'.$cotizacion.'" WHERE rangovale1 = "'.$rbuscar.'"'). mysql_error();
      }
      else
      {
	  mysql_query ('UPDATE vale SET nombre="'. $nombre .'", rfecha1 = "'. $rfecha1.'", rfecha2= "'.$rfecha2.'", giro = "'. $giro.'", rut ="'.$rut.'", direccion = "'.$direccion.'" , rangovale1= "'.$rangovale1.'", rangovale2= "'.$rangovale2.'", cantidad= "'.$cantidadv.'", detalle= "'.$detalle.'", transporte= "'.$transporte.'", patente= "'.$patente.'", chofer= "'.$chofer.'", cotizacion= "'.$cotizacion.'" WHERE rangovale1 = "'.$rbuscar.'"') or die ( 'UPDATE vale SET nombre="'. $nombre .'", rfecha1 = "'. $rfecha1.'", rfecha2= "'.$rfecha2.'", giro = "'. $giro.'", rut ="'.$rut.'", direccion = "'.$direccion.'" , rangovale1= "'.$rangovale1.'", rangovale2= "'.$rangovale2.'", cantidad= 2'.$cantidadv.'", detalle= "'.$detalle.'", chofer= "'.$chofer.'", patente= "'.$patente.'", cotizacion= "'.$cotizacion.'" WHERE rangovale1 = "'.$rbuscar.'"'). mysql_error();
	}			
	header ("Location: http://localhost/aridos/public_html/sistema/Vistagral.php");
}
?>	