<?php 
define('HOST_DB', 'localhost'); 
define('USER_DB', 'root'); 
define('PASS_DB', ''); 
define('NAME_DB', 'nikovald_aridos'); 
function conectar()
{ global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . mysql_error()); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  

$mt3 = "";
$chofer = "";
$rut = "";
$fono = "";
$busqueda2 = "";
$busqueda = "";

	
if($_POST){  

$busqueda  = trim($_POST['pais']);  
$busqueda2 = trim($_POST['estado']);
$entero = 0;  
if (empty($busqueda)){ 
$texto = 'Búsqueda sin resultados'; 
}else{ 
// Si hay información para buscar, abrimos la conexión
conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM transchofer WHERE nombretrans = '".$busqueda."' and patente = '".$busqueda2."' ";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
$mt3 .= $fila['mt3'];
$chofer .= $fila['chofer'];
$rut .= $fila['rut'];
$fono .= $fila['fono'];
}  
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion);

conectar(); mysql_set_charset('utf8'); 
$sql2 = "SELECT nombre FROM transporte WHERE idnombre = '".$busqueda."'";  
$resultado2 = mysql_query($sql2); 
if (mysql_num_rows($resultado2) > 0){  
$registros2 = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado2) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
$nombre = "";
while($fila2 = mysql_fetch_assoc($resultado2))
{  
$nombre .= $fila2['nombre'];
}  
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion); 
} 
}
 // Prueba
conectar(); mysql_set_charset('utf8'); 
$sqlchoferes = "SELECT chofer FROM transchofer WHERE patente = '".$busqueda2."'";  
$listado = mysql_query($sqlchoferes); 

//fin prueba
?> 

<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Editar Transportes</title>
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
<SCRIPT LANGUAGE="JavaScript">
function mi_alerta () {
alert ("Transporte Actualizado Correctamente!");
}
</SCRIPT>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#estado").attr("disabled",true);
	
});

function cargar_paises()
{
	$.get("scripts4/cargar-paises.php", function(resultado){
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
	$.get("scripts4/dependencia-estado.php", { code: code },
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

</script>
<style type="text/css">
dt{font-size:200%;}
dd{font-size:150%;}
</style>	
	</head>
	<body>
		<div id="header">
<div id ="block"></div>		
<div class="container">
<br>
<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L </b></font></p>
        <h3 class="title">Editar Transportes</h3>
	    <div id="popupbox"></div>
        <div id="content"></div>
    </div>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- incluyo la libreria jQuery -->
    <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
    <!-- incluyo el archivo que tiene mis funciones javascript -->
    <script type="text/javascript" src="resources/functions.js"></script>
    <!-- incluyo el framework css , blueprint. -->
    <link rel="stylesheet" type="text/css" href="resources/screen.css" />
    <!-- incluyo mis estilos css -->
    <link rel="stylesheet" type="text/css" href="resources/style.css" />			
<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr><tbody>
		<tr>
			<td>Empresa Transportista</td> 
			<td></td>
		    <td>Patente Camion</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>
			<select id="pais" name="pais">
				<option value="0">Seleccione Empresa...</option>
			</select></td> 
			<td></td>
		    <td> 
			<select id="estado" name="estado">
				<option value="0">Seleccione Patente...</option>
			</select></td>
			<td></td>
			<td width="20%"><input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
			<td width="20%">&nbsp;</td>
	
		</tr>
		
	</tbody>
</table> 
</form>
 
<form action="UpdateTransporte.php" method="post">			
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr>
			<td>Empresa Transporte : </td>
			<td><input size="40" name="nombre" type="text" value="<?php echo $nombre; ?>" READONLY= "readonly"/></td>
			<td>&nbsp;</td>
			<td>Patente :</td>
			<td><input size="40" name="busqueda2" type="text" value="<?php echo $busqueda2; ?>" READONLY= "readonly" /></td>
		</tr>
		<tr>
			<td>Mt3 : </td>
			<td><input size="40" name="mt3" type="text" value="" /></td>
			<td>&nbsp;</td>
			<td>Chofer :</td>
			<td><input size="40" name="chofer" type="text" value="" /></td>
		</tr>
		<tr>
			<td>Rut :</td>
			<td><input size="40" name="rut" type="text" value="<?php echo $rut; ?>" /></td>
			<td>&nbsp;</td>
			<td>Fono :</td>
			<td><input name="fono" type="text" value="<?php echo $fono; ?>"/></td>
		</tr>
		<tr style="display:none">
			<td>Idnombre</td>
			<td><input size="40" name="busqueda" type="text" value="<?php echo $busqueda; ?>" /></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input align="center" name="guardar" value=" Guardar " type="submit" onClick="mi_alerta()" /></td>
			<td>&nbsp;</td>
			<td><input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
<form>
	<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
		<tr>
			<td>Choferes Inscritos : </td>
			<tr><?php while($fila2 = mysql_fetch_assoc($listado))
			echo '<tr><td> '.$fila2['chofer'].'</td></tr>';
			?>
			</tr>
		</tr>
	</table>
</form>
	</tbody>
	</table>
	</form>		
	</div>
	</body>
</html>