<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
      $pais = $_POST['pais'];
	  $estado = $_POST['estado'];
      $ciudad = $_POST['ciudad'];
	  $km = $_POST['km'];
      $cubo = $_POST['cubo'];
	  $peaje = $_POST['peaje'];
	  $cantidad = $_POST['cantidad'];
	  $ventaf = $_POST['ventaf'];
	 
	 
	 echo "Proveedor";
	 echo $pais;
	  echo "Aridos";	 
	 echo $estado;
	  echo "Valor";
	 echo $ciudad;
	  echo "KM";
	 echo $km;
	  echo "Cubo";
	 echo $cubo;
	  echo "Peaje";
	 echo $peaje;
	  echo "Pais";
	 echo $pais;
	  echo "Cantidad";
	 echo $cantidad;
	 
}
?>	