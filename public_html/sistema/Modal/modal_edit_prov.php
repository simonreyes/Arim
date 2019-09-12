<div id="editProvModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_proveedor" id="edit_proveedor">
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
								<input type="text" readonly class="form-control-plaintext" name="staticProv" id="staticProv">
							</div>
						</div>
						<div class="form-group row">
							<label for="staticSuc" class="col-sm-4 col-form-label">Sucursal: </label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" name="staticSuc" id="staticSuc">
							</div>
						</div>
						<div class="form-group row">
							<label for="staticAri" class="col-sm-4 col-form-label">Aridos: </label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" name="staticAri" id="staticAri">
							</div>
						</div>
					</div>	
					<div class="modal-body">
						<div class="form-group row">						
							<h5 class="modal-title"><b>Modificar Datos</b></h5>
						</div>
						<div class="form-group row">
							<label for="edit_valmt3" class="col-sm-4 col-form-label">MT3: </label>
							<div class="col-sm-6">
								<input type="text" class="form-control-plaintext" name="edit_valmt3" id="edit_valmt3">
							</div>
						</div>
						<div class="form-group row">
							<label for="edit_cant" class="col-sm-4 col-form-label">Cantidad: </label>
							<div class="col-sm-6">
								<input type="text" class="form-control-plaintext" name="edit_cant" id="edit_cant">
							</div>
						</div>
					</div>
					<div class="modal-body">
						<div class="form-group row">						
							<h5 class="modal-title"><b>Modificar Proveedor (Usar solo si desea cambiarlo)</b></h5>
						</div>					
						<div class="form-group row">
							<label>Proveedor</label>
							<select id="selectProv" name="selectProv" class="form-control">
						    	<option value="">Selecciona primero</option>
							</select>
						</div>
						<div class="form-group row">
							<label>Sucursal</label>
							<select id="selectSuc" name="selectSuc" class="form-control">
							    <option value="">Selecciona Proveedor primero</option>
							</select>		
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