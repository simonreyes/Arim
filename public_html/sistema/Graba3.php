<?php
{
	$ventaf = $_POST['ventaf'];
	$cantidad = $_POST['cantidad'];
	$num_guia = $_POST['num_guia'];
	$idguia = $_POST['idguia'];
	
	$transporte = $_POST['transporte'];
	$chofer = $_POST['chofer'];
	$patente = $_POST['patente'];
	
	$link = mysql_connect('localhost', 'aridosem_tems', 'aritrans2020') or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('aridosem_bd') or die('No se pudo seleccionar la base de datos');		
	
	$incLCM = 'UPDATE Guia SET Cantidad = "'.$cantidad. '" WHERE iguia = "' . $idguia . '" and Num_Guia = "' . $num_guia . '"';
	$resultincLCM = mysql_query($incLCM) or die('Consulta fallida: ' . mysql_error());
	
	header ("Location: EditarGuiaDespacho2.php?idguia=".$idguia."&num_guia=".$num_guia."");	
	
}
?>	