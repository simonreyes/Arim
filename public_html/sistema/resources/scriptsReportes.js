$(document).ready(function(){
		$("#FechaInicial").datepicker({
			format: "dd/mm/yyyy",
			weekStart: 1,
			language: "es"
		});

		$("#FechaFinal").datepicker({
			format: "dd/mm/yyyy",
			weekStart: 1,
			language: "es"
		});

		$('#selectProveedor').on('change', function(){
			cargarGDporProveedor();
		});
		$('#select_transportereportes').on('change', function(){
			cargarGDporTransportes();
		});
	});

	function BuscarClientes(){
			var FechaInicial = $("#FechaInicial").val();
			var FechaFinal = $("#FechaFinal").val();
			var parametros = {"action":"ajax","FechaInicial":FechaInicial, "FechaFinal":FechaFinal};
			if(FechaFinal){
	            $.ajax({
	                type:'POST',
	                url:'Controladores/select_ClientesReportes.php',
	                data: parametros,
	                beforeSend: function(objeto){
						$("#loader").html("Cargando...");
			  		},
	                success:function(html){
	                    $('#selectCliente').html(html);
	                    $("#loader").html("");
	                }
	            }); 
	        }else{
	            $('#selectCliente').html('<option value="">Selecciona Fechas Primero</option>');
	        }
	};

	function BuscarProveedores(){
		var FechaInicial = $("#FechaInicial").val();
		var FechaFinal = $("#FechaFinal").val();
		var parametros = {"action":"ajax","FechaInicial":FechaInicial, "FechaFinal":FechaFinal};
		if(FechaFinal){
	           $.ajax({
	               type:'POST',
	               url:'Controladores/select_ProveedorReportes.php',
	               data: parametros,
	               beforeSend: function(objeto){
					$("#loader").html("Cargando...");
		  		},
	               success:function(html){
	                   $('#selectProveedor').html(html);
	                   $("#loader").html("");
	               }
	           }); 
	       }else{
	           $('#selectProveedor').html('<option value="">Selecciona Fechas Primero</option>');
	       }
	};
		function BuscarTransporte(){
		var FechaInicial = $("#FechaInicial").val();
		var FechaFinal = $("#FechaFinal").val();
		var parametros = {"action":"ajax","FechaInicial":FechaInicial, "FechaFinal":FechaFinal};
		if(FechaFinal){
	           $.ajax({
	               type:'POST',
	               url:'Controladores/select_transportereportes.php',
	               data: parametros,
	               beforeSend: function(objeto){
					$("#loader").html("Cargando...");
		  		},
	               success:function(html){
	                   $('#select_transportereportes').html(html);
	                   $("#loader").html("");
	               }
	           }); 
	       }else{
	           $('#select_transportereportes').html('<option value="">Selecciona Fechas Primero</option>');
	       }
	};

	function cargarGDporProveedor(){
		var q = $("#selectProveedor").val();
		var FechaInicial = $("#FechaInicial").val();
		var FechaFinal = $("#FechaFinal").val();
		var parametros = {"action":"ajax",'query':q, "FechaInicial":FechaInicial, 
						  "FechaFinal":FechaFinal};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'Controladores/listar_ReporteProveedor.php',
			data: parametros,
			beforeSend: function(objeto){
			$("#loader").html("Cargando...");
		  	},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
				activaDataTables();
			}
		});
	};

	function cargarGDporTransportes(){
		var q = $("#select_transportereportes").val();
		var FechaInicial = $("#FechaInicial").val();
		var FechaFinal = $("#FechaFinal").val();
		var parametros = {"action":"ajax",'query':q, "FechaInicial":FechaInicial, 
						  "FechaFinal":FechaFinal};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'Controladores/listar_ReporteTransporte.php',
			data: parametros,
			beforeSend: function(objeto){
			$("#loader").html("Cargando...");
		  	},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
				activaDataTables();
			}
		});
	};

	function activaCalendario(){
		$("#FechaGuia").datepicker({
			format: "dd/mm/yyyy",
			weekStart: 1,
			language: "es"
		});
	}

	function activaDataTables(){

		var table = $('#dtHorizontalExample').DataTable( {
        	lengthChange: false,
        	//dom: 'Bfrtip',
        	//"paging": false,
        	"scrollX": true,
      		"scrollY": "90vh",
      		"scrollCollapse": true,
      		"lengthMenu": [[25, 50, 100,-1], [25, 50, 100,"Todo"]],
        	buttons: ['pageLength','colvis','excel'],
        	"language": {
        		"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
        		"sSearch":         "Buscar:",
        		"buttons": {
            		"pageLength": {
                	_: "Mostrar %d Elementos",
                	'-1': "Ver Todo"
            		},
            		"colvis": "Ocultar Columnas",
            		"excel": "Descargar a Excel"
        		}
   			},
    	} );
 
    	table.buttons().container().appendTo('#dtHorizontalExample_wrapper .col-sm-6:eq(0)');
	}