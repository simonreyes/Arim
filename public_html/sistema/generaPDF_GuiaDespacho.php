<?php

 	require_once ( __DIR__ . '/fpdf/fpdf.php' );
 	require_once ("Controladores/conexion.php");

 	$query = $_POST["idGD"];

	$tables="Guia";
	$campos="*";
	$sWhere=" Guia.Num_Guia = '".$query."'";
	$sWhere.=" order by iguia";
	
	/*
	//Count the total number of row in your table
	*/
	$count_queryGD   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ") or die(mysqli_error());
	//var_dump($count_queryGD);
	if ($rowGD = mysqli_fetch_array($count_queryGD)){
		//var_dump($rowGD);
		$numrowsGD = $rowGD['numrows'];}
	else {echo mysqli_error($con);}
	//main query to fetch the data
	$consulta = "SELECT * FROM Guia where Num_Guia ='".$query."'";
	$queryGD = mysqli_query($con,$consulta);
	//loop through fetched data
	
	if ($numrowsGD >0){
	$rowGD = mysqli_fetch_array($queryGD);

	//Buscar Informacion Obras
	$queryObras = mysqli_query($con, "SELECT * FROM clienteobras WHERE idobra = '".$rowGD['idobra']."'") ;
	$rowObras = mysqli_fetch_array($queryObras);

	//Buscar Informacion Cliente
	$queryCliente = mysqli_query($con,"SELECT * FROM cliente WHERE idCliente = '".$rowGD['idCliente']."'");
	$rowClientes = mysqli_fetch_array($queryCliente);
	
	//Buscar Información Proveedores
	$queryProovedores = mysqli_query($con, "SELECT c.iguia, p.Proveedor, c.sucursal, a.glosa, c.Cantidad, c.VentaFinal from Guia c inner join aridos a on c.idaridos = a.idaridos inner join proveedores p on c.proveedor = p.idproveedor where Num_Guia = '".$query."'");

  	$Destino = $rowObras['nombreobra'];
	$Contacto = $rowObras['contacto'];
	$Fonocontacto = $rowObras['fono'];
	$Email = $rowObras['email'];
		
	$busqueda = $query;
	$NombreCli = $rowClientes['Nombre_Cliente'];
	$idcliente = $rowClientes['idCliente'];
	$Formapago = $rowGD['FormaPago'];
	
	
	$transporte =  $rowGD['Transp_Guia'];
	$patente =  $rowGD['Patente_Guia'];
	$chofer =  $rowGD['Chofer_Guia'];
	
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
	
	$nombreT = $transporte;
	 
	$id = $rowClientes['idCliente'];
	$Nombre = $rowClientes['Nombre_Cliente'];
	$DireccionClie = $rowClientes['Direccion'];
	$CiudadClie = $rowClientes['Ciudad'];
	$RutClie = $rowClientes['Rut'];  
	$Giro = $rowClientes['Giro']; 
	$Obra = $rowClientes['Obra']; 
	$ContactoClie = $rowClientes['Contacto']; 
	$CorreoClie = $rowClientes['Correo'];
	$FonoClie = $rowClientes['Fono'];

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',14);
	//$pdf->Image('formatoGD.png' , 0 ,0, 210 , 280,'PNG');

	if(isset($rowGD["Fecha_Guia"])){
		$dia = date("d", strtotime($rowGD["Fecha_Guia"]));
		$mes = date("m", strtotime($rowGD["Fecha_Guia"]));
		$anno = date("Y", strtotime($rowGD["Fecha_Guia"]));
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
	$queryGD = mysqli_query($con,$queryDATOS);
	while ($row = mysqli_fetch_array($queryGD) )
	{
			$Cantidad = trim($row['Cantidad']);
			$idArido = $row['idAridos'];
			$Tarifa = trim($row['VentaFinal']);
			$Valor = $Cantidad * $Tarifa;
			$NombreCli = $row['idCliente'];
		
			$sql4 = "SELECT * FROM aridos WHERE idAridos  =  '" .$idArido. "'";
			$resultado4 = mysqli_query($con,$sql4); 		
			while($fila4 = mysqli_fetch_array($resultado4))
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
$pdf->Cell(10, 8, utf8_decode("Chofer:"), 0, 'C');
$pdf->SetXY(21, 150);
$pdf->Cell(10, 8, utf8_decode($chofer), 0, 'C');

$pdf->SetXY(60, 150);
$pdf->Cell(10, 8, utf8_decode("Patente Camión:"), 0, 'C');
$pdf->SetXY(90, 150);
$pdf->Cell(10, 8, utf8_decode($patente), 0, 'C');

$pdf->Output();	
 }
?>