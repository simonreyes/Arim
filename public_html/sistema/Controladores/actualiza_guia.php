<?php
	require_once ("conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajaxActualizaGuia'){
		if (empty($_REQUEST['FechaGuia'])){
			$errors[] = "Fecha de la Guía está vacía.";
		} elseif (!empty($_REQUEST['FechaGuia'])){
		
		$idGuia = mysqli_real_escape_string($con,(strip_tags($_REQUEST["idGuia"],ENT_QUOTES)));
		$FechaGuia = mysqli_real_escape_string($con,(strip_tags($_REQUEST["FechaGuia"],ENT_QUOTES)));
		$date = str_replace('/', '-', $FechaGuia);
		$phpdate = strtotime($date);
		$mysqldate = date('Ymd', $phpdate);
		$valorbuscado = "GD00".$idGuia;
				
		// UPDATE data into database
	    $sql = "UPDATE Guia SET Fecha_Guia='".$mysqldate."' WHERE Num_Guia='".$valorbuscado."'";
	    $query = mysqli_query($con,$sql);
	    // if product has been added successfully
	    if($query){
	        $messages[] = "La Guia ha sido actualizada con éxito.";
	    }else{
	        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
	    }
			
		}else{
			$errors[] = "desconocido.";
		}
	}else{
		$errors[] = "Accion Ajax no encontrada.";
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