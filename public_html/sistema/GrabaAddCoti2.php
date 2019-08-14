<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
	//$Proveedor = $_POST['pais'];
	$Km = $_POST['km'];
	$Cubo = $_POST['cubo'];
	$Tarifa = $_POST['tarifa'];
	$Ganancia = $_POST['ganancia'];
	$Valor = $_POST['valor'];	
	$Peaje = $_POST['peaje'];
	$Venta = $_POST['venta'];
	$Comision = $_POST['cantidad'];
	$VentaFinal = $_POST['ventaf'];
	$Cantidad = $_POST['cantidad2'];		
	$ValorArido = $_POST['valorarido'];
	$Folio = $_POST['folio']; 
	$VidCoti = $_POST['idcoti']; 
	$VidCliente = $_POST['cliente']; 
	  //$cliente = "69";
	
	//$Tarifa = $Cubo*$Km;
	//$Ganancia = ($ValorArido*30)/100;
	//$Valor = ($Tarifa+$ValorArido+$Ganancia);
	
	$Tarifa2 = round($Cubo*$Km);
	$Ganancia = ($ValorArido*30)/100;
	$Valor2 = round($Tarifa2+$ValorArido+$Ganancia);
	$ValorVenta = round($Valor2+$Peaje+$Comision);
	/*echo "niko1";
	Echo $Km;
	echo "niko2";
	Echo $Cubo;
	echo "niko3";
	Echo $Tarifa;
	echo "niko4";
	Echo $Ganancia;
	echo "niko5";
	Echo $Valor;
	echo "niko6";	
	Echo $Peaje;
	echo "niko7";
	Echo $Venta;
	echo "niko8";
	Echo $Comision;
	echo "niko9";
	Echo $VentaFinal;
	echo "niko10";
	Echo $Cantidad;
	echo "niko11";	
	Echo $ValorArido;
	echo "niko12";
	Echo $Folio; 
	echo "niko13";
	Echo $VidCoti;
	echo "niko14";	
	Echo $VidCliente; */

	
	mysql_query("update cotizacion Set Km = '$Km', Cubo = '$Cubo', Tarifa = '$Tarifa2', Ganancia = '$Ganancia', Peaje = '$Peaje',
										Comision = '$Comision', Valor = '$Valor2', Venta = '$ValorVenta', VentaFinal = '$VentaFinal',
										Cantidad = '$Cantidad' WHERE id_user = '$VidCoti' ", $conexion);			
				
				
			
	header ("Location: http://www.aridosmoreno.cl/sistema/EditaCotizacion2.php?Vidcli=$VidCliente&Vfolio=$Folio");	
	 
	 
	 }
?>	