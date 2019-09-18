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
	$count_queryGD   = mysqli_query($con,"SELECT count(*) AS numrows FROM Guia as g WHERE Status <> 'Anulada' AND Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY g.iguia");
	if ($rowGD = mysqli_fetch_array($count_queryGD)){$numrowsGD = $rowGD['numrows'];}
	else {echo mysqli_error($con);}
	//main query to fetch the data
	$queryGD = mysqli_query($con,"SELECT g.*, p.Proveedor as prov, a.glosa, c.Nombre_Cliente, tc.mt3, co.nombreobra	
			   FROM Guia as g 
			   LEFT JOIN proveedores as p ON g.Proveedor = p.idProveedor 
			   LEFT JOIN aridos as a ON g.idAridos = a.idAridos
               LEFT JOIN cliente as c ON  c.idCliente = g.idCliente
               LEFT JOIN transchofer tc ON tc.patente = g.Patente_Guia
               LEFT JOIN clienteobras co ON co.idobra = g.idobra
			   WHERE Status <> 'Anulada' 
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
		        <th class="th-sm">Proveedor</th>
		        <th class="th-sm">Cliente</th>
		        <th class="th-sm">Destino</th>
		        <th class="th-sm">Producto</th>
		        <th class="th-sm">MT3</th>
		        <th class="th-sm">Transporte</th>
		        <th class="th-sm">Patente</th>
		        <th class="th-sm">Chofer</th>
		        <th class="th-sm">Tarifa</th>
		        <th class="th-sm">Valor</th>
		        <th class="th-sm">Arido</th>
		        <th class="th-sm">Valor</th>
		        <th class="th-sm">Comisión</th>
		        <th class="th-sm">Valor</th>
		        <th class="th-sm">Venta Final</th>
		        <th class="th-sm">Valor</th>
		        <th class="th-sm">Total</th>
		        <th class="th-sm">Porcentaje</th>
		        <th class="th-sm">Guía Prov</th>  
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
    		$Prod = $rowGD['idAridos'];
    		$MT3 = $rowGD['Cantidad'];
    		$transporte = $rowGD['Transp_Guia'];
    		$patente = $rowGD['Patente_Guia'];
    		$chofer = $rowGD['Chofer_Guia'];   
    		$Cubo = $rowGD['Cubo'];
    		$KM = $rowGD['Km'];
    		$VArido = $rowGD['ValorArido'];
    		$Comision = $rowGD['Comision'];
    		$VFinal = $rowGD['VentaFinal'];
    		$Nom_aridos = $rowGD['glosa'];
    		$Nom_Clie = $rowGD['Nombre_Cliente'];
    		$Nom_obra = $rowGD['nombreobra'];

    		$valor_trans = 0;
    		$valor_trans = $Cubo * $KM ;

    		if(strcmp($transporte,"EUGENIO ROJAS QUEZADA") == 0){
        		$Cubo = 0;
        		$Cubo = 120;
        		$valor_trans = 0;
        		$valor_trans = $Cubo * $KM ;        
      		}
      
	        if($cliente == 58 or $cliente == 50 and $destino == 47){
	          	$Cubo = 0;
	          	$valor_trans = 0;
	          	$valor_trans = 2500 ;
	      	}
      
            if($cliente == 58 or $cliente == 50 and $destino == 69){
        		$Cubo = 0;
        		$valor_trans = 0;
        		$valor_trans = 2000 ;
      		}
      
            if($cliente == 58 or $cliente == 50 and $Prod == 70){
          		$Cubo = 0;
          		$valor_trans = 0;
        	}

        	$total_tarifa = 0;
		    $total_tarifa = $valor_trans * $MT3;
		    $total_Arido = 0;
		    $total_Arido = $VArido * $MT3;
		    $total_Comi = 0;
		    $total_Comi = $Comision * $MT3;
		    $total_VF = 0;
		    $total_VF = $VFinal * $MT3;
		    $Total = 0;
		    $Total = ($total_tarifa + $total_Arido + $total_Comi);
		    $Total1 = 0;
		    $Total1 = $total_VF - $Total;
		    $porcetaje = 0;
		    $porcetaje = round(($Total1 * 100)/ $total_VF);
		    $porcetaje2 = "";
		    $porcetaje2 = $porcetaje ."%";
	?>
	<tr>
      <td><?php echo $Fecha; ?></td>
      <td><?php echo $num_guia; ?></td>
      <td><?php echo $guiamanual; ?></td>
      <td><?php echo $Proveedor; ?></td>
      <td><?php echo $Nom_Clie; ?></td>
      <td><?php echo $Nom_obra; ?></td>   
      <td><?php echo $Nom_aridos; ?></td>
      <td><?php echo $MT3; ?></td>
      <td><?php echo $transporte; ?></td>
      <td><?php echo $patente; ?></td>
      <td><?php echo $chofer; ?></td>
      <td><?php echo $valor_trans; ?></td>
      <td><?php echo $total_tarifa; ?></td>
      <td><?php echo $VArido; ?></td>
      <td><?php echo $total_Arido; ?></td>
      <td><?php echo $Comision; ?></td>
      <td><?php echo $total_Comi; ?></td>
      <td><?php echo $VFinal; ?></td>
      <td><?php echo $total_VF; ?></td>
      <td><?php echo $Total1; ?></td>
      <td><?php echo $porcetaje2; ?></td>
      <td><?php echo $guiaprov; ?></td>
   </tr>
	<?php } ?>
	</tbody>
	<tfoot>
            <tr>
		        <th class="th-sm">Fecha</th>
		        <th class="th-sm">N° Guia</th>
		        <th class="th-sm">Guía Manual</th>
		        <th class="th-sm">Proveedor</th>
		        <th class="th-sm">Cliente</th>
		        <th class="th-sm">Destino</th>
		        <th class="th-sm">Producto</th>
		        <th class="th-sm">MT3</th>
		        <th class="th-sm">Transporte</th>
		        <th class="th-sm">Patente</th>
		        <th class="th-sm">Chofer</th>
		        <th class="th-sm">Tarifa</th>
		        <th class="th-sm">Valor</th>
		        <th class="th-sm">Arido</th>
		        <th class="th-sm">Valor</th>
		        <th class="th-sm">Comisión</th>
		        <th class="th-sm">Valor</th>
		        <th class="th-sm">Venta Final</th>
		        <th class="th-sm">Valor</th>
		        <th class="th-sm">Total</th>
		        <th class="th-sm">Porcentaje</th>
		        <th class="th-sm">Guía Prov</th>
            </tr>
        </tfoot>
 	</table>
 	</div>
	<?php	
		}
	}
?>          