<?php

 	require_once ( __DIR__ . '/fpdf/fpdf.php' );
   
  	$Destino = $_POST['Destino'];
	$Contacto = $_POST['contacto'];
	$Fonocontacto = $_POST['fonocontacto'];
	$Email = $_POST['cemail'];
		
	$busqueda = $_POST['busqueda'];
	$NombreCli = $_POST['NombreCli'];
	$idcliente = $_POST['idcliente'];
	$Formapago = $_POST['Formapago'];
	
	
	$transporte =  $_POST['pais'];
	$patente =  $_POST['estado'];
	$chofer =  $_POST['ciudad'];
	
	$DireccionClie = "";
    $RutClie = "";  
    $Giro = ""; 
    $Obra = "";
    $ContactoClie = "";
    $CorreoClie = "";
    $FonoClie = "";
	$Fecha = date("Ymd"); 
	$Fecha2 = date("d-m-Y"); 
	$Total = "";
	$neto = "";
	$FolioGuia = "";
	$act_num_guia = "";
	$num_guia = "";
	$idArido = "";
	$Arido = "";
	$Nombre = "";
	
	
//Creamos las consultas a las BD.
// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'nikovald', 'arimoreno2016') or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('nikovald_aridos') or die('No se pudo seleccionar la base de datos');


$queryDATOSq = "SELECT * FROM transporte WHERE idnombre  =  '" .$transporte. "'";
$resultDATOSq = mysql_query($queryDATOSq) or die('Consulta fallida: ' . mysql_error());
while ($rowq = mysql_fetch_array($resultDATOSq, MYSQL_ASSOC)) 
{  
$nombreT = $rowq['nombre'];
}  

$queryDATOS1 = "SELECT * FROM cliente WHERE idCliente = '" .$idcliente. "'";
$resultDATOS1 = mysql_query($queryDATOS1) or die('Consulta fallida: ' . mysql_error());
while ($row1 = mysql_fetch_array($resultDATOS1, MYSQL_ASSOC)) 
{  
$id = $row1['idCliente'];
$Nombre = $row1['Nombre_Cliente'];
$DireccionClie = $row1['Direccion'];
$CiudadClie = $row1['Ciudad'];
$RutClie = $row1['Rut'];  
$Giro = $row1['Giro']; 
$Obra = $row1['Obra']; 
$ContactoClie = $row1['Contacto']; 
$CorreoClie = $row1['Correo'];
$FonoClie = $row1['Fono'];

}  


$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
//$pdf->Image('http://www.aridosmoreno.cl/sistema/formatoGD.png' , 0 ,0, 210 , 280,'PNG');

$dia = date("d"); 
$mes = date("m");
$anno = date("Y");



if ($mes == 01){
  $lmes = "Enero";
  }
if ($mes == 02){
  $lmes = "Febrero";
  }
if ($mes == 03){
  $lmes = "Marzo";
  }
  if ($mes == 04){
  $lmes = "Abril";
  }

if ($mes == 05){
  $lmes = "Mayo";
  }
if ($mes == 06){
  $lmes = "Junio";
}
if ($mes == 07){
  $lmes = "Julio";
}
if ($mes == 08){
  $lmes = "Agosto";
}
if ($mes == 09){
  $lmes = "Septiembre";
}
if ($mes == 10){
  $lmes = "Octubre";
}
if ($mes == 11){
  $lmes = "Noviembre";
}
if ($mes == 12){
  $lmes = "Diciembre";
}
//$lmes = "Octubre";
$pdf->SetXY(115, 22);
$pdf->Cell(10, 8, $busqueda, 0, 'C');   
$pdf->SetFont('Helvetica','B',12);
$pdf->SetXY(5, 39);
$pdf->Cell(10, 8, $dia, 0, 'C');
$pdf->SetXY(32, 39);
$pdf->Cell(10, 8, $lmes, 0, 'C');
$pdf->SetXY(70, 39);
$pdf->Cell(10, 8, $anno, 0, 'C');

$pdf->SetXY(10, 50);
$pdf->Cell(10, 8, utf8_decode($Nombre), 0, 'C');
$pdf->SetXY(125, 50);
$pdf->Cell(10, 8, $RutClie, 0, 'C');
$pdf->SetXY(10, 59);
$pdf->Cell(10, 8, utf8_decode($DireccionClie), 0, 'C');
$pdf->SetXY(130, 59);
$pdf->Cell(10, 8, utf8_decode($CiudadClie), 0, 'C');
$pdf->SetXY(7, 68);
$pdf->Cell(10, 8, utf8_decode($Giro), 0, 'C');
$pdf->SetXY(132, 68);
$pdf->Cell(10, 8, utf8_decode($FonoClie), 0, 'C');
$pdf->SetXY(10, 77);
$pdf->Cell(10, 8, utf8_decode($Destino), 0, 'C');


$fila = 103;
$neto = 0;

$queryDATOS = 'SELECT * FROM Guia where Num_Guia = "'.$busqueda.'" and VentaFinal > 0 and Cantidad > 0';
$resultDATOS = mysql_query($queryDATOS) or die('Consulta fallida: ' . mysql_error());
while ($row = mysql_fetch_array($resultDATOS, MYSQL_ASSOC)) 
{
		$Cantidad = trim($row['Cantidad']);
		$idArido = $row['idAridos'];
		$Tarifa = trim($row['VentaFinal']);
		$Valor = $Cantidad * $Tarifa;
		$NombreCli = $row['idCliente'];
	
		$sql4 = "SELECT * FROM aridos WHERE idAridos  =  '" .$idArido. "'";  
		$resultado4 = mysql_query($sql4); 		
		while($fila4 = mysql_fetch_assoc($resultado4))
			{  
				$Arido = "";
				$Arido .= $fila4['glosa'];  
			}
				
	 	$pdf->SetXY(1, $fila);
		$pdf->Cell(10, 8, $Cantidad, 0, 'C');
		$pdf->SetXY(12, $fila);
		$pdf->Cell(10, 8, $Arido, 0, 'C');
		$pdf->SetXY(116, $fila);
		$pdf->Cell(10, 8, number_format($Tarifa,0), 0, 'C');
		$pdf->SetXY(139, $fila);
		$pdf->Cell(10, 8, number_format($Valor,0), 0, 'C');

		$fila = $fila + 8;
		$neto = $neto + $Valor;
		
}
$iva = (($neto * 19)/100);
$Total = $neto + $iva;
$pdf->SetFont('Helvetica','B',16);
$pdf->SetXY(138, 165);
$pdf->Cell(10, 8, number_format($Total,0), 0, 'C');


$pdf->SetFont('Helvetica','B',10);
$pdf->SetXY(10, 150);
$pdf->Cell(10, 8, utf8_decode("Cofer:"), 0, 'C');
$pdf->SetXY(21, 150);
$pdf->Cell(10, 8, utf8_decode($chofer), 0, 'C');

$pdf->SetXY(60, 150);
$pdf->Cell(10, 8, utf8_decode("Patente Camión:"), 0, 'C');
$pdf->SetXY(90, 150);
$pdf->Cell(10, 8, utf8_decode($patente), 0, 'C');

$actusu = 'UPDATE Guia SET Fecha_Guia = "' . $Fecha . '", Transp_Guia = "' . $nombreT . '", Patente_Guia = "' . $patente . '", Chofer_Guia = "' . $chofer . '"  WHERE Num_Guia = "' . $busqueda . '"';
$resultactusu = mysql_query($actusu) or die('Consulta fallida: ' . mysql_error());

$pdf->Output();	
 
?>




