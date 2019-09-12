		$(document).ready(function(){
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

		        var Arido = {"Arido":ariName};
		        if(Arido){
		            $.ajax({
		                type:'POST',
		                url:'Controladores/select_proveedores.php',
		                data: Arido,
		                success:function(html){
		                    $('#selectProv').html(html);
		                    $('#selectSuc').html('<option value="">Selecciona proveedor primero</option>'); 
		                }
		            }); 
		        }else{
		            $('#selectProv').html('<option value="">Datos No disponibles</option>');
		            $('#selectSuc').html('<option value="">Datos No disponibles</option>'); 
		        }
			});

			//Cuando se elige un nuevo proveedor
			$('#selectProv').on('change', function(){
	        var id = $(this).val();
	        var ari = $('#staticAri').val();
	        var idProv = {"idProv":id, "ari":ari};
	        if(idProv){
	            $.ajax({
	                type:'POST',
	                url:'Controladores/select_proveedores.php',
	                data: idProv,
	                success:function(html){
	                    $('#selectSuc').html(html);
	                }
	            }); 
	        }else{
	            $('#selectSuc').html('<option value="">Datos no disponibles</option>');
	        }
	    	});

	    	$("#edit_proveedor").submit(function(event){
			  var parametros = $(this).serialize();
				$.ajax({
						type: "POST",
						url: "Controladores/editar_proveedor.php",
						data: parametros,
						beforeSend: function(objeto){
							$("#resultados").html("Enviando...");
						  },
						success: function(datos){
						$("#resultados").html(datos);
						load(1);
						$('#editProvModal').modal('hide');
					  }
				});
			  event.preventDefault();
			});

	    	//***** FIN EDITAR PROVEEDOR ***********//

	    	//***** ELIMINAR PROVEEDOR ***********//

		    $('#deleteProvModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var id = button.data('id') 
			  $('#delete_id_gd').val(id)
			});

			$( "#delete_prov" ).submit(function( event ) {
			  var parametros = $(this).serialize();
				$.ajax({
						type: "POST",
						url: "Controladores/eliminar_proveedores.php",
						data: parametros,
						 beforeSend: function(objeto){
							$("#resultados").html("Enviando...");
						  },
						success: function(datos){
						$("#resultados").html(datos);
						load(1);
						$('#deleteProvModal').modal('hide');
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
					activaCalendario();
				}
			});
		};

		function updateGuia(){
			var FechaGuia = $("#FechaGuia").val();
			var idGuia = $("#q").val();
			var parametros = {"action":"ajaxActualizaGuia",'idGuia': idGuia, 'FechaGuia':FechaGuia };
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Controladores/actualiza_guia.php',
				data: parametros,
				beforeSend: function(objeto){
					$("#loader").html("Cargando...");
			  	},
				success:function(data){
					$("#resultados").html(data);
					load(1);
					$("#loader").html("");
					activaCalendario();
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