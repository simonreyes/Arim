<?php
	require_once ("conexion.php");
	if(empty($_POST['edit_idGuia'])){
		$errors[] = "Datos enviados estan vacíos.";
	}elseif(!empty($_POST['selectProv'])){
		$idGuia = mysqli_real_escape_string($con,(strip_tags($_POST["edit_idGuia"],ENT_QUOTES)));
		$ValorMT3 = mysqli_real_escape_string($con,(strip_tags($_POST["edit_valmt3"],ENT_QUOTES)));
		$Cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["edit_cant"],ENT_QUOTES)));
		$Proveedor = mysqli_real_escape_string($con,(strip_tags($_POST["selectProv"],ENT_QUOTES)));
	    $Sucursal = mysqli_real_escape_string($con,(strip_tags($_POST["selectSuc"],ENT_QUOTES)));
	
		// UPDATE data into database
	    $sql = "UPDATE guia SET Proveedor='".$Proveedor."', sucursal='".$Sucursal."', VentaFinal='".$ValorMT3."', cantidad ='".$Cantidad."'WHERE iguia ='".$idGuia."' ";
	    $query = mysqli_query($con,$sql);
	    // if product has been added successfully
	    if ($query) {
	        $messages[] = "El producto ha sido actualizado con éxito.";
	    } else {
	        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
	    }
		
	}elseif(!empty($_POST['edit_valmt3']) OR !empty($_POST['edit_cant'])){
		$idGuia = mysqli_real_escape_string($con,(strip_tags($_POST["edit_idGuia"],ENT_QUOTES)));	
		$ValorMT3 = mysqli_real_escape_string($con,(strip_tags($_POST["edit_valmt3"],ENT_QUOTES)));
		$Cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["edit_cant"],ENT_QUOTES)));
	
		// UPDATE data into database
	    $sql = "UPDATE guia SET VentaFinal='".$ValorMT3."', cantidad ='".$Cantidad."'WHERE iguia ='".$idGuia."' ";
	    $query = mysqli_query($con,$sql);
	    // if product has been added successfully
	    if ($query) {
	        $messages[] = "El producto ha sido actualizado con éxito.";
	    } else {
	        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
	    }
	}else {
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>