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
    $cantidadv = "";
    $detalle ="";
    $foliob="";
    $transporte = $_POST['transporte'];
    $patente = $_POST['patente'];
    $chofer = $_POST['chofer'];
    $folio = $_POST['folio'];
    $fechar = $_POST['fecha'];      
    $cantidadv =$_POST['cantidadv'];
    $detalle = $_POST['detalle'];
    $foliob= $_POST['foliob'];
    $date = str_replace('/', '-', $fechar);
    $phpdate = strtotime($date);
    $fecha = date('d-m-y', $phpdate);

      if(empty($_POST['transporte']))
      {
      mysql_query ('UPDATE vale SET folio = "'. $folio.'", fecha ="'.$fecha.'", cantidad = "'.$cantidadv.'" , detalle= "'.$detalle.'" WHERE folio ="'. $foliob .'"') or die ('UPDATE vale SET folio = "'. $folio.'", fecha ="'.$fecha.'", cantidad = "'.$cantidadv.'" , detalle= "'.$detalle.'" WHERE folio ="'. $foliob .'" '). mysql_error();
      }
      else
      {
	   mysql_query ('UPDATE vale SET transporte="'. $transporte .'", patente = "'. $patente.'", chofer= "'.$chofer.'", folio = "'. $folio.'", fecha ="'.$fecha.'", cantidad = "'.$cantidadv.'" , detalle= "'.$detalle.'" WHERE folio ="'. $foliob .'" ') or die ('UPDATE vale SET transporte="'. $transporte .'", patente = "'. $patente.'", chofer= "'.$chofer.'", folio = "'. $folio.'", fecha ="'.$fecha.'", cantidad = "'.$cantidadv.'" , detalle= "'.$detalle.'" WHERE folio ="'. $foliob .'" '). mysql_error();
	}			
	//header ("Location: http://localhost/aridos/public_html/sistema/Vistagral.php");
}
?>	