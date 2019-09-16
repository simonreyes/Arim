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
$link = mysql_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysql_error());
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

if(isset($_POST["FechCotizacion"])){
	$dia = date("d", strtotime($FechCotizacion));
	$mes = date("m", strtotime($FechCotizacion));
	$anno = date("Y", strtotime($FechCotizacion));
}else{
	$dia = date("d");
	$mes = date("m");
	$anno = date("Y");
}

if (strcmp($mes,"01") == 0){
  $lmes = "Enero";
  }
elseif (strcmp($mes,"02") == 0){
  $lmes = "Febrero";
  }
elseif (strcmp($mes,"03") == 0){
  $lmes = "Marzo";
  }
elseif (strcmp($mes,"04") == 0){
  $lmes = "Abril";
  }
elseif (strcmp($mes,"05") == 0){
  $lmes = "Mayo";
  }
elseif (strcmp($mes,"06") == 0){
  $lmes = "Junio";
}
elseif (strcmp($mes,"07") == 0){
  $lmes = "Julio";
}
elseif (strcmp($mes,"08") == 0){
  $lmes = "Agosto";
}
elseif (strcmp($mes,"09") == 0){
  $lmes = "Septiembre";
}
elseif (strcmp($mes,"10") == 0){
  $lmes = "Octubre";
}
elseif (strcmp($mes,"11") == 0){
  $lmes = "Noviembre";
}
else{
  $lmes = "Diciembre";
}

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




