<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Prueba Reporte</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Font Awesome 5.8.2 -->
<link rel="stylesheet" href="resources/css/all.css">
<!-- Bootstrap CSSs -->
<link rel="stylesheet" href="resources/css/bootstrap.min.css">
<!-- Bootstrap Datepicker CSS -->
<link rel="stylesheet" href="resources/css/datepicker/bootstrap-datepicker.min.css">
<!-- JQuery 3.4.1 -->
<script type="text/javascript" src="resources/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="resources/bootstrap.min.js"></script>
<!-- Bootstrap Datepicker JS -->
<script type="text/javascript" src="resources/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="resources/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<!-- Custom Javascripts -->
<script src="resources/scriptsReportes.js"></script>
<!-- Custom CSS -->
<link rel="stylesheet" href="resources/custom.css"> 
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Prueba <b>Reportes</b></h2>
					</div>
                </div>
            </div>
			<div class='col-sm-6 pull-left'>
				<div id="custom-search-input">
					<div class="input-daterange input-group" id="datepicker">
    				<input type="text" class="input-sm-addon form-control" name="start" id="FechaInicial"
    				value="<?php echo date("d/m/Y", strtotime("first day of this month")) ?>"/>
    				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    				<span class="input-group-addon">Hasta</span>
    				<input type="text" class="input-sm-addon form-control" name="end" id="FechaFinal"
    				value="<?php echo date("d/m/Y", strtotime("last day of this month")) ?>"/>
    				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    				<span class="input-group-btn">
                            <button class="btn btn-info" type="button" onclick="BuscarClientes();">
                                Buscar Clientes <span class="fa fa-search"></span>
                            </button>
                        </span>
				</div>
                <div class="form-group row">
					<label>Clientes</label>
					<select id="selectCliente" name="selectCliente" class="form-control">
						<option value="">Selecciona Fechas primero</option>
					</select>
				</div>
			</div>
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->
            
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<?php include("Modal/modal_add_prov.php");?>
	<!-- Edit Modal HTML -->
	<?php include("Modal/modal_edit_prov.php");?>
	<?php include("Modal/modal_edit_transp.php");?>
	<!-- Delete Modal HTML -->
	<?php include("Modal/modal_delete_prov.php");?>
</body>
</html>