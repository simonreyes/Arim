<?php 
define('HOST_DB', 'localhost'); 
define('USER_DB', 'aridosem_tems'); 
define('PASS_DB', 'aritrans2020'); 
define('NAME_DB', 'aridosem_bd'); 
function conectar()
{global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  


if($_POST){ 
$busqueda = trim($_POST['buscar']);  
$entero = 0;  
}
if (empty($busqueda))
{
$texto = 'Búsqueda sin resultados';
$foliov = "";
}
else { 

//Consulta trae datos desde vale
conectar(); mysql_set_charset('utf8'); 
$sqlval = "SELECT * FROM vale WHERE folio  =  '" .$busqueda. "'";  
$resultadov = mysql_query($sqlval) or die (mysql_error());
//echo $resultadoa + "resultad";
$transporte = "";
$patente ="";
$chofer = "";
$fecha = "";
$folio = "";
$cantidadv = "";
$detalle ="";  
$transportef ="";

while($filav = mysql_fetch_assoc($resultadov))
{

$transport = $filav['transporte'];
$patente = $filav['patente'];
$chofer = $filav['chofer'];
$fecha1 = $filav['fecha'];
$phpdate = strtotime( $fecha1 );
$fecha = date( 'd-m-y', $phpdate );
$folio = $filav['folio'];
$cantidadv =$filav['cantidad'];
$detalle = $filav['detalle'];
} 
// select transportes para identificar el id
conectar(); mysql_set_charset('utf8'); 
$sqlt = "SELECT nombre FROM transporte WHERE idnombre  =  '" .$transport. "'";  
$resultadoa = mysql_query($sqlt) or die (mysql_error());
//echo $resultadoa + "resultad";
$transporte = "";
while($filaa = mysql_fetch_assoc($resultadoa))
{
$transportef .= $filaa['nombre'];
}  
}
?> 
<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Elimina Vale</title>
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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<link rel="stylesheet" href="resources/css/bootstrap.min.css">
		<!-- Bootstrap Datepicker CSS -->
		<link rel="stylesheet" href="resources/css/datepicker/bootstrap-datepicker.min.css">
		<!-- JQuery 3.4.1 -->
		<!--<script type="text/javascript" src="resources/js/jquery-3.4.1.min.js"></script>-->
		<!-- Bootstrap JS -->
		<script type="text/javascript" src="resources/bootstrap.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script type="text/javascript" src="resources/bootstrap-datepicker.min.js" defer></script>
		<script type="text/javascript" src="resources/bootstrap-datepicker.es.min.js" defer charset="UTF-8"></script>
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
	$.get("scriptsGD/cargar-paises.php", function(resultado){
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
	$.get("scriptsGD/dependencia-estado.php", { code: code },
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
	var code = $("#pais").val();
	$.get("scriptsGD/dependencia-ciudades.php?", { code: code }, function(resultado){
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
<div id="header">
	<ul class="nav">
	</ul>			
<div id ="block"></div>
   <div class="container">
    <br>
   	<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Eliminar Vale&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
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
		<tr>
			<td>Ingrese Folio : <input id="buscar" name="buscar" type="search">
			<input type="submit" name="buscador" class="boton peque aceptar" value="Buscar">
			</td>			
		</tr>
	</tbody>	
 </table>
</form>	
 <br/>
<form action="Deletevale.php" method="post" target="_blank" > 
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
	    <tr>
			<td>Transporte :</td>
			<td><input name="folio" readonly type="text"  value="<?php echo $transportef; ?>"/></td>
			<td>&nbsp;</td>
			<td>Patente :</td>
			<td><input name="fecha" readonly type="text" value="<?php echo $patente; ?>"/></td>
			<td>&nbsp;</td>
			<td>Chofer :</td>
			<td><input name="folio" readonly type="text"  value="<?php echo $chofer; ?>"/></td>
		</tr>
		</tbody>
	  </table> 
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
		<tr>
			<input hidden="hidden" value="<?php echo $busqueda; ?>" name="foliob">
			<td>Folio :</td>
			<td><input name="folio" readonly type="text"  value="<?php echo $folio; ?>"/></td>
			<td>&nbsp;</td>
			<td>Fecha :</td>
			<td><input name="fecha" readonly type="text" value="<?php echo $fecha ?>"/></td>
		</tr>
		<tr>
			<td>Cantidad :</td>
			<td><input  name="cantidadv" readonly type="text"  value="<?php echo $cantidadv; ?>"/></td>
			<td>&nbsp;</td>
			<td>Detalle :</td>
			<td><input  name="detalle" readonly type="text"  value="<?php echo $detalle; ?>"/></td>			
		</tr>		
    </tbody>
  	</table>  
 	<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:950px;" >
 	<tr>
   	 <td size="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;</td>	
   		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>	
		<td><input type="submit" name="Guardarv" value=" Eliminar Vale "></td>
		<td><input type="submit" name="Cancelar" value=" Cancelar " onClick="location.href='vistaGral.php'"></td>	
		<td size="40"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>	
   		<tr>
   	</table>
 	 <br/>
</form>  
</div>
</body>
</html>   