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
	$count_queryGD   = mysqli_query($con,"SELECT count(*) AS numrows FROM Guia as g WHERE Status <> 'Anulada'AND g.Proveedor = '".$query."' AND Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY g.iguia");
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
         AND g.Proveedor = '".$query."'
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
        <th class="th-sm">Arido</th>
        <th class="th-sm">MT3</th>
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
			  $Fecha = date("d/m/Y", strtotime($rowGD['Fecha_Guia']));
    		$num_guia = $rowGD['Num_Guia'];
    		$guiamanual = $rowGD['guia_manual'];
    		$guiaprov = $rowGD['guia_prov'];
    		$Proveedor = $rowGD['Proveedor']; 
    		$cliente = $rowGD['idCliente']; 
    		$destino = $rowGD['idobra'];
        $Sucursal = $rowGD['sucursal'];
    		$Prod = $rowGD['idAridos'];
    		$MT3 = $rowGD['Cantidad'];
    		$transporte = $rowGD['Transp_Guia'];
    		$patente = $rowGD['Patente_Guia'];
    		$chofer = $rowGD['Chofer_Guia'];   
    		$Cubo = $rowGD['Cubo'];
    		$KM = $rowGD['Km'];
    		$VArido = $rowGD['ValorArido'];
    		$Comision = $rowGD['Comision'];
    		$Nom_aridos = $rowGD['glosa'];
    		$Nom_Prov = $rowGD['prov'];
    		$Nom_Clie = $rowGD['Nombre_Cliente'];
    		$Nom_obra = $rowGD['nombreobra'];

        $Total = 0;
        $Total = $VArido * $MT3;
	
	?>
	<tr>
      <td><?php echo $Fecha; ?></td>
      <td><?php echo $num_guia; ?></td>
      <td><?php echo $guiamanual; ?></td>
      <td><?php echo $guiaprov; ?></td> 
      <td><?php echo $Nom_Prov; ?></td>
      <td><?php echo $Sucursal; ?></td>
      <td><?php echo $Nom_aridos; ?></td>
      <td><?php echo $MT3; ?></td>
      <td><?php echo $transporte; ?></td>
      <td><?php echo $patente; ?></td>
      <td><?php echo $chofer; ?></td>
      <td><?php echo $VArido; ?></td>
      <td><?php echo $Total; ?></td>  
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
        <th class="th-sm">Arido</th>
        <th class="th-sm">MT3</th>
        <th class="th-sm">Transporte</th>
        <th class="th-sm">Patente</th>
        <th class="th-sm">Chofer</th>
        <th class="th-sm">Valor MT3</th>
        <th class="th-sm">Total</th>  
      </tr>
  </tfoot>
 	</table>
 	</div>
	<?php	
		}
	}	
	}
?>          