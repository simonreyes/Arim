<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
    $nomemp = trim($_POST['nomemp']);
	$descuento = $_POST['descuento'];
    $tf = $_POST['tf'];
    $fechaRecep = $_POST['fechaRecep'];
	$factura = trim($_POST['factura']);
	
	$monto = $_POST['monto'];
    $fechapago = $_POST['fechapago'];
	$numcheque = $_POST['numcheque'];
    $banco = $_POST['banco'];
	$fechacheque = trim($_POST['fechacheque']);
	
	$estado = $_POST['estado'];
	$obs = $_POST['obs'];

	mysql_query("insert into facturas(NOMBRE_EMP, DESCUENTO, TIPO_EMP, FECHA_RECEP, NUM_FACT, 
	MONTO_TOTAL, FECHA_PAGO, NUM_CHEQUE, NOMBRE_BANCO, FECHA_CHEQUE, ESTADO_FACT, OBSERVACION)
	VALUES ( '$nomemp', '$descuento', '$tf', '$fechaRecep', '$factura', '$monto', '$fechapago',
	'$numcheque', '$banco', '$fechacheque', '$estado', '$obs')", $conexion);


	header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");				
	 
	 }
?>	