<?php 
define('HOST_DB', 'localhost'); 
define('USER_DB', 'aridosem_tems'); 
define('PASS_DB', 'aritrans2020'); 
define('NAME_DB', 'aridosem_bd'); 
function conectar()
{ global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  
$texto = '';
$NombreCli = ''; 
$Dire = ''; 
$Giro = ''; 
$Obra = ''; 
$Contacto = ''; 
$Correo = '';
$Fono = '';
$Rut = '';
$Ciudad = '';
$Id = '';
$registros = ''; 

$numero = "";
$folio = "";
	
if($_POST){  $busqueda = trim($_POST['buscar']);  
$entero = 0;  
if (empty($busqueda)){ 
$texto = 'Búsqueda sin resultados'; 
}else{ 
// Si hay información para buscar, abrimos la conexión
conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM cliente WHERE idCliente = '".$busqueda."' ";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
$texto .= $fila['Rut'];
$NombreCli .= $fila['Nombre_Cliente'];
$Dire .= $fila['Direccion']; 
$Giro .= $fila['Giro'];  
$Obra .= $fila['Obra']; 
$Contacto .= $fila['Contacto']; 
$Correo .= $fila['Correo']; 
$Fono .= $fila['Fono']; 
$Rut .= $fila['Rut'];
$Id .= $fila['idCliente'];
$Ciudad .= $fila['Ciudad'];
}  
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion); } }
 

$link = mysql_connect('localhost', 'aridosem_tems', 'aritrans2020')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('aridosem_bd') or die('No se pudo seleccionar la base de datos'); 
 
$sql2 = "SELECT numero FROM folios where letra = 'CT00'";  
$resultado2 = mysql_query($sql2); 
while ($row = mysql_fetch_array($resultado2, MYSQL_ASSOC)) {
 
$numero = $row['numero'];
} 
 
$folio = "CT00" . $numero; 
 
?> 

<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Elimina Cliente</title>
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
alert ("Cliente Eliminado Correctamente!");
}
</SCRIPT>
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
	</head>
	<body>
		<div id="header">
		<div id ="block"></div>		
<div class="container">
<br>
<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Elimina Cliente</h3>
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
			<td>Ingrese Cliente :</td>
			<td><?php
				include 'conexion_mysqli.php';
				$query = 'SELECT * FROM cliente';
				$result = $conexion->query($query);
				?>
				<select name="buscar" id="buscar">
				<?php    
				while ( $row = $result->fetch_array() )    
				{
				?>
				<option value=" <?php echo $row['idCliente'] ?> " >
				<?php echo $row['Nombre_Cliente']; ?>
				</option>
				<?php
				}    
				?>
				</select>
			<input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		
	</tbody>
</table> 
</form>
 
<form action="DeleteCliente.php" method="post">
<input type="hidden" name="folio" value="<?php echo $folio; ?>">			
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr style="display:none">
			<td width="20%">id</td>
			<td width="30%"><input size="30" name="id" type="text" value="<?php echo $Id; ?>" /></td>
			<td width="10%">&nbsp;</td>
			<td width="10%">&nbsp;</td>
			<td width="30%">&nbsp;</td>
		</tr>
		<tr>
			<td>Nombre Cliente :</td>
			<td><input size="30" name="nombre" type="text" value="<?php echo $NombreCli; ?>" /></td>
			<td>&nbsp;</td>
			<td>Dirección :</td>
			<td><input size="30" name="direccion" type="text" value="<?php echo $Dire; ?>" /></td>
		</tr>
		<tr>
			<td>Rut :</td>
			<td><input size="30" name="rut" type="text"  value="<?php echo $Rut; ?>"/></td>
			<td>&nbsp;</td>
			<td>Giro :</td>
			<td><input size="30" name="giro" type="text" value="<?php echo $Giro; ?>"/></td>
		</tr>
		<tr>
			<td>Ciudad :</td>
			<td><input size="30" name="ciudad" type="text" value="<?php echo $Ciudad; ?>"/></td>
			<td>&nbsp;</td>
			<td>Contacto :</td>
			<td><input size="30" name="contacto" type="text" value="<?php echo $Contacto; ?>"/></td>
		</tr>
		<tr>
			<td>Correo Electronico:</td>
			<td><input size="30" name="correo" type="text" value="<?php echo $Correo; ?>"/></td>
			<td>&nbsp;</td>
			<td>Fono :</td>
			<td><input size="30" name="fono" type="text" value="<?php echo $Fono; ?>"/></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input align="center" name="guardar" value=" Eliminar " type="submit" onClick="mi_alerta()" /></td>
			<td>&nbsp;</td>
			<td><input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
	</table>
	</form>			
	</div>
	</body>
</html>