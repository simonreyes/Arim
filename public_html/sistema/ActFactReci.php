<?php
{
	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
    $nomemp = trim($_POST['nomemp']);
	$descuento = $_POST['descuento'];
    $tf = $_POST['tipo_emp'];
    $fechaRecep = $_POST['fechaRece'];
	$factura = trim($_POST['num_fact']);
	
	$monto = $_POST['monto_total'];
    $fechapago = $_POST['fecha_pago'];
	$numcheque = $_POST['num_cheque'];
    $banco = $_POST['nombre_banco'];
	$fechacheque = trim($_POST['fecha_cheque']);
	
	$estado = $_POST['estadoact'];
	$observacion = $_POST['observacion'];
	
	$submitted =  trim($_POST['guardar']);
	$submitted2 = trim($_POST['eliminar']);
	
	Echo $submitted;
	Echo $submitted2;
	
	if ($submitted == 'Actualizar') 
	 {
	mysql_query("update facturas Set DESCUENTO = '$descuento',
										TIPO_EMP = '$tf', 
										FECHA_RECEP = '$fechaRecep',
										MONTO_TOTAL = '$monto',
										FECHA_PAGO  ='$fechapago',
										NUM_CHEQUE = '$numcheque',
     									NOMBRE_BANCO = '$banco',
										FECHA_CHEQUE = '$fechacheque',
										ESTADO_FACT = '$estado',
										OBSERVACION = '$observacion'
									    WHERE NOMBRE_EMP = '$nomemp' AND NUM_FACT = '$factura' ", $conexion);
	 }
									
	if ($submitted2 == 'Eliminar')
	{
		mysql_query("delete from facturas WHERE nombre_emp = '$nomemp' and num_fact = '$factura'", $conexion); 
	}									
	
	header ("Location: VistaGral.php");				
	 
	 }
?>	