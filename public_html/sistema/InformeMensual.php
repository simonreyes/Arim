<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Informe Mensual de Guias de Despacho</title>
<!-- Fuentes -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- Font Awesome 5.8.2 -->
<link rel="stylesheet" href="resources/Font Awesome/all.css">

<!-- Bootstrap CSS 3.4.1 -->
<link rel="stylesheet" href="resources/Bootstrap-3.4.1/css/bootstrap.min.css">

<!-- DataTables CSS 1.10.18 -->
<link rel="stylesheet" href="resources/DataTables-1.10.18/css/dataTables.bootstrap.min.css">

<!-- Buttons CSS 1.5.6 -->
<link rel="stylesheet" href="resources/Buttons-1.5.6/css/buttons.bootstrap.min.css">

<!-- Bootstrap Datepicker CSS -->
<link rel="stylesheet" href="resources/Datepicker/css/bootstrap-datepicker.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="resources/customDataTables.css">
 
<!-- JQuery JS 3.4.1 -->
<script type="text/javascript" src="resources/js/jquery-3.4.1.min.js"></script>

<!-- Bootstrap JS 3.4.1-->
<script type="text/javascript" src="resources/Bootstrap-3.4.1/js/bootstrap.min.js"></script>

<!-- JSZip JS 2.5.0 -->
<script type="text/javascript" src="resources/JSZip-2.5.0/jszip.min.js" ></script>

<!-- PDF Make JS 0.1.36 -->
<script type="text/javascript" src="resources/pdfmake-0.1.36/pdfmake.min.js" ></script>
<script type="text/javascript" src="resources/pdfmake-0.1.36/vfs_fonts.js" ></script>

<!-- DataTables JS 1.10.18 -->	
<script type="text/javascript" src="resources/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="resources/DataTables-1.10.18/js/dataTables.bootstrap.min.js"></script>

<!-- Buttons JS 1.5.6 -->
<script type="text/javascript" src="resources/Buttons-1.5.6/js/dataTables.buttons.min.js" ></script>
<script type="text/javascript" src="resources/Buttons-1.5.6/js/buttons.bootstrap.min.js" ></script>
<script type="text/javascript" src="resources/Buttons-1.5.6/js/buttons.colVis.min.js" ></script>
<script type="text/javascript" src="resources/Buttons-1.5.6/js/buttons.flash.min.js" ></script>
<script type="text/javascript" src="resources/Buttons-1.5.6/js/buttons.html5.min.js" ></script>
<script type="text/javascript" src="resources/Buttons-1.5.6/js/buttons.print.min.js" ></script>

<!-- Bootstrap Datepicker JS -->
<script type="text/javascript" src="resources/Datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="resources/Datepicker/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>

<!-- Custom Javascripts -->
<script src="resources/scriptsReportes.js"></script>
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Infome<b> Mensual - Guias de Despacho</b></h2>
					</div>
                </div>
            </div>
			<div class="row">
				<div id="custom-search-input"  class='col-sm-7 pull-left'>
					<div class="input-daterange input-group" id="datepicker">
    					<input type="text" class="input-sm-addon form-control" name="start" id="FechaInicial"
    					value="<?php echo date("d/m/Y", strtotime("first day of this month")) ?>"/>
    					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    					<span class="input-group-addon">Hasta</span>
    					<input type="text" class="input-sm-addon form-control" name="end" id="FechaFinal"
    					value="<?php echo date("d/m/Y", strtotime("last day of this month")) ?>"/>
    					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    					<span class="input-group-btn">
                            <button class="btn btn-info" type="button" onclick="cargaInforme();">
                                Cargar Informe <span class="fa fa-search"></span>
                            </button>
                        </span>
                    </div>
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