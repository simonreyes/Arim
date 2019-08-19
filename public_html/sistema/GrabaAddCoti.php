<?php
{
	$host = "localhost";
    $user = "root";
    $pass = "";
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
	$folio = $_POST['folio']; 
	$VidCoti = $_POST['idcoti']; 
	$VidCliente = $_POST['cliente']; 
	  //$cliente = "69";
	
	$Tarifa = $Cubo*$Km;
	$Ganancia = ($ValorArido*30)/100;
	$Valor = ($Tarifa+$ValorArido+$Ganancia);
		 	
	 mysql_query("update cotizacion Set Km = '$Km',
										Cubo = '$Cubo',
										Tarifa = '$Tarifa',
										Ganancia = '$Ganancia',
										Peaje = '$Peaje',
										Comision = '$Comision',
										VentaFinal = '$VentaFinal',
										Cantidad = '$Cantidad'
										WHERE id_user = '$VidCoti' ", $conexion);			
				
				
				
	header ("Location: http://www.aridosmoreno.cl/sistema/Cotizacion2.php?Vidcli=$VidCliente&Vfolio=$folio");	
	
	 
	 
	 }
?>	