<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
    $nomemp = trim($_POST['nomemp']);
	$factura = $_POST['num_fact'];
	
	$fechafact = $_POST['fechafact'];
    $monto = $_POST['monto'];
	$fechapago = $_POST['fechapago'];
	$estado = $_POST['nuevoestado'];
    $banco = $_POST['banco'];
	$numcheque = $_POST['numcheque'];
    $tipopago = $_POST['tipopago'];
	$obs = trim($_POST['obs']);
	
	
	$submitted =  trim($_POST['guardar']);
	$submitted2 = trim($_POST['eliminar']);
	
	if ($submitted == 'Actualizar') 
	 {
	
		mysql_query("update factura_emitidas Set FECHAFACT = '$fechafact',
										MONTOFACT = '$monto', 
										FECHAPAGO = '$fechapago',
										ESTADO = '$estado',
										BANCO  ='$banco',
										NUMEROCHEQUE = '$numcheque',
     									TIPOPAGO = '$tipopago',
										OBS = '$obs'
									    WHERE NOMEMP = '$nomemp' AND NUMFACT = '$factura' ", $conexion);
	 }
	 
	if ($submitted2 == 'Eliminar')
	{
	
	mysql_query("delete from factura_emitidas WHERE NOMEMP = '$nomemp' and NUMFACT = '$factura'", $conexion); 
	}
	
	header ("Location: VistaGral.php");				
	
	 }
?>	