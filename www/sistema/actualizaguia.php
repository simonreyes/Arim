<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
	$num_guia = "";
    $num_guia = $_POST['busqueda'];
    $factura = $_POST['factura'];
	$num_cot = $_POST['cot'];
	$guiamanual = $_POST['guiamanual'];
	$guiaprov = $_POST['guiaprov'];
	
    mysql_query("update Guia Set Status = 'Finalizada',
											factura = '$factura',
											guia_manual = '$guiamanual',
											guia_prov = '$guiaprov'
											WHERE Num_Guia = '$num_guia' ", $conexion);

						
	mysql_query("update cotizacion Set Status = 'Finalizada' WHERE Folio = '".$num_cot."' ", $conexion);										

										
	header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");										
	 
	 }
?>	