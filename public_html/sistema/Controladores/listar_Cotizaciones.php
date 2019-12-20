<?php
	/* Connect To Database*/
	require_once ("../Controladores/conexion.php");
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){	
	$FI = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FechaInicial'], ENT_QUOTES)));
	$FF = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FechaFinal'], ENT_QUOTES)));

	$FechaInicial = date("Ymd",strtotime(str_replace('/', '-', $FI)));
	$FechaFinal = date("Ymd", strtotime(str_replace('/', '-', $FF)));
	
	//Count the total number of row in your table
	$count_queryGD   = mysqli_query($con,"SELECT count(*) AS numrows FROM cotizacion as c WHERE Status <> 'Anulada' AND Fecha >= '".$FechaInicial."' AND Fecha <= '".$FechaFinal."' ORDER BY c.Folio");
	if ($rowGD = mysqli_fetch_array($count_queryGD)){$numrowsGD = $rowGD['numrows'];}
	else {echo mysqli_error($con);}
	//main query to fetch the data
	$queryGD = mysqli_query($con,"SELECT ct.*, p.Proveedor as prov, a.glosa, c.Nombre_Cliente, co.nombreobra	
			   FROM cotizacion as ct 
			   LEFT JOIN proveedores as p ON ct.Proveedor = p.idProveedor 
			   LEFT JOIN aridos as a ON ct.idAridos = a.idAridos
               LEFT JOIN cliente as c ON  c.idCliente = ct.idCliente
               LEFT JOIN clienteobras co ON co.idobra = ct.idobra
			   WHERE Status <> 'Anulada' 
			   AND Fecha >= '".$FechaInicial."'
			   AND Fecha <= '".$FechaFinal."'
			   ORDER BY ct.Fecha DESC");
	//loop through fetched data
	
	if ($numrowsGD >0){
	?>

	<div>
		<table class="table table-striped table-bordered table-sm w-auto" id="dtHorizontalExample">
		  	<thead class="thead-light">
				<tr>
				<th class="th-sm">Fecha</th>
				<th class="th-sm">Folio (CT00)</th>
				<th class="th-sm">Obra</th>
		        <th class="th-sm">Proveedor</th>
		        <th class="th-sm">Sucursal</th>
		        <th class="th-sm">Aridos</th>
		        <th class="th-sm">KM</th>
		        </tr>
		    </thead>
	    	<tbody>
    <?php
		while($rowGD = mysqli_fetch_array($queryGD)){
    		$num_ct = substr($rowGD['Folio'], 4);
    		$Fecha = date("d/m/Y", strtotime($rowGD['Fecha']));
    		$Nom_obra = $rowGD['nombreobra'];
    		$Proveedor = $rowGD['Proveedor'];
    		$Sucursal = $rowGD['sucursal'];
    		$Aridos = $rowGD['glosa'];
    		$Km = $rowGD['Km'];
	?>
			<tr>
		      <td><?php echo $Fecha; ?></td>
		      <td><?php echo $num_ct; ?></td>
		      <td><?php echo $Nom_obra; ?></td> 
		      <td><?php echo $Proveedor; ?></td>
			  <td><?php echo $Sucursal; ?></td>
		      <td><?php echo $Aridos; ?></td>
		      <td><?php echo $Km; ?></td> 
		   </tr>
	<?php } ?>
	</tbody>
	<tfoot>
            <tr>
				<th class="th-sm">Fecha</th>
				<th class="th-sm">Folio (CT00)</th>
				<th class="th-sm">Obra</th>
		        <th class="th-sm">Proveedor</th>
		        <th class="th-sm">Sucursal</th>
		        <th class="th-sm">Aridos</th>
		        <th class="th-sm">KM</th>
            </tr>
        </tfoot>
 	</table>
 	</div>
	<?php	
		}
	}
?>          