<?php 
    require_once ("Controladores/conexion.php");
     
    // Obtener transportistas
    $query = "SELECT nombre, idnombre FROM transporte ORDER BY nombre ASC"; 
    $query = mysqli_query($con, $query);

    $count_queryTR   = mysqli_query($con,"SELECT count(*) AS numrows FROM transporte");

    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
	else {echo mysqli_error($con);}
?>

<div id="editProvModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title"><b> Editar Proveedor </b></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<input type="hidden" name="edit_idGuia" id="edit_idGuia" >			
					<div class="modal-body">
						<div class="form-group row">
							<h5 class="modal-title"><b>Información inicial</b></h5>
						</div>
						<div class="form-group row">
							<label for="staticProv" class="col-sm-4 col-form-label">Proveedor: </label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" id="staticProv">
							</div>
						</div>
						<div class="form-group row">
							<label for="staticSuc" class="col-sm-4 col-form-label">Sucursal: </label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" id="staticSuc">
							</div>
						</div>
						<div class="form-group row">
							<label for="staticAri" class="col-sm-4 col-form-label">Aridos: </label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" id="staticAri">
							</div>
						</div>
					</div>	
					<div class="modal-body">
						<div class="form-group row">						
							<h5 class="modal-title"><b>Modificar Datos</b></h5>
						</div>
						<div class="form-group row">
							<label for="edit_valmt3" class="col-sm-2 col-form-label">MT3: </label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control-plaintext" id="edit_valmt3">
							</div>
						</div>
						<div class="form-group row">
							<label for="edit_cant" class="col-sm-2 col-form-label">Cantidad: </label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control-plaintext" id="edit_cant">
							</div>
						</div>
					</div>
					<div class="modal-header">						
						<h5 class="modal-title">Modificar Proveedor</h5>
					</div>
					<div class="modal-body">					
						<div class="form-group row">
							<label>Proveedor</label>
							<input type="text" name="edit_prov"  id="edit_prov" class="form-control" required>
						</div>
						<div class="form-group row">
							<label>Sucursal</label>
							<input type="text" name="edit_suc" id="edit_suc" class="form-control" required>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>