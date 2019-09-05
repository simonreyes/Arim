<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edicion de Guias de Despacho</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Font Awesome 5.8.2 -->
<link rel="stylesheet" href="resources/css/all.css">
  <!-- Bootstrap 4.3.1 core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Jquery UI-->
<link href="resources/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" >
<!-- JQuery 3.4.1 -->
<script type="text/javascript" src="resources/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap 4.3.1 core JavaScript -->
<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
<!-- Jquery UI -->
<script type="text/javascript" src="resources/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<!-- Datepicker Jquery Ui -->
<script type="text/javascript" src="resources/jquery-ui-1.12.1/datepicker-es.js"></script>
<!-- Custom Javascripts -->
<script src="resources/scripts.js"></script>
<!-- Custom CSS -->
<link rel="stylesheet" href="resources/custom.css">
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Editar <b>Guias de Despacho</b></h2>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-left'>
				<div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);"/>
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button" onclick="load(1);">
                                <span class="fa fa-search"></span>
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