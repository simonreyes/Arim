<?php 
define('HOST_DB', 'localhost'); 
define('USER_DB', 'nikovald'); 
define('PASS_DB', 'arimoreno2016'); 
define('NAME_DB', 'nikovald_aridos'); 
function conectar()
{ global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  

$Id = "";
$Nombre = "";
$FormaPago = "";
$GlosaFactura = "";
$GlosaDoc = "";
$Sucursal = "";
$IdContacto = "";
$nombreContacto = "";
$fono = "";
$correo = "";
	
if($_POST){  $busqueda = trim($_POST['buscar']);  
$entero = 0;  
if (empty($busqueda)){ 
$texto = 'Búsqueda sin resultados'; 
}else{ 
// Si hay información para buscar, abrimos la conexión
conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM proveedores WHERE Proveedor = '".$busqueda."' ";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
$Id .= $fila['IdProveedor'];
$Nombre .= $fila['Proveedor'];
$FormaPago .= $fila['FormaPago'];
$GlosaFactura .= $fila['GlosaFactura'];
$GlosaDoc .= $fila['GlosaDocumento'];
$Sucursal .= $fila['Sucursal'];
}  
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion); 


conectar(); mysql_set_charset('utf8'); 
$sql2 = "SELECT * FROM proveedorcontacto WHERE idProveedor = '".$Id."' ";  
$resultado2 = mysql_query($sql2); 
if (mysql_num_rows($resultado2) > 0){  
$registros2 = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado2) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila2 = mysql_fetch_assoc($resultado2))
{  
$IdContacto .= $fila2['idContacto'];
$nombreContacto .= $fila2['nombreContacto'];
$fono .= $fila2['fono'];
$correo .= $fila2['correo'];
}  
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion);


} }
 
?> 

<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Editar Proveedor</title>
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
		<script>function formulario(f) { 
		if (f.nombre.value   == '') 
		{ alert ('El nombre del Cliente esta vacío');  
		f.nombre.focus(); 
		return false; } 
		if (f.direccion.value  == '') 
		{ alert ('Debe ingresar Direccion'); 
		f.direccion.focus(); 
		return false; } 
		return true; } 
		</script>
<SCRIPT LANGUAGE="JavaScript">
function mi_alerta () {
alert ("Proveedor Actualizado Correctamente!");
}
</SCRIPT>		
	</head>
	<body>
		<div id="header">
<div id ="block"></div>		
<div class="container">
<br>
<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Edita Proveedor</h3>
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
			<td width="15%">Proveedor :</td>
			<td width="30%">
			<?php
				include 'conexion_mysqli.php';
				$query = 'SELECT * FROM proveedores';
				$result = $conexion->query($query);
			?>
				<select name="buscar" id="buscar">
				<?php    
				while ( $row = $result->fetch_array() )    
				{
				?>
				<option value=" <?php echo $row['Proveedor'] ?> " >
				<?php echo $row['Proveedor']; ?>
				</option>
				<?php
				}    
				?>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td width="20%"><input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
			<td width="20%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
		</tr>
		
	</tbody>
</table> 
</form>
 
<form action="UpdateProveedor.php" method="post">			
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr style="display:none">
			<td width="20%">id</td>
			<td width="30%"><input size="30" name="id" type="text" value="<?php echo $Id; ?>" /></td>
			<td width="10%"><input size="30" name="idc" type="text" value="<?php echo $IdContacto; ?>" /></td>
			<td width="10%">&nbsp;</td>
			<td width="30%">&nbsp;</td>
		</tr>
		<tr>
			<td>Nombre Proveedor : </td>
			<td><input size="40" name="nombre" type="text" value="<?php echo $Nombre; ?>" /></td>
			<td>&nbsp;</td>
			<td>Forma de Pago :</td>
			<td><input size="40" name="forma" type="text" value="<?php echo $FormaPago; ?>" /></td>
		</tr>
		<tr>
			<td>Factura :</td>
			<td><input size="40" name="factura" type="text" value="<?php echo $GlosaFactura; ?>" /></td>
			<td>&nbsp;</td>
			<td>Documento :</td>
			<td><input size="40" name="documento" type="text" value="<?php echo $GlosaDoc; ?>" /></td>
		</tr>
		<tr>
			<td>Nombre de Contacto :</td>
			<td><input name="contacto" type="text" value="<?php echo $nombreContacto; ?>"/></td>
			<td>&nbsp;</td>
			<td>Fono :</td>
			<td><input name="fono" type="text" value="<?php echo $fono; ?>"/></td>
		</tr>
		<tr>
			<td>Correo :</td>
			<td><input name="correo" type="text" value="<?php echo $correo; ?>"/></td>
			<td>&nbsp;</td>
			<td>Sucursal :</td>
			<td><input name="sucursal" type="text" value="<?php echo $Sucursal; ?>" /></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
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
	</tbody>
	</table>
	</form>		
	</div>
	</body>
</html>