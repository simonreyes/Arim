<html>
<head>
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
</head>
<body>
<h2>Ingresar Cotización</h2>
<form name ="client" id="client" method="POST" action="guardarniko.php">
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:700px;" >
	 <tbody>
	    <tr>
			<td>Transporte</td> 
			<td></td>
		    <td>Patente</td>
			<td></td>
			<td>Chofer</td>	
			<td></td>					
		</tr>
		 <tr>
			<td>
			<select id="pais" name="pais">
				<option value="0">Seleccione Transporte...</option>
			</select></td> 
			<td></td>
		    <td> 
			<select id="estado" name="estado">
				<option value="0">Seleccione Patente...</option>
			</select></td>
			<td></td>
			<td>  
			<select id="ciudad" name="ciudad">
				<option value="0">Seleccione Chofer...</option>
			</select></td>	
			<td></td>
		</tr>
	</tbody>
  </table>
  <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px;" >
	<tbody>
		<tr>
			<td>KM :</td>
			<td><input type="text" name="km" id="km" ></td>
			<td>&nbsp;</td>
			<td>CUBO / KM :</td>
			<td><input type="text" name="cubo" id="cubo" ></td>
		</tr>
		
		<tr>
			<td>PEAJE :</td>
			<td><input type="text" name="peaje" id="peaje" ></td>
			<td>&nbsp;</td>
			<td>COMISIÓN :</td>
			<td><input type="text" name="cantidad" id="cantidad"></td>
			
		</tr>
		<tr>
			<td>VENTA FINAL :</td>
			<td><input type="text" name="ventaf" id="ventaf" ></td>
			<td>&nbsp;</td>
			<td>CANTIDAD :</td>
			<td><input type="text" name="cantidad2" id="cantidad2" ></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="tarifa" id="tarifa"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="ganancia" id="ganancia" >
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="valor" id="valor" >
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="venta" id="venta" >
			</td>
		</tr>
		<tr class="buttonsBar">
			<td>&nbsp;</td>
			<td><input id="cancel" type="button" value ="Cancelar" /></td>
			<td>&nbsp;</td>
			<td><input id="submit" type="submit" name="submit" value ="Guardar" /></td>
			<td>&nbsp;</td>
		</tr>
	<</tbody>
</table>
</form>
<div id="myDiv"></div>
</body>
</html>
