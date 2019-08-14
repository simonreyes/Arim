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

$nombre_emp = "";
$descuento = "";
$tipo_emp = "";
$fecha_recep = "";
$num_fact = "";
$monto_total = "";
$fecha_pago = "";
$num_cheque = "";
$nombre_banco = "";
$fecha_cheque = "";
$estado_fact = "";
$observacion = "";

if($_POST){ 

$busqueda = trim($_POST['buscar']);  
$entero = 0;  

if (empty($busqueda))
{
$texto = 'Búsqueda sin resultados'; 
}
else { 

conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM facturas WHERE num_fact  =  '" .$busqueda. "'";  
$resultado = mysql_query($sql); 
	if (mysql_num_rows($resultado) > 0){	  
	$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
		while($fila = mysql_fetch_assoc($resultado))
		{  
			$nombre_emp .= $fila['nombre_emp'];
			$descuento .= $fila['descuento'];
			$tipo_emp .= $fila['tipo_emp'];
			$fecha_recep .= $fila['fecha_recep'];
			$num_fact .= $fila['num_fact'];
			$monto_total .= $fila['monto_total'];
			$fecha_pago .= $fila['fecha_pago'];
			$num_cheque .= $fila['num_cheque'];
			$nombre_banco .= $fila['nombre_banco'];
			$fecha_cheque .= $fila['fecha_cheque'];
			$estado_fact .= $fila['estado_fact'];
			$observacion .= $fila['observacion'];
		}  
	}
  }
}
?> 
<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Actualizar Factura Recibida</title>
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
alert ("Factura Actualizada Correctamente!");
}
function mi_alerta2 () {
alert ("Factura Eliminada Correctamente!");
}
</SCRIPT>
	</head>
	<body>
		<div id="header">
<div id ="block"></div>		
<div class="container">
<br>
 <br>
	<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L </b></font></p>
        <h3 class="title">Actualizar o Elimina Factura Recibida</h3>
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
			<td>Ingrese N° Factura: <input id="buscar" name="buscar" type="search">
			<input type="submit" name="buscador" class="boton peque aceptar" value="Buscar">
			</td>
			<?php 
		if($_POST){ 
		$busqueda = trim($_POST['buscar']);  
		}
		?> 	
		</tr>
	</tbody>	
 </table>
</form>	
<br/>	
<form action="ActFactReci.php" method="post">			
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
		<tr>
			<td>Nombre Empresa</td>
			<td><input readonly="readonly" name="nomemp" type="text" value="<?php echo $nombre_emp; ?>" /></td>
			<td>&nbsp;</td>			
			<td>N° Factura</td>
			<td><input readonly="readonly" name="num_fact" type="text" value="<?php echo $num_fact;?>" /></td>	
		</tr>
		<tr>
			<td>Tipo Empresa</td>
			<td><input name="tipo_emp" type="text" value="<?php echo $tipo_emp; ?>"/></td>
			<td>&nbsp;</td>
			<td>Fecha Recepción</td>
			<td><input placeholder="20160501" name="fechaRecep" type="text" value="<?php echo $fecha_recep;?>" /></td>
		</tr>
		<tr>
			<td>Descuento 3%</td>
			<td><input name="descuento" type="text" value="<?php echo $descuento;?>"/></td>
			<td>&nbsp;</td>
			<td>Monto Total</td>
			<td><input name="monto_total" type="text" value="<?php echo $monto_total;?>"/></td>
		</tr>
		<tr>
			<td>Fecha Pago</td>
			<td><input placeholder="20160501" name="fecha_pago" type="text" value="<?php echo $fecha_pago;?>" /></td>
			<td>&nbsp;</td>
			<td>Numero de Cheque</td>
			<td><input name="num_cheque" type="text" value="<?php echo $num_cheque;?>" /></td>
		</tr>
		<tr>
			<td>Nombre Banco</td>
			<td><input name="nombre_banco" type="text" value="<?php echo $nombre_banco;?>"/></td>
			<td>&nbsp;</td>
			<td>Fecha Cheque</td>
			<td><input placeholder="20160501" name="fecha_cheque" type="text" value="<?php echo $fecha_cheque;?>"/></td>
		</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Observación</td>
			<td><input size="50" name="observacion" type="text" value="<?php echo $observacion;?>"/></td>
		</tr>
		<tr>
			<td>Estado Factura Actual</td>
			<td><input name="estado_fact" type="text" value="<?php echo $estado_fact;?>"/></td>
			<td>&nbsp;</td>
			<td>Estado Factura Nuevo</td>
			<td>			
				<select name="estadoact">
				<option value="Pagada">Pagada</option>
				<option value="En proceso">En proceso</option>
				<option value="Recepcionada">Recepcionada</option>
				<option value="Pago 50%">Pago 50%</option>
				</select></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
	</table>
			
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			
			<input align="center" name="guardar" value=" Actualizar " type="submit" onClick="mi_alerta()" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="submit" name="eliminar" value=" Eliminar "  onClick="mi_alerta2()" /></td>
			<td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td><input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
</table>
	</form>			
	</div>
	</body>

</html>