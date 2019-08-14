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
    $tf = $_POST['tipo_emp'];
    $fechaRecep = $_POST['fechaRece'];
	$factura = trim($_POST['num_fact']);
	

	
	$submitted =  trim($_POST['guardar']);
	$submitted2 = trim($_POST['eliminar']);
	
	Echo $submitted;
	Echo $submitted2;
	
	if ($submitted == 'Actualizar') 
	 {
	 echo "1";
	/*mysql_query("update facturas Set DESCUENTO = '$descuento',
										TIPO_EMP = '$tf', 
										FECHA_RECEP = '$fechaRecep',
										MONTO_TOTAL = '$monto'
									    WHERE NOMBRE_EMP = '$nomemp' AND NUM_FACT = '$factura' ", $conexion);*/
	 }
									
	if ($submitted2 == 'Eliminar')
	{
	echo "2";
		/*mysql_query("delete from facturas WHERE nombre_emp = '$nomemp' and num_fact = '$factura'", $conexion); */
	}									
	
	//header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");				
	 
	 }
?>