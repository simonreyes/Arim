		$(document).ready(function(){

			//Calendario
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#FechaGuia").datepicker({
			      firstDay: 1,
			      dateFormat: "yymmdd"
			});

			//*****EDITAR TRANSPORTE ***********//
			//Cuando se selecciona el boton de editar transporte
			$('#editTransporteModal').on('shown.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var idGuia = button.data('guia');
		  		$('#edit_guia').val(idGuia);
			});

			//Cuando se elige un nuevo transporte
			$('#selectTransporte').on('change', function(){
	        var id = $(this).val();
	        var nametrp = $(this).find('option:selected').text();
	        $('#edit_trp').val(nametrp);
	        var idTransp = {"idTransp":id};
	        if(idTransp){
	            $.ajax({
	                type:'POST',
	                url:'Controladores/select_transportes.php',
	                data: idTransp,
	                success:function(html){
	                    $('#selectPatente').html(html);
	                    $('#selectChofer').html('<option value="">Selecciona Patente primero</option>'); 
	                }
	            }); 
	        }else{
	            $('#selectPatente').html('<option value="">Selecciona Transporte primero</option>');
	            $('#selectChofer').html('<option value="">Selecciona Patente primero</option>'); 
	        }
	    	});

			//Cuando se selecciona la patente	
	    	$('#selectPatente').on('change', function(){
	        var selected = document.getElementById("selectTransporte");
	        var id = selected.options[selected.selectedIndex].value;
	        var idTranspChof = {"idTranspChof":id};
	        if(idTranspChof){
	            $.ajax({
	                type:'POST',
	                url:'Controladores/select_transportes.php',
	                data: idTranspChof,
	                success:function(html){
	                    $('#selectChofer').html(html);
	                }
	            }); 
	        }else{
	            $('#selectChofer').html('<option value="">Seleccione Patente primero</option>'); 
	        }
	    	});

	    	//Cuando se guarda el nuevo transporte
	    	$("#edit_transporte").submit(function( event ) {
				var parametros = $(this).serialize();
				$.ajax({
						type: "POST",
						url: "Controladores/editar_transporte.php",
						data: parametros,
						beforeSend: function(objeto){
							$("#resultados").html("Enviando...");
						},
						success: function(datos){
							$("#resultados").html(datos);
							load(1);
							$('#editTransporteModal').modal('hide');
					  	}
					});
			  	event.preventDefault();
			});

			//***** FIN EDITAR TRANSPORTE ***********//

			//***** EDITAR PROVEEDOR ***********//

			//Cuando se selecciona el boton de editar proveedor
			$('#editProvModal').on('shown.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var idGuia = button.data('id');
		  		$('#edit_idGuia').val(idGuia);
		  		var provName = button.data('prov');
		  		$('#staticProv').val(provName);
		  		var sucName = button.data('suc');
		  		$('#staticSuc').val(sucName);
		  		var ariName = button.data('arido');
		  		$('#staticAri').val(ariName);
		  		var mt3 = button.data('mt3');
		  		$('#edit_valmt3').val(mt3);
		  		var cantidad = button.data('cant');
		  		$('#edit_cant').val(cantidad);
			});

		    $('#deleteProductModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var id = button.data('id') 
			  $('#delete_id').val(id)
			});

			$("#edit_producto").submit(function(event){
			  var parametros = $(this).serialize();
				$.ajax({
						type: "POST",
						url: "ajax/editar_producto.php",
						data: parametros,
						beforeSend: function(objeto){
							$("#resultados").html("Enviando...");
						  },
						success: function(datos){
						$("#resultados").html(datos);
						load(1);
						$('#editProductModal').modal('hide');
					  }
				});
			  event.preventDefault();
			});
			
			
			$( "#add_product" ).submit(function( event ) {
			  var parametros = $(this).serialize();
				$.ajax({
						type: "POST",
						url: "ajax/guardar_producto.php",
						data: parametros,
						 beforeSend: function(objeto){
							$("#resultados").html("Enviando...");
						  },
						success: function(datos){
						$("#resultados").html(datos);
						load(1);
						$('#addProductModal').modal('hide');
					  }
				});
			  event.preventDefault();
			});
			
			$( "#delete_product" ).submit(function( event ) {
			  var parametros = $(this).serialize();
				$.ajax({
						type: "POST",
						url: "ajax/eliminar_producto.php",
						data: parametros,
						 beforeSend: function(objeto){
							$("#resultados").html("Enviando...");
						  },
						success: function(datos){
						$("#resultados").html(datos);
						load(1);
						$('#deleteProductModal').modal('hide');
					  }
				});
			  event.preventDefault();
			});


		});

		function load(page){
			var q=$("#q").val();
			var parametros = {"action":"ajax","page":page,'query':q};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Controladores/listar_productos.php',
				data: parametros,
				beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  	},
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			});
		};