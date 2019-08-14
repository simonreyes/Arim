<?php

$Vcliente = $_GET['Vid'];
$Vfolio = $_GET['Vfolio'];
// llama a GrabaAdd.php para insertar los item en la BD
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#ciudad").change(function(){dependencia_sucursal();});
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
	$("#sucursal").attr("disabled",true);
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
function dependencia_sucursal()
{
	var code = $("#ciudad").val();
	$.get("scripts3/dependencia-sucursal.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#sucursal").attr("disabled",false);
			document.getElementById("sucursal").options.length=1;
			$('#sucursal').append(resultado);			
		}
	});	
	
}
</script>
<style type="text/css">			
			* {
				margin:0px;
				padding:0px;
			}			
			#header {
				margin:auto;
				width:900px;
				font-family:Arial, Helvetica, sans-serif;
			}			
			ul, ol {
				list-style:none;
			}
		    .nav > li {
				float:left;
			}
			.nav li a {
				background-color:#999;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			.nav li a:hover {
				background-color:#404CF2;
			}
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			.nav li:hover > ul {
				display:block;
			}
			.nav li ul li {
				position:relative;
			}
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
		</style>
</head>
<body>
<h2>Ingresar Item</h2>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="resources/screen.css" />
    <!-- incluyo mis estilos css -->
    <link rel="stylesheet" type="text/css" href="resources/style.css" />
<form name ="client" id="client" method="POST" action="GrabaAdd.php">
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:700px;" >
	 <tbody>
	    <tr>
			<td>PROVEEDOR</td> 
			<td></td>
		    <td>SUCURSAL</td>
			<td></td>
		    <td>ARIDO</td>
			<td></td>
			<td>VALOR ARIDO</td>	
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
				<option value="0">Seleccione Sucursal...</option>
			</select></td>
			<td></td>
			<td>  
			<select id="ciudad" name="ciudad" >
				<option value="0">Seleccione Arido...</option>
			</select>
			</td>
			<td></td>
			<td> 
			<select id="sucursal" name="sucursal">
				<option value="0">Seleccione Valor Arido...</option>
			</select></td>
			<td>
			</td>
		</tr>
	</tbody>
  </table>
  <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:750px;" >
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
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="idcliente" id="idcliente" value="<?php echo $Vcliente; ?>" >
			</td>
			<input type="hidden" name="folio" id="folio" value="<?php echo $Vfolio; ?>" >
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr class="buttonsBar">
			<td>&nbsp;</td>
			<td><input id="cancel" type="button" value ="  Cancelar  " onClick="location.href='Cotizacion.php'" /></td>
			<td>&nbsp;</td>
			<td><input id="submit" type="submit" name="submit" value ="  Guardar  " /></td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>
</form>
</body>
</html>
