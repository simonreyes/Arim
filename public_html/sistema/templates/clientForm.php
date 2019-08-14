<html>
<head>
</head>
<body>
<h2>Items de la Cotización</h2>
<br>
<form name ="client" id="client" method="POST" action="index.php">
<input type="hidden" name="id" id="id" value="<?php print $view->client->getId() ?>">
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px;" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
});

function cargar_paises()
{
	$.get("scripts3/cargar-paises.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#pais').append(resultado);			
		}
	});	
}
function dependencia_estado()
{
	var code = $("#pais").val();
	$.get("scripts3/dependencia-estado.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#estado").attr("disabled",false);
				document.getElementById("estado").options.length=1;
				$('#estado').append(resultado);			
			}
		}

	);
}

function dependencia_ciudad()
{
	var code = $("#estado").val();
	$.get("scripts3/dependencia-ciudades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#ciudad").attr("disabled",false);
			document.getElementById("ciudad").options.length=1;
			$('#ciudad').append(resultado);			
		}
	});	
	
}
</script>
<style type="text/css">
dt{font-size:200%;}
dd{font-size:150%;}
</style>
	<tbody>
		<tr>
			<td>Provedor</td> 
			<td></td>
		    <td>Aridos</td>
			<td></td>
			<td>Valor</td>	
			<td></td>					
		</tr>
		 <tr>
			<td>
			<select id="pais" name="pais">
				<option value="0">Seleccione Proveedor...</option>
			</select></td> 
			<td></td>
		    <td> 
			<select id="estado" name="estado">
				<option value="0">Seleccione Arido...</option>
			</select></td>
			<td></td>
			<td>  
			<select id="ciudad" name="ciudad">
				<option value="0">Seleccione Valor...</option>
			</select></td>	
			<td></td>
		</tr>
	</tbody>
</table>
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px;" >
<tbody>
		<tr>
			<td>KM :</td>
			<td><input type="text" name="km" id="km"value = "<?php print $view->client->getKm() ?>"></td>
			<td>&nbsp;</td>
			<td>CUBO / KM :</td>
			<td><input type="text" name="cubo" id="cubo" value = "<?php print $view->client->getCubo() ?>"></td>
		</tr>
		
		<tr>
			<td>PEAJE :</td>
			<td><input type="text" name="peaje" id="peaje" value = "<?php print $view->client->getPeaje() ?>"></td>
			<td>&nbsp;</td>
			<td>COMISIÓN :</td>
			<td><input type="text" name="cantidad" id="cantidad"value = "<?php print $view->client->getCantidad() ?>"></td>
			
		</tr>
		<tr>
			<td>VENTA FINAL :</td>
			<td><input type="text" name="ventaf" id="ventaf" value = "<?php print $view->client->getVentaf() ?>"></td>
			<td>&nbsp;</td>
			<td>CANTIDAD :</td>
			<td><input type="text" name="cantidad2" id="cantidad2" value = "<?php print $view->client->getCantidad2() ?>"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="tarifa" id="tarifa" value = "<?php print $view->client->getTarifa() ?>">
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="ganancia" id="ganancia" value = "<?php print $view->client->getGanancia() ?>">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="valor" id="valor" value = "<?php print $view->client->getValor() ?>">
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="venta" id="venta" value = "<?php print $view->client->getVenta() ?>">
			</td>
		</tr>
		<tr class="buttonsBar">
			<td>&nbsp;</td>
			<td><input id="cancel" type="button" value ="Cancelar" /></td>
			<td>&nbsp;</td>
			<td><input id="submit" type="submit" name="submit" value ="Guardar" /></td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>
</form>
<div id="myDiv"></div>
</body>
</html>
