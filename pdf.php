<?php 

$Vfolio = $_POST['folio'];
$Vid = $_POST['id'];
$Vfp = $_POST['fp'];
$Vobra = $_POST['obra'];

/* $Vfolio = 'CT0011';
$Vid = '3';
$Vfp = 'AL DIA';
$Vobra = '27'; */

	
	require_once ( __DIR__ . '/fpdf/fpdf.php' ); 
	
	$idCliente = "";
	$NombreCliente = "";
	
	$link = mysql_connect('localhost', 'nikovald', 'arimoreno2016') or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('nikovald_aridos') or die('No se pudo seleccionar la base de datos');		
	
	$incLCM = 'UPDATE cotizacion SET  FormaPago = "'.$Vfp. '", idobra = "'.$Vobra. '", Status = "Abierta" WHERE Folio= "'.$Vfolio. '"';
	$resultincLCM = mysql_query($incLCM) or die('Consulta fallida: ' . mysql_error());
	
	$queryDATOS2 = 'SELECT * FROM cotizacion WHERE Folio = "'.$Vfolio.'"';
	$resultDATOS2 = mysql_query($queryDATOS2) or die('Consulta fallida: ' . mysql_error());
	while ($row2 = mysql_fetch_array($resultDATOS2, MYSQL_ASSOC)) 
	{  
	$idCliente = $row2['idCliente'];
	}  
	
	$queryDATOS3 = "SELECT * FROM cliente Where idCliente = '" .$idCliente. "'";
	$resultDATOS3 = mysql_query($queryDATOS3) or die('Consulta fallida: ' . mysql_error());
	while ($row3 = mysql_fetch_array($resultDATOS3, MYSQL_ASSOC)) 
	{  
	$NombreCliente = $row3['Nombre_Cliente'];
	$Rut = $row3['Rut'];
	$Direccion = $row3['Direccion'];
	$Correo = $row3['Correo'];
	$Fono = $row3['Fono'];
	//$Detalle = $row3['glosa'];
	} 
	$fecha = date('d-m-Y');
	
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->Image('http://www.aridosmoreno.cl/sistema/FormatoC.png' , 0 ,0, 210 , 280,'PNG');  

$pdf->SetFont('Arial','B',14);
$pdf->SetXY(157, 25);
$pdf->Cell(10,8,$Vfolio);
$pdf->SetFont('Helvetica','',9);
$pdf->SetXY(41, 38);
$pdf->Cell(10, 8, $NombreCliente, 0, 'C');
$pdf->SetXY(41, 44);
$pdf->Cell(10, 8, $Rut, 0, 'C');
$pdf->SetXY(160, 44);
$pdf->Cell(10, 8, $fecha, 0, 'C');
$pdf->SetXY(100, 44);
$pdf->Cell(10, 8, $Fono, 0, 'C');
$pdf->SetXY(41, 50);
$pdf->Cell(10, 8, $Direccion, 0, 'C');
$pdf->SetXY(41, 56);
$pdf->Cell(10, 8, $Correo, 0, 'C');

//Detalle Cotizacion
$fila = 72;
$neto = 0;

$queryDATOS = 'SELECT * FROM cotizacion WHERE Folio  =  "'.$Vfolio.'" and VentaFinal > 0 and Cantidad  > 0 ';
$resultDATOS = mysql_query($queryDATOS) or die('Consulta fallida: ' . mysql_error());
while ($row = mysql_fetch_array($resultDATOS, MYSQL_ASSOC)) 
{
 $Cantidad = $row['Cantidad'];
 $Valor = $row['VentaFinal'];
 $IdAridos = $row['idAridos'];

$queryDATOS6 = 	"SELECT * FROM aridos WHERE idAridos = '" .$IdAridos. "'";
$resultDATOS6 = mysql_query($queryDATOS6) or die('Consulta fallida: ' . mysql_error());
while ($row6 = mysql_fetch_array($resultDATOS6, MYSQL_ASSOC)) 
{
	$Aridos = $row6['glosa'];
}
 
 $pdf->SetXY(21, $fila);
 $pdf->Cell(10, 8, $Cantidad, 0, 'C');
 $pdf->SetXY(50, $fila);
 $pdf->Cell(10, 8, $Aridos, 0, 'C');
 $pdf->SetXY(150, $fila);
 $pdf->Cell(10, 8, $Valor, 0, 'C');
 $pdf->SetXY(171, $fila);
 $pdf->Cell(10, 8, number_format($Cantidad*$Valor,0), 0, 'C');

 $fila = $fila + 5;
 $neto = $neto + ($Valor*$Cantidad);

}
$iva = (($neto * 19)/100);
$Total = $neto + $iva;

//Neto
$pdf->SetXY(171, 168);
$pdf->Cell(10, 8, number_format($neto,0), 0, 'C');
//Iva
$pdf->SetXY(171, 174);
$pdf->Cell(10, 8, number_format($iva,0), 0, 'C');
//Total
$pdf->SetXY(171, 180);
$pdf->Cell(10, 8, number_format($Total,0), 0, 'C');


$queryDATOS9 = 	"SELECT * FROM clienteobras WHERE idobra = '".$Vobra."' ";
$resultDATOS9 = mysql_query($queryDATOS9) or die('Consulta fallida: ' . mysql_error());
while ($row9 = mysql_fetch_array($resultDATOS9, MYSQL_ASSOC)) 
{
	$Cnombreobra = $row9['nombreobra'];
	$Ccontacto = $row9['contacto'];
	$Cfono = $row9['fono'];
	$Cemail = $row9['email'];
} 

$pdf->SetXY(41, 188);
$pdf->Cell(10, 8, utf8_decode($ContactoClie), 0, 'C');
$pdf->SetXY(41, 193);
$pdf->Cell(10, 8, utf8_decode($Cnombreobra), 0, 'C');
$pdf->SetXY(41, 199);
$pdf->Cell(10, 8, utf8_decode($Ccontacto), 0, 'C');
$pdf->SetXY(41, 204);
$pdf->Cell(10, 8, $Cfono, 0, 'C');
$pdf->SetXY(120, 204);
$pdf->Cell(10, 8, $Cemail, 0, 'C');

	
//$Vfolionumero = substr($Vfolio,4,5);
//$Vfolio2 = $Vfolionumero + 1;
$Vfolio2 = '0';
$Vfolionumero = '0';
$queryDATOS7 = 	"SELECT * FROM folios WHERE letra = 'CT00'";
$resultDATOS7 = mysql_query($queryDATOS7) or die('Consulta fallida: ' . mysql_error());
while ($row7 = mysql_fetch_array($resultDATOS7, MYSQL_ASSOC)) 
{
	$Vfolionumero = $row7['numero'];
}

$Vfolio2 = $Vfolionumero + 1;

$incLCM = 'UPDATE folios SET numero = "'.$Vfolio2. '"where letra = "CT00"';
$resultincLCM = mysql_query($incLCM) or die('Consulta fallida: ' . mysql_error());
	
$pdf->Output(); 
?>