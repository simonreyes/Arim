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
	$queryTR = "SELECT count(*) AS numrows FROM guia as g 	WHERE g.Transp_Guia = '".$query."' AND Status <> 'Anulada' AND Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY g.iguia";
	$count_queryGD   = mysqli_query($con,$queryTR);
	if ($rowGD = mysqli_fetch_array($count_queryGD)){$numrowsGD = $rowGD['numrows'];}
	else {echo mysqli_error($con);}
	//main query to fetch the data
	$queryGD = mysqli_query($con,"SELECT g.*, p.Proveedor as prov, a.glosa, c.Nombre_Cliente, tc.mt3,co.nombreobra	
				FROM guia as g 
				LEFT JOIN proveedores as p ON g.Proveedor = p.idProveedor 
				LEFT JOIN aridos as a ON g.idAridos = a.idAridos
                LEFT JOIN cliente as c ON  c.idCliente = g.idCliente
                LEFT JOIN transchofer tc ON tc.patente = g.Patente_Guia
                LEFT JOIN clienteobras co ON co.idobra = g.idobra
				WHERE g.Transp_Guia = '".$query."' 
				AND Status <> 'Anulada' 
				AND Fecha_Guia >= '".$FechaInicial."'
				AND Fecha_Guia <= '".$FechaFinal."'
				ORDER BY g.Fecha_Guia DESC");
	//loop through fetched data
	
	if ($numrowsGD >0){
	?>

	<div> 
  	<!--table class="table table-striped table-bordered table-sm w-auto" id="dtHorizontalExample" 
         width="100%" -->
    <table class="table table-striped table-bordered table-sm w-auto" id="dtHorizontalExample">
  	<thead class="thead-light">
  		<tr>
	        <th class="th-sm">Fecha Creación</th>
	        <th class="th-sm">N° Guia</th>
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
				
			$Cubo = 100;
			$valor_trans = 0;
			$valor_trans = $Cubo * $KM ;
	
		   	if(strcmp($transporte,"EUGENIO ROJAS QUEZADA") == 0){		
				$Cubo = 0;
				$Cubo = 120;
				$valor_trans = 0;
				$valor_trans = $Cubo * $KM ;				
			}
			
			IF ($Cliente == 58 or $Cliente == 50 and $Destino == 47){
				$Cubo = 0;
				$valor_trans = 0;
				$valor_trans = 2500 ;
			}
			
			IF ($Cliente == 58 or $Cliente == 50 and $Destino == 69){
				$Cubo = 0;
				$valor_trans = 0;
				$valor_trans = 2000 ;
			}
			
			IF ($Cliente == 58 or $Cliente == 50 and $Prod == 70) 
				{
					$Cubo = 0;
					$valor_trans = 0;
				}

			$valor_final = $valor_trans * $mt3trans;
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
	        <td><?php echo $mt3trans ?></td>
	        <td><?php echo $transporte ?></td>
	        <td><?php echo $Patente ?></td>
	        <td><?php echo $Chofer ?></td>
	        <td><?php echo $KM ?></td>
	        <td><?php echo $Cubo ?></td>
	        <td><?php echo $valor_trans ?></td>
	        <td><?php echo $valor_final ?></td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
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
	</tfoot>
 	</table>
 	</div>
	<?php	
		}
	}	
	}
?> 