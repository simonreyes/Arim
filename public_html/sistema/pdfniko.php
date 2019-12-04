<?php 	
	require_once ( __DIR__ . '/fpdf/fpdf.php' ); 
	
	$Proveedor = "";	    
	
	$link = mysql_connect('localhost', 'aridosem_tems', 'aritrans2020') or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('aridosem_bd') or die('No se pudo seleccionar la base de datos');		
	
	
	$queryDATOS2 = "SELECT * FROM cotizacion WHERE Folio  =  'CT001'";
	$resultDATOS2 = mysql_query($queryDATOS2) or die('Consulta fallida: ' . mysql_error());
	while ($row2 = mysql_fetch_array($resultDATOS2, MYSQL_ASSOC)) 
	{  
	$Proveedor = $row2['Proveedor'];
	}  
	

	
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->Image('FormatoC.png' , 0 ,0, 210 , 280,'PNG');  

	$pdf->SetFont('Arial','B',16);   
	$pdf->Cell(40,10,$Proveedor);	
	$pdf->Output(); 
?>