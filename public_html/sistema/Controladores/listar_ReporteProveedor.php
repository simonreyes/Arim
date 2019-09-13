<?php
	/* Connect To Database*/
	require_once ("../Controladores/conexion.php");
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	if($_REQUEST['query'] != ''){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$FechaInicial = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FechaInicial'], ENT_QUOTES)));
	$FechaFinal = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FechaFinal'], ENT_QUOTES)));
	
	//Count the total number of row in your table
	$count_queryGD   = mysqli_query($con,"SELECT count(*) AS numrows FROM guia as g 	WHERE g.Proveedor = ".$query." AND Status <> 'Anulada' AND Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY g.iguia");
	if ($rowGD = mysqli_fetch_array($count_queryGD)){$numrowsGD = $rowGD['numrows'];}
	else {echo mysqli_error($con);}
	//main query to fetch the data
	$queryGD = mysqli_query($con,"SELECT g.*, p.Proveedor as prov, a.glosa
				FROM guia as g 
				LEFT JOIN proveedores as p ON g.Proveedor = p.idProveedor 
				LEFT JOIN aridos as a ON g.idAridos = a.idAridos 
				WHERE g.Proveedor = ".$query." 
				AND Status <> 'Anulada' 
				AND Fecha_Guia >= '".$FechaInicial."' 
				AND Fecha_Guia <= '".$FechaFinal."' 
				ORDER BY g.iguia");
	//loop through fetched data
	
	if ($numrowsGD >0){
	$rowGD = mysqli_fetch_array($queryGD);
	?>

	<div> 
  	<!--table class="table table-striped table-bordered table-sm w-auto" id="dtHorizontalExample" 
         width="100%" -->
    <table class="table table-striped table-bordered table-sm w-auto text-nowrap" id="dtHorizontalExample">
  	<thead class="thead-light">
  		<tr>
        <th class="th-sm">Fecha</th>
        <th class="th-sm">N° Guia</th>
        <th class="th-sm">N° G Manual</th>
        <th class="th-sm">N° G Prov</th>
        <th class="th-sm">Proveedor</th>
        <th class="th-sm">Sucursal</th>
        <th class="th-sm">Arido</th>
        <th class="th-sm">MT3 Guia</th>
        <th class="th-sm">Transporte</th>
        <th class="th-sm">Patente</th>
        <th class="th-sm">Chofer</th>
        <th class="th-sm">Valor MT3</th>
        <th class="th-sm">Total</th>  
      </tr>
    </thead>
    <tbody>
    <?php
		while($rowGD = mysqli_fetch_array($queryGD)){
			$Fecha = $rowGD["Fecha_Guia"];
			$NGuia = $rowGD["Num_Guia"];
			$NGManual = $rowGD["guia_manual"]; 
			$NGProv = $rowGD["guia_prov"];
			$Proveedor = $rowGD["prov"];
			$Sucursal = $rowGD["sucursal"];
			$Arido = $rowGD["glosa"];
			$MT3 = $rowGD["Cantidad"];
			$Transporte = $rowGD["Transp_Guia"];
			$Patente = $rowGD["Patente_Guia"];
			$Chofer = $rowGD["Chofer_Guia"];
			$Valor = $rowGD["ValorArido"];
			$Total = $Valor * $MT3;
	?>
	<tr>
		<td><?php echo $Fecha ?></td>
        <td><?php echo $NGuia ?></td>
        <td><?php echo $NGManual ?></td>
        <td><?php echo $NGProv ?></td>
        <td><?php echo $Proveedor ?></td>
        <td><?php echo $Sucursal?></td>
        <td><?php echo $Arido ?></td>
        <td><?php echo $MT3 ?></td>
        <td><?php echo $Transporte ?></td>
        <td><?php echo $Patente ?></td>
        <td><?php echo $Chofer ?></td>
        <td><?php echo $Valor ?></td>
        <td><?php echo $Total ?></td>
	</tr>
	<?php } ?>
	</tbody>
 	</table>
 	</div>
	<?php	
		}
	}	
	}
?>          