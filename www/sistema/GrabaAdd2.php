<?php
// llama a Cotizacion2.php para mostrar nuevamente los datos
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
	$contador = 0;
	
	$Proveedor = $_POST['pais'];
	$Km = $_POST['km'];
	$Cubo = $_POST['cubo'];
	$Tarifa = $_POST['tarifa'];
	$ValorArido = $_POST['sucursal'];
	$Ganancia = $_POST['ganancia'];
	$idAridos = $_POST['ciudad'];
	$Valor = $_POST['valor'];	
	$Peaje = $_POST['peaje'];
	$Venta = $_POST['venta'];
	$Comision = $_POST['cantidad'];
	$VentaFinal = $_POST['ventaf'];
	$Cantidad = $_POST['cantidad2'];		
	$cliente= $_POST['idcliente']; 
	$Sucursal= $_POST['estado']; 
	
	  $fecha = date('Ymd');
	  $folio = $_POST['folio'];
	  //$cliente = "69";
	
	$Tarifa2 = round($Cubo*$Km);
	$Ganancia = ($ValorArido*30)/100;
	$Valor2 = round($Tarifa2+$ValorArido+$Ganancia);
	$ValorVenta = round($Valor2+$Peaje+$Comision);
	 
	  $queryDATOS3 = 'SELECT * 
					FROM cotizacion
					Where Proveedor = "'.$Proveedor.'"
					and idAridos = "'.$idAridos.'"
					and Folio = "'.$folio.'"
					and Venta = "'.$ValorVenta.'"
					and Fecha = "'.$fecha.'"	
					and Cantidad = "'.$Cantidad.'"';
	$resultDATOS3 = mysql_query($queryDATOS3) or die('Consulta fallida: ' . mysql_error());

	while ($row3 = mysql_fetch_array($resultDATOS3, MYSQL_ASSOC)) {
	$contador = $contador + 1; 
	}			

	if ($contador == 0 ){
	mysql_query("insert into cotizacion( Proveedor, 
											Km, 
											Cubo,
											Tarifa,
											ValorArido,
											Ganancia,
											idAridos,
											Valor,
											Peaje,
											Venta,
											Status,
											Folio,
											Fecha,
											IdCliente,
											Comision,
											VentaFinal,
											Cantidad,
											sucursal)
	 VALUES ( 	'".$Proveedor."',
				'".$Km."',
				'".$Cubo."',
				'".$Tarifa2."',
				'".$ValorArido."',
				'".$Ganancia."',
				'".$idAridos."',
				'".$Valor2."',
				'".$Peaje."',
				'".$ValorVenta."',
				'Creada',
				'".$folio."',
				'".$fecha."',
				'".$cliente."',
				'".$Comision."',
				'".$VentaFinal."',
				'".$Cantidad."',
				'".$Sucursal."')", $conexion); 
	
	}else{
		
	}
				
	header ("Location: http://www.aridosmoreno.cl/sistema/EditaCotizacion2.php?Vidcli=".$cliente."&Vfolio=".$folio."");	
	 }
?>	