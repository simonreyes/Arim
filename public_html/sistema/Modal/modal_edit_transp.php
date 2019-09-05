<?php 
    require_once ("Controladores/conexion.php");
     
    // Obtener transportistas
    $query = "SELECT nombre, idnombre FROM transporte ORDER BY nombre ASC"; 
    $query = mysqli_query($con, $query);

    $count_queryTR   = mysqli_query($con,"SELECT count(*) AS numrows FROM transporte");

    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
	else {echo mysqli_error($con);}
?>

<div id="editTransporteModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_transporte" id="edit_transporte">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Transporte</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<!-- Transportes dropdown -->
						<div class="form-group">
							<input type="hidden" id="edit_guia" name="edit_guia" class="form-control">
							<input type="hidden" id="edit_trp" name="edit_trp" class="form-control">
						</div>
						<div class="form-group">
							<label>Transporte</label>
							<select class="form-control" id="selectTransporte" name="selectTransporte">
						    <option value="">Selecciona Transporte</option>
						    <?php 
						    if($numrowsTR > 0){ 
						        while($row = mysqli_fetch_array($query)){  
						            echo '<option value="'.$row['idnombre'].'">'.$row['nombre'].'</option>'; 
						        } 
						    }else{ 
						        echo '<option value="">Transportes no disponibles</option>'; 
						    } 
						    ?>
							</select>
						</div>
						<!-- Patentes dropdown -->	
						<div class="form-group">
							<label>Patente</label>
							<select id="selectPatente" name="selectPatente" class="form-control">
						    	<option value="">Selecciona Transporte primero</option>
							</select>
						</div>
						<div class="form-group">
						<!-- City dropdown -->
							<label>Chofer</label>
							<select id="selectChofer" name="selectChofer" class="form-control">
							    <option value="">Selecciona Chofer primero</option>
							</select>		
						</div>

					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" name="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>