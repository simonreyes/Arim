<?php
{
	$ventaf = $_POST['ventaf'];
	$cantidad = $_POST['cantidad'];
	$folio = $_POST['folio'];
	$idguia = $_POST['idguia'];
	
	//Echo "Niko1";
	//Echo $ventaf;
	//Echo "Niko2";
	//Echo $cantidad;
	//Echo "Niko3";
	//Echo $folio;
	//Echo "Niko4";
	//Echo $idguia;
	//echo "Niko5";
	
	$link = mysql_connect('localhost', 'aridosem_tems', 'aritrans2020') or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('aridosem_bd') or die('No se pudo seleccionar la base de datos');		
	
	$incLCM = 'UPDATE Guia_temp SET Cantidad = "'.$cantidad. '" WHERE id_user = "' . $idguia . '" and Folio = "' . $folio . '"';
	$resultincLCM = mysql_query($incLCM) or die('Consulta fallida: ' . mysql_error());
	
	header ("Location: http://www.localhost/arim/public_html/sistema/GuiaDespacho2.php?idguia=".$idguia."&Vfolio=".$folio."");	
	
}
?>	