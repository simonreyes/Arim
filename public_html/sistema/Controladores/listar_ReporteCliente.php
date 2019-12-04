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
	$count_queryGD   = mysqli_query($con,"SELECT count(*) AS numrows FROM Guia as g WHERE Status <> 'Anulada'AND g.idCliente = '".$query."' AND Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY g.iguia");
	if ($rowGD = mysqli_fetch_array($count_queryGD)){$numrowsGD = $rowGD['numrows'];}
	else {echo mysqli_error($con);}
	//main query to fetch the data
	$queryGD = mysqli_query($con,"SELECT g.*, p.Proveedor as prov, a.glosa, c.Nombre_Cliente, tc.mt3, co.nombreobra	
			   FROM Guia as g 
			   LEFT JOIN proveedores as p ON g.Proveedor = p.idProveedor 
			   LEFT JOIN aridos as a ON g.idAridos = a.idAridos
         LEFT JOIN cliente as c ON  c.idCliente = g.idCliente
         LEFT JOIN transchofer tc ON tc.chofer = g.Chofer_Guia AND tc.patente = g.Patente_Guia
         LEFT JOIN clienteobras co ON co.idobra = g.idobra
			   WHERE Status <> 'Anulada'
         AND g.idCliente = '".$query."'
			   AND Fecha_Guia >= '".$FechaInicial."'
			   AND Fecha_Guia <= '".$FechaFinal."'
			   ORDER BY g.Fecha_Guia DESC");
	//loop through fetched data
	
	if ($numrowsGD >0){
	?>

	<div>
    <table class="table table-striped table-bordered table-sm w-auto" id="dtHorizontalExample">
  	<thead class="thead-light">
  		<tr>
        <th class="th-sm">Fecha</th>
        <th class="th-sm">N° Guia</th>
        <th class="th-sm">Guía Manual</th>
        <th class="th-sm">Guía Prov</th>
        <th class="th-sm">Proveedor</th>
        <th class="th-sm">Sucursal</th>
        <th class="th-sm">Cliente</th>
        <th class="th-sm">Destino</th>
        <th class="th-sm">Producto</th>
        <th class="th-sm">MT3</th>
        <th class="th-sm">Valor MT3</th>
        <th class="th-sm">Valor Total</th>
        <th class="th-sm">Transporte</th>
        <th class="th-sm">Patente</th>
        <th class="th-sm">Chofer</th>
      </tr>
    </thead>
    <tbody>
    <?php
    while($rowGD = mysqli_fetch_array($queryGD)){
      $Fecha = date("d/m/Y", strtotime($rowGD['Fecha_Guia']));
        $num_guia = $rowGD['Num_Guia'];
        $guiamanual = $rowGD['guia_manual'];
        $guiaprov = $rowGD['guia_prov'];
        $Proveedor = $rowGD['prov'];
        $Sucursal = $rowGD['sucursal'];
        $Cliente = $rowGD['idCliente']; 
        $destino = $rowGD['idobra']; 
        $Prod = $rowGD['idAridos'];
        $MT3 = $rowGD['Cantidad'];
        $transporte = $rowGD['Transp_Guia'];
        $Patente = $rowGD['Patente_Guia'];
        $Chofer = $rowGD['Chofer_Guia'];
        $Nom_aridos = $rowGD['glosa'];
        $Nom_Cliente = $rowGD['Nombre_Cliente'];
        $Nom_obra = $rowGD['nombreobra'];
        $KM = $rowGD['Km'];
        $mt3trans = $rowGD['mt3'];
        $Valor_MT3 = $rowGD['VentaFinal'];
    
        $Valor_total = 0;
        $Valor_total = $MT3 * $Valor_MT3;
    ?>
    <tr>
      <td><?php echo $Fecha ?></td>
          <td><?php echo $num_guia ?></td>
          <td><?php echo $guiamanual ?></td>
          <td><?php echo $guiaprov ?></td>
          <td><?php echo $Proveedor ?></td>
          <td><?php echo $Sucursal ?></td>
          <td><?php echo $Nom_Cliente ?></td>
          <td><?php echo $Nom_obra ?></td>
          <td><?php echo $Nom_aridos ?></td>
          <td><?php echo $MT3 ?></td>
          <td><?php echo $Valor_MT3 ?></td>
          <td><?php echo $Valor_total ?></td>
          <td><?php echo $transporte ?></td>
          <td><?php echo $Patente ?></td>
          <td><?php echo $Chofer ?></td>
    </tr>
  <?php } ?>
  </tbody>
  <tfoot>
    <tr>
        <th class="th-sm">Fecha</th>
        <th class="th-sm">N° Guia</th>
        <th class="th-sm">Guía Manual</th>
        <th class="th-sm">Guía Prov</th>
        <th class="th-sm">Proveedor</th>
        <th class="th-sm">Sucursal</th>
        <th class="th-sm">Cliente</th>
        <th class="th-sm">Destino</th>
        <th class="th-sm">Producto</th>
        <th class="th-sm">MT3</th>
        <th class="th-sm">Valor MT3</th>
        <th class="th-sm">Valor Total</th>
        <th class="th-sm">Transporte</th>
        <th class="th-sm">Patente</th>
        <th class="th-sm">Chofer</th> 
        </tr>
  </tfoot>
 	</table>
 	</div>
	<?php	
		}
	}	
	}
?>          