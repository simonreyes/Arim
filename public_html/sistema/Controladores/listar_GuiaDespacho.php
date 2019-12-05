<?php
	/* Connect To Database*/
	require_once ("../Controladores/conexion.php");
	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$valorbuscado = "GD00".$query;


	$tables="Guia";
	$campos="*";
	$sWhere=" Guia.Num_Guia = '".$valorbuscado."'";
	$sWhere.=" order by iguia";
	
	/*
	//Count the total number of row in your table
	*/
	$count_queryGD   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($rowGD = mysqli_fetch_array($count_queryGD)){$numrowsGD = $rowGD['numrows'];}
	else {echo mysqli_error($con);}
	//main query to fetch the data
	$queryGD = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere");
	//loop through fetched data
	
	if ($numrowsGD >0){
	$rowGD = mysqli_fetch_array($queryGD);
	//Buscar Informacion Obras
	$queryObras = mysqli_query($con, "SELECT * FROM clienteobras WHERE idobra = '".$rowGD['idobra']."'");
	$rowObras = mysqli_fetch_array($queryObras);

	//Buscar Informacion Cliente
	$queryCliente = mysqli_query($con,"SELECT * FROM cliente WHERE idCliente = '".$rowGD['idCliente']."'");
	$rowClientes = mysqli_fetch_array($queryCliente);
	
	//Buscar Información Proveedores
	$queryProovedores = mysqli_query($con, "SELECT c.iguia, p.Proveedor, c.sucursal, a.glosa, c.Cantidad, c.VentaFinal from Guia c inner join aridos a on c.idaridos = a.idaridos inner join proveedores p on c.proveedor = p.idproveedor where Num_Guia = '".$valorbuscado."'");

	?>

	<div class="table-responsive">
	<table class="table table-striped table-hover">
		<caption><h4><b>Información Guía de Despacho N° <?php echo $rowGD['Num_Guia']  ?></b></h4></caption>
		<tbody>
			<tr>
				<td>Folio Cotización: </td> 
				<td><?php echo $rowGD['Folio']  ?></td>
				<td><i class="fas fa-calendar-alt"></i> <label> Fecha: </label></td>
				<td class="input-group">
					<input name="FechaGuia" id="FechaGuia" type="text" value="<?php echo date("d/m/Y", strtotime($rowGD['Fecha_Guia'])) ?>">
					<span class="input-group-btn">
                            <button class="btn btn-success btn-sm" type="button" onclick="updateGuia();">
                                Actualizar Fecha <span class="fa fa-save"></span>
                            </button>
                    </span>	
				</td>
			</tr>
			<tr>
				<td>Nombre Cliente: </td>
				<td><?php echo $rowClientes['Nombre_Cliente']  ?></td>
				<td>Dirección: </td>
				<td><?php echo $rowClientes['Direccion']  ?></td>
			</tr>
			<tr>
				<td>Rut: </td>
				<td><?php echo $rowClientes['Rut']  ?></td>
				<td>Giro: </td>
				<td><?php echo $rowClientes['Giro']  ?></td>
			</tr>
			<tr>
				<td>Correo Electronico: </td>
				<td><?php echo $rowClientes['Correo']  ?></td>
				<td>Fono Cliente: </td>
				<td><?php echo $rowClientes['Fono']  ?></td>
			</tr>
			<tr>
				<td>Obra: </td>
				<td><?php echo $rowObras['nombreobra']  ?></td>
				<td>Nombre Contacto: </td>
				<td><?php echo $rowObras['contacto']  ?></td>
			</tr>
			<tr>
				<td>Fono Contacto: </td>
				<td><?php echo $rowObras['fono']  ?></td>
				<td>Email Contacto: </td>
				<td><?php echo $rowObras['email']  ?></td>
			</tr>
			<tr>
				<td>Forma de Pago: </td>
				<td><?php echo$rowGD['FormaPago']  ?></td>
				<td> </td>
				<td><!--span class="input-group-btn">
	                    <button class="btn btn-danger" type="button" onclick="load(1);">
	                        Generar PDF <span class="fa fa-file-pdf"></span>
	                    </button>
	                </span-->
	                <form action="generaPDF_GuiaDespacho.php" method="post">
	                	<input type="hidden" name="idGD" value="<?php echo $rowGD['Num_Guia']  ?>"/>
    					<button type="submit" name="btn_pdf" class="btn btn-danger">
    						Generar PDF <span class="fa fa-file-pdf"></span>
    					</button>
					</form>
	            </td>
			</tr>
	    </tbody>
  	</table>
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<caption><h4><b>Información Transporte</h4></b></caption>
			<thead>
				<tr>
					<th>Nombre Transportador</th>
					<th>Patente</th>
					<th>Chofer</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $rowGD['Transp_Guia']?></td>
					<td><?php echo $rowGD['Patente_Guia']?></td>
					<td><?php echo $rowGD['Chofer_Guia']?></td>
					<td>
						<a href="#"  data-target="#editTransporteModal" class="edit" data-toggle="modal" data-guia="<?php echo $rowGD['Num_Guia']?>" data-trp="<?php echo $rowGD['Transp_Guia']?>" data-pat="<?php echo $rowGD['Patente_Guia']?>" data-chof="<?php echo $rowGD['Chofer_Guia']?>">
						<i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div class="table-responsive">
		<div>

		</div>
		<table class="table table-striped table-hover">
			<caption><h4><b>Proveedores</h4><b>
				<!-- <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo proveedor</span></a> -->
			</caption>
			<thead>
				<tr>
					<th>Proveedor</th>
					<th>Sucursal</th>
					<th>Arido</th>
					<th class='text-center'>Valor MT3</th>
					<th class='text-center'>Cantidad</th>
					<th class='text-center'>Editar</th>
					<th class='text-center'>Eliminar</th>
				</tr>
			</thead>
			<tbody>	
				<?php
				while($row = mysqli_fetch_array($queryProovedores)){
					$id_guia=$row['iguia'];
					$Proveedor = $row['Proveedor'];
					$Sucursal = $row['sucursal'];
					$Arido = $row['glosa'];
					$Cantidad = $row['Cantidad'];
					$MT3 = $row['VentaFinal'];
					?>
					<td class='text-rigth'><?php echo $Proveedor;?></td>
					<td class='text-rigth'><?php echo $Sucursal;?></td>
					<td class='text-rigth'><?php echo $Arido;?></td>
					<td class='text-center' ><?php echo $MT3;?></td>
					<td class='text-center'><?php echo $Cantidad;?></td>
					<td class='text-center'>
					<a href="#"  data-target="#editProvModal" class="edit" data-toggle="modal" data-prov='<?php echo $Proveedor;?>' data-suc="<?php echo $Sucursal?>" data-arido="<?php echo $Arido?>" data-cant="<?php echo $Cantidad?>" data-mt3="<?php echo $MT3;?>" data-id="<?php echo $id_guia;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a></td>
					<td class='text-center'>
					<a href="#deleteProvModal" class="delete" data-toggle="modal" data-id="<?php echo $id_guia;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
               		</td>
				</tr>
				<?php }?>
			</tbody>			
		</table>
	</div>	

	
	
	<?php	
	}	
}
?>          