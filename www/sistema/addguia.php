<?php
define('HOST_DB', 'localhost'); 
define('USER_DB', 'nikovald'); 
define('PASS_DB', 'arimoreno2016'); 
define('NAME_DB', 'nikovald_aridos'); 
function conectar()
{global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  

$Vcliente = $_GET['Vid'];
// llama a GrabaAdd.php para insertar los item en la BD

	  conectar(); mysql_set_charset('utf8'); 
      $sql = "SELECT * FROM cliente WHERE idCliente = '" .$Vcliente. "'";    
      $resultado = mysql_query($sql); 

      if (mysql_num_rows($resultado) > 0){  
      $registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
			// Se almacenan las cadenas de resultado 
			while($fila2 = mysql_fetch_assoc($resultado))
		{  
		$texto .= $fila2['Rut'];
		$NombreCli .= trim($fila2['Nombre_Cliente']);
		$Dire .= $fila2['Direccion']; 
		$Giro .= $fila2['Giro'];  
		$Obra .= $fila2['Obra']; 
		$Contacto .= $fila2['Contacto']; 
		$Correo .= $fila2['Correo']; 
		$Fono .= $fila2['Fono']; 
		$Rut .= $fila2['Rut'];
		$Id .= $fila2['idCliente'];
		}  
	}






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
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
});

function dependencia_estado()
{
	var code = $("#pais").val();
	$.get("scripts9/dependencia-estado.php", { code: code },
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
	$.get("scripts9/dependencia-ciudades.php?", { code: code }, function(resultado){
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
<h2>Agregar Guía</h2>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="resources/screen.css" />
    <!-- incluyo mis estilos css -->
    <link rel="stylesheet" type="text/css" href="resources/style.css" />
<form name ="client" id="client" method="POST" action="GrabaAdd.php">
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:700px;" >
	 <tbody>
	    <tr>
			<td >Cliente</td> 
			<td>N° Guía</td> 
			<td></td>
		    <td>Valor</td>
			<td></td>	
		</tr>
		<tr>

            <select name="multiple[]" multiple>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            </select><input name="enviar" type="submit" />
		</tr>
		
		
		 <tr>
			<td>
			<select id="pais" name="pais">
				<option value="1"><?php echo $Vcliente; ?></option>
			</select>
			</td> 
			<td></td>
			<td> 
			<select id="estado" name="estado">
				<option value="0">Seleccione Guía...</option>
			</select></td>
			<td></td>
			<td>  
			<select id="ciudad" name="ciudad" >
				<option value="1">Seleccione Arido...</option>
			</select>
			</td>
			<td></td>
		</tr>
	</tbody>
  </table>
  <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:750px;" >
	<tbody>
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
