<?php
	require_once ("conexion.php");

	if (empty($_POST['selectTransporte'])){
		$errors[] = "Transporte está vacío.";
	} elseif (!empty($_POST['selectTransporte'])){

	$idGuia = mysqli_real_escape_string($con,(strip_tags($_POST["edit_guia"],ENT_QUOTES)));
	$nombreTransporte = mysqli_real_escape_string($con,(strip_tags($_POST["edit_trp"],ENT_QUOTES)));
	$idTransporte = mysqli_real_escape_string($con,(strip_tags($_POST["selectTransporte"],ENT_QUOTES)));
    $Patente = mysqli_real_escape_string($con,(strip_tags($_POST["selectPatente"],ENT_QUOTES)));
	$Chofer = mysqli_real_escape_string($con,(strip_tags($_POST["selectChofer"],ENT_QUOTES)));
	
	// UPDATE data into database
    $sql = "UPDATE Guia SET Transp_Guia='".$nombreTransporte."', Patente_Guia='".$Patente."', Chofer_Guia='".$Chofer."' WHERE Num_Guia='".$idGuia."' ";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
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