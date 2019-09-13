<?php
	/* Connect To Database*/
	require_once ("../Controladores/conexion.php");
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	if($_REQUEST['query'] != ''){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$FI = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FechaInicial'], ENT_QUOTES)));
	$FF = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FechaFinal'], ENT_QUOTES)));

	$FechaInicial = date("Ymd",strtotime(str_replace('/', '-', $FI)));
	$FechaFinal = date("Ymd", strtotime(str_replace('/', '-', $FF)));
	
	//Count the total number of row in your table
	$count_queryGD   = mysqli_query($con,"SELECT count(*) AS numrows FROM guia as g 	WHERE g.Transp_Guia = ".$query." AND Status <> 'Anulada' AND Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY g.iguia");
	if ($rowGD = mysqli_fetch_array($count_queryGD)){$numrowsGD = $rowGD['numrows'];}
	else {echo mysqli_error($con);}
	//main query to fetch the data
	$queryGD = mysqli_query($con,"SELECT g.*, p.Proveedor as prov, a.glosa, c.Nombre_Cliente, tc.mt3
				FROM guia as g 
				LEFT JOIN proveedores as p ON g.Proveedor = p.idProveedor 
				LEFT JOIN aridos as a ON g.idAridos = a.idAridos
                LEFT JOIN cliente as c ON  c.idCliente = g.idCliente
                LEFT JOIN transchofer tc ON tc.chofer = g.Chofer_Guia AND tc.patente = g.Patente_Guia
				WHERE g.Transp_Guia = '".$query."' 
				AND Status <> 'Anulada' 
				AND Fecha_Guia >= '".$FechaInicial."'
				AND Fecha_Guia <= '".$FechaFinal."'
				ORDER BY g.Fecha_Guia DESC");
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
        <th class="th-sm">Fecha Creación</th>
        <th class="th-sm">EIRL</th>
        <th class="th-sm">N° G Manual</th>
        <th class="th-sm">N° G Prov</th>
        <th class="th-sm">Proveedor</th>
        <th class="th-sm">Sucursal</th>
        <th class="th-sm">Cliente</th>
        <th class="th-sm">Destino</th>
        <th class="th-sm">Producto</th>
        <th class="th-sm">MT3</th>
        <th class="th-sm">Transporte</th>
        <th class="th-sm">Patente</th>
        <th class="th-sm">Chofer</th>
        <th class="th-sm">Distancia</th>
        <th class="th-sm">Valor</th>
        <th class="th-sm">Valor Total</th>
        <th class="th-sm">Valor Final</th>   
      </tr>
    </thead>
    <tbody>
    <?php
		while($rowGD = mysqli_fetch_array($queryGD)){
		$Fecha = date("d/m/Y", strtotime($rowGD['Fecha_Guia'])); 
		$EIRL = $rowGD['Num_Guia'];
		$guiamanual = $rowGD['guia_manual'];
		$guiaprov = $rowGD['guia_prov'];
		$Prov = $rowGD['Proveedor'];
		$Suc = $rowGD['sucursal'];
		$Cliente = $rowGD['idCliente'];
		$Destino = $rowGD['idobra'];
		$Prod = $rowGD['idAridos'];
		$MT3 = $rowGD['Cantidad'];
		$Valor_MT3 = $rowGD['VentaFinal'];
		$Transp = $rowGD['Transp_Guia'];
		$Patente = $rowGD['Patente_Guia'];
		$Chofer = $rowGD['Chofer_Guia'];
		$CT = $rowGD['Folio'];
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